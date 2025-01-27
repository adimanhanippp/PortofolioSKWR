<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\RegistrationRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Mail\EmailNotif;
use Illuminate\Support\Facades\Mail;
use Validator;

use App\Jobs\SendEmail;
use Carbon\Carbon;


use DB;
use Hash;
use App\register;
use App\Role;
use App\Roleuser;
use App\Anggota;
use App\mailuser;
use Entrust;
use Datatables;
use Notifiable;
use Notification;

use App\Notifications\notifadmin;


/**
 *
 */
class registerCtrl extends Controller
{

  function index()
  {
    // code...
    return view('login.registrasi');
  }

  public function approveView(){
    return view('Approve.approve');
    // $data = register::all();
    // return view('Approve.submit',['data'=>$data]);
  }

  public function dat(){
    $data = register::all();
    $dt = register::first();
    // echo($dt);
    // echo($dt->nip);

    if($dt){
        return Datatables::of($data)
        ->addColumn('No', function($data) {
          return NULL;
      })
        ->addColumn('action', function($data) {
                $html = Entrust::can('approved') ? '<a href="'. url('approve/update/'.$data->id) .'" class="text-danger row-edit" data-toggle="tooltip" title="Input Nomor Anggota" ><span class="glyphicon glyphicon-edit"></span></a>' : '';
                $html .= Entrust::can('approve_delete') ? '&nbsp;&nbsp;<a href="javascript:" data-url="'. url('approve/delete/'.$data->id) .'" class="text-danger row-delete" data-toggle="tooltip" title="Delete User"><span class="glyphicon glyphicon-trash"></span></a>' : '';
                return $html;
          })
        ->addColumn('approve', function($data) {
          $html = Entrust::can('approved') ? '<a href="'. url('approve/save/'.$data->id) .'" class="text-primary row-edit" data-toggle="tooltip" title="Approve User"><span class="glyphicon glyphicon-check"></span>Approve</a>' : '';
          return $html;
        })
          ->make(TRUE);
    }
    else {
      $data = '{"draw": 0, "recordsTotal": 0, "recordsFiltered": 0, "data":[]}';
      return $data;
    }
  }

  public function doRegister(Request $req ){
    return DB::transaction(function() use($req){
      $anu = User::where('username','=',$req->nip)->first();
      $reg = register::where('nip','=',$req->nip)->first();
      if($anu){
        return back()->with('error', 'Username/NIP sudah ada!');
      } elseif ($reg) {
        // code...
        return back()->with('error', 'NIP sudah Terdaftar! Mohon Tunggu Dikonfirmasi oleh Admin');
      }
      else {
        try {
          $register = new register();
          $register->nip = $req->nip;
          $register->noanggota = NULL;
          $register->password = Hash::make($req->password);
          $register->namalengkap = $req->namalengkap;
          $register->email = $req->email;
          $register->nomorhp = $req->nomorhp;
          $register->alamat = $req->alamat;
          $register->jabatan = $req->jabatan;
          $register->unitkerja = $req->unitkerja;
          $register->save();

          $user = User::join('role_user AS r', function ($join){
                    $join->on('users.id','=','r.user_id')
                    ->where('r.role_id','=', 1);
                  })
                  ->get();
          // Mail::to($user)->send(new EmailNotif());
          foreach ($user as $us) {
            $mail = new mailuser();
            $mail->subject = "Pemberitahuan Pendaftaran User Baru";
            $mail->email = $us->email;
            $mail->isi = $us->name.", terdapat user baru yang melakukan pendaftaran, harap segera melakukan approve kepada user berikut ".$req->namalengkap;
            $mail->flag = FALSE;
            // dd($mail);
            $mail->save();
          }
          return redirect('/')->with('success','Register Success');

        } catch (\Exception $e) {
          DB::rollback();
          return back()->with('error', 'Error while saving data! '. $e->getMessage())->withInput();
        }
      }
    });
  }

  public function save(Request $req){
    // dd($req);
    return DB::transaction(function() use($req){
      $register = register::where('id','=',$req->id)->first();
      if ($register->noanggota == NULL) {
        return back()->with('error', 'Anda belum menginputkan nomor anggota!');
      }
      else {
        // code..
      try {
        $user = new User();
        $role = new Roleuser();
        $anggota = new Anggota();

        // $register = register::where('id','=',$req->id)->first();
        // untuk db anggota
        $anggota->nip = $register->nip;

        $anggota->noanggota = $register->noanggota;

        $anggota->password = $register->password;
        $anggota->namalengkap = $register->namalengkap;
        $anggota->nomorhp = $register->nomorhp;
        $anggota->alamat = $register->alamat;
        $anggota->email = $register->email;
        $anggota->jabatan = $register->jabatan;
        $anggota->unitkerja = $register->unitkerja;
        $anggota->save();

        $user->username = $register->noanggota;
        $user->password = $register->password;
        $user->name = $register->namalengkap;
        $user->email = $register->email;
        $user->save();

        $user = User::where('username','=',$register->noanggota)->first();
        $role->user_id = $user->id;
        $role->role_id = 2;
        $role->save();

        // for ($i=0; $i <count($user) ; $i++) {
          $mail = new mailuser();
          $mail->subject = "Pemberitahuan Penerimaan User Baru";
          $mail->email = $user->email;
          $mail->isi = $user->name.", Selamat bergabung dalam keluarga Serikat Karyawan Wika Realty. Silakan Login dengan username : ".$user->username."Dengan password yang anda inputkan saat registrasi";
          $mail->flag = FALSE;

          $mail->save();
        $register = register::where('id','=',$req->id)->delete();
        return redirect('approve')->with('success','Register Success');
    //     // dd($anggota);
    //     // dd($register);
    //
      } catch (\Exception $e) {
        DB::rollback();
        return back()->with('error', 'Error while saving data! '. $e->getMessage())->withInput();
      }
    }
    });
  }

  public function destroy($id)
  {
      $dt = register::where('id','=',$id)->first();

        $mail = new mailuser();
        $mail->subject = "Pemberitahuan Pendaftaran User Baru";
        $mail->email = $dt->email;
        $mail->isi = $dt->namalengkap.", Kami tidak dapat memproses perintaan pendaftaran akun anda, Terima Kasih!";
        $mail->flag = FALSE;
        $mail->save();

      register::where('id','=',$id)->delete();
      return redirect('approve')->with('success', 'register deleted!');
  }


  public function update($id = FALSE){
    $params = [];
    if ($id!==FALSE) {
      $register = register::where('id', '=', $id)->first();
      $params['data'] = $register;
    }
    return view('Approve.submit', $params);
  }

  public function saveupdate(Request $req){
    return DB::transaction(function() use($req){
      $user = User::where('username','=',$req->noanggota)->first();
      $reg = register::where('noanggota','=',$req->noanggota)->first();
      if ($user) {
        // code...
        return back()->with('error', 'Nomor Anggota Sudah Digunakan!');
      }
      elseif ($reg) {
        // code...
        return back()->with('error', 'Nomor Anggota Sudah Digunakan!');
      }
      else {
        // code...
      try {
        $register = register::where('id','=',$req->id)->first();
        $register->noanggota = $req->noanggota;
        $register->save();
        return redirect('approve')->with('success', 'Register Saved');
      } catch (\Exception $e) {
          DB::rollback();
          return back()->with('error', 'Error while saving data! '. $e->getMessage())->withInput();
      }
    }
  });
  }

}
