<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Menu;
use App\Permission;
use App\User;
use DB;
use Notification;

use App\Notifications\contact;

/**
 *
 */
class ContacsCtrl extends Controller
{

  function index()
  {
    return view('contacs.ct');
  }

  function mail(Request $req){
    try {
      $user = User::join('role_user AS r', function ($join){
                $join->on('users.id','=','r.user_id')
                ->where('r.role_id','=', 1);
              })
              ->get();
      // dd($req->Name);
      Notification::send($user, new contact($req->Name, $req->Email, $req->Messages));
      return back()->with('success', 'your message has sent');
    } catch (\Exception $e) {
      return back()->with('error', 'your message has not sent '.$e->getMessage())->withInput();
    }
  }

}

 ?>
