<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Notifications\Notifiable;

use App\Menu;
use App\Permission;
use App\Polling;
use App\PollingAns;
use App\PollingAnsUser;
use App\User;
use Notification;
use Carbon\Carbon;
use Auth;
use Entrust;
use Datatables;
use DB;

use App\Notifications\notifadmin;
use App\Jobs\QueueUserNotificationsJob;



/**
 *
 */
class PollingCtrl extends Controller
{

  public function index()
  {
    if (Entrust::can('polling_create')) {
      return view('polling.polling');
    }
    else {
      return redirect('polling/user');
    }
    // return view('polling.polling');
  }

  public function gdata(){
    $data = Polling::orderBy('id', 'DESC')->get();
    $dt = Polling::first();
    if ($dt) {
      return Datatables::of($data)
      ->addColumn('No', function($data) {
          return NULL;
      })
      ->addColumn('active', function($data){
        if ($data->active == 0) {
          return FALSE;
        }
        else {
          return TRUE;
        }
      })
      ->addColumn('action', function($data) {
        if($data->active == FALSE){
          if ($data->done == FALSE) {
            return '<a href="'.url('polling/activate/'.$data->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Activate</a>';
          }
        }else {
          return '<a href="'.url('polling/deactivate/'.$data->id).'" class="btn btn-xs btn-primary" style="background-color: #f44336"><i class="glyphicon glyphicon-edit"></i> Deactivate</a>';
        }
        // return '<a href="/admin/faculty/'.$faculties->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
      })
      ->make(TRUE);
    }
    else {
     $data = '{"draw": 0, "recordsTotal": 0, "recordsFiltered": 0, "data":[]}';
     return $data;
   }
  }

  public function create($id = FALSE){
    $params = [];
    if ($id!==FALSE) {
      $polling = Polling::where('id', '=', $id)->first();
      $params['data'] = $polling;
    }
    return view('polling.create', $params);
  }

  public function tambah(Request $req){
    return DB::transaction(function() use($req) {
        try {
          $pol = new Polling;
          $pol->question = $req->question;
          $pol->total_ans = $req->total;
          $pol->save();

          for($i = 1; $i <= $req->total; $i++){
            $tah = 'ans'.$i;
            $lol = $req->$tah;
            $rows[] = array('ans' => $lol,
                            'idquestion' => $pol->id,
                            'updated_at' => date('Y-m-d H:i:s'));
          }
          PollingAns::insert($rows);
          return redirect('polling')->with('success', 'Data saved!');
          } catch(\Exception $e) {
            DB::rollback();
            return redirect('polling/create')->with('error', 'Error while saving data! '. $e->getMessage())->withInput();
            }
          });
  }

  public function activate($id){
    $pol = Polling::where('id','=',$id)->first();
    $pol->active = TRUE;

    $opol = Polling::where('active','=', TRUE)->first();
    if ($opol) {
      $this->deactivate($opol->id);
    }

    $pol->save();

    // dispatch(new QueueUserNotificationsJob(Auth::user()->id));
    $user = User::get();
    // $when = Carbon::now()->addSecond(10);
    Notification::send(User::all(), new notifadmin("New Polling Has Been Activated, Please Check Your Account!"));

    // foreach ($user as $key => $user) {
    //   $user->notify(new notifadmin("New Polling Has Been Activated, Please Check Your Account!"));
    // }

    return view('polling.polling')->with('success', 'Polling Activated')->with(dispatch(new QueueUserNotificationsJob(Auth::user()->id)));
  }

  public function deactivate($id){
    $pol = Polling::where('id','=',$id)->first();
    $pol->active = FALSE;
    $pol->done = TRUE;
    $pol->save();

    return view('polling.polling')->with('success', 'Polling Deactivated');
  }

  public function user(){
    $param = [];
    $ans = null;
    $pol = Polling::where('active','=', TRUE)->get();
    $poli = Polling::where('active','=', TRUE)->first();
    if ($poli) {
      $ans = PollingAns::where('idquestion','=',$pol[0]->id)->get();
      $params['pol'] = $pol;
      $params['ans'] = $ans;
      $poluser = PollingAnsUser::where('id_polling','=',$pol[0]->id)->where('id_user','=',Auth::user()->id)->get();
      $polus = PollingAnsUser::where('id_polling','=',$pol[0]->id)->where('id_user','=',Auth::user()->id)->first();
      if ($polus) {
        $params['ada'] = true;
        // dd($poluser);
      }else {
        $params['ada'] = false;
      }
      // dd($poluser);
      return view('polling.coba')->with($params);
    }
    return back()->with('error', 'No Polling Need to be Vote');
    // echo($ans);

  }

  public function save(Request $req){
    return DB::transaction(function() use($req) {
        try {
          $pol = new PollingAnsUser();
          $pol->id_polling = $req->id_polling;
          $pol->id_user = $req->id_user;
          $pol->id_ans = $req->id_ans;
          // dd($pol);

          $pol->save();
          return back()->with('success','Data Saved!');
          }catch(\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Error while saving data! '. $e->getMessage())->withInput();
            }
          });

  }

  public function entahlah($id){
    $params = array();
    $par = array();
    $paramp = [];
    $ques = Polling::where('id','=',$id)->first();
    $ans = PollingAns::where('idquestion','=', $id)->get();
    $ans1 = $ans[0]->id;
    $ansuser = PollingAnsUser::where('id_polling','=',$id)->get();
    $totalans = $ques->total_ans;

    for ($i=0; $i < $totalans; $i++) {
      ${"variable$i"}=0;
      }
    for ($i=0; $i < count($ansuser); $i++) {
      for ($j=0; $j < $totalans ; $j++) {
        if ($ansuser[$i]->id_ans == $ans1+$j) {
          ${"variable$j"} +=1;
        }
      }
    }
    // dd($variable0);
    for ($i=0; $i < $totalans; $i++) {
      array_push($params, ${"variable$i"});
      array_push($par, $ans[$i]->ans);
      // $params.append(${"variable$i"});
      // $params['data'.$i] = ${"variable$i"};
    }
    $paramp['var'] = $params;
    $paramp['isi'] = $par;
    // dd($paramp);
    return ($paramp);
    // return count($ans);
  }

  public function viewadmin(){
    $poli = Polling::where('active','=', TRUE)->first();
    $param['pol'] = $poli;
    // dd($poli->question);
    return view("polling.hasil")->with($param);
  }

  public function admin(){
    $poli = Polling::where('active','=', TRUE)->first();
    $ans = PollingAns::where('idquestion', $poli->id)->get();

    if ($poli) {
      return($this->entahlah($poli->id));
    }
  }

}

 ?>
