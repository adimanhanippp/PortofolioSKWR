<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Menu;
use App\User;
use App\Role;
use App\Anggota;
use DB;
use Hash;
use Entrust;
use Datatables;
use App\mailuser;
use App\Roleuser;
use App\Mail\EmailNotif;

class UserCtrl extends Controller
{

    public function do_login(Request $req)
    {
        try {
            if(Auth::attempt([ 'username'=>$req->username, 'password'=>$req->password ])) {
                $ancestorsAndSelf = $this->getMenuAncestors(Auth::user()->roles()->first()->menus()->where('is_active', 1)->get());
                session([
                    'user_menu'=>json_encode($this->buildMenu(Menu::whereIn('id', $ancestorsAndSelf)->orderBy('order_no')->get()))
                ]);
                return redirect('/');
            }
            return back()->withInput()->with( 'error', 'error' );
        } catch(\Exception $e) {
            return redirect('/')->with( 'timeout', 'timeout' );
        }
    }

    private function getMenuAncestors($data)
    {
        $out = [];
        foreach ($data as $val) {
            $out[] = $val->id;
            $parent = $val->parent()->get();
            if($parent->isNotEmpty()) {
                $out[] = $this->getMenuAncestors($parent);
            }
        }
        return collect($out)->flatten()->unique()->values()->all();
    }

    private function buildMenu($data, $parent = NULL)
    {
        $op = [];
        foreach ($data as $value) {
            if($value->parent===$parent) {
                // array build of current item
                $item = [
                    'name'=>$value->name,
                    'url'=>url($value->slug),
                    'icon'=>$value->icon,
                ];
                // build children of current item
                $children = $this->buildMenu($data, $value->slug);
                if($children)
                    $item['children'] = $children;
                // build item
                $op[] = $item;
            }
        }
        return $op;
    }

    public function index()
    {
        return view('user.dt');
    }

    public function dt()
    {
        $data = Auth::user()->id===1 ? User::all() : User::where('id', '<>', 1)->get();
        return Datatables::of($data)
            ->addColumn('role', function($data) {
                return $data->roles()->first()->description;
            })
            ->addColumn('action', function($data) {
                $html = Entrust::can('user_update') ? '<a href="'. url('users/create/'.$data->id) .'" class="text-primary row-edit" data-toggle="tooltip" title="Edit User"><span class="glyphicon glyphicon-wrench"></span></a>' : '';
                $html .= Entrust::can('user_delete') ? '&nbsp;&nbsp;<a href="javascript:" data-url="'. url('users/delete/'.$data->id) .'" class="text-danger row-delete" data-toggle="tooltip" title="Delete User"><span class="glyphicon glyphicon-trash"></span></a>' : '';
                $html .= Entrust::can('user_update') ? '&nbsp;&nbsp;<a href="'. url('users/reset/'.$data->id) .'" class="text-primary row-edit" data-toggle="tooltip" title="Reset Password"><span class="glyphicon glyphicon-repeat"></span></a>' : '';
                return $html;
            })
            ->make(TRUE);
        // return $data;
    }



    public function create($id = FALSE)
    {
        $params = [];
        if($id!==FALSE) {
            $params['data'] = User::find($id);
        }
        $params['roles'] = Role::all();
        return view('user.create', $params);
    }

    public function store(Request $req)
    {
        return DB::transaction(function() use($req) {
            try {
                // store user
                $user = empty($req->id) ? new User : User::find($req->id);
                $user->name = $req->name;
                $user->username = $req->username;
                $user->email = $req->email;
                if(empty($req->id))
                    $user->password = Hash::make('userwika123');
                $user->save();
                // attach to role
                $user->roles()->sync([ $req->role ]);
                return redirect('users')->with('success', 'User saved! Default password is: userwika123');
            } catch(\Exception $e) {
                DB::rollback();
                return back()->with('error', 'Error while saving data! '. $e->getMessage())->withInput();
            }
        });
    }

    public function destroy($id)
    {
        $user = User::find($id);
        Anggota::where('nip', $user->username)->delete();
        $user->delete();
        return redirect('users')->with('success', 'User deleted!');
    }

    public function reset($id){
        $dt = User::where('id','=',$id)->first();
        $user = User::find($id);

        $anggota = Anggota::where('nip',$user->username)->get();
        $user->password = Hash::make('userwika123');
        $anggota->password = $user->password;

        $mail = new mailuser();
        $mail->subject = "Pemberitahuan Reset Password";
        $mail->email = $dt->email;
        $mail->isi = $dt->name.", Password anda telah direset oleh Admin. Password default anda yaitu: userwika123";
        $mail->flag = FALSE;
        $mail->save();

        $user->save();
        // $anggota->save();
        return redirect('users')->with('success', 'User saved! Default password is: userwika123');
    }

    public function updatePassword(Request $req)
    {
        $user = User::find($req->id);
        $user->password = Hash::make($req->pwd);
        $user->save();
    }

}
