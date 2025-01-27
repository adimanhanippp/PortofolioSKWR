<?php

namespace App\Http\Controllers;
use App\mailuser;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailNotif;

use Illuminate\Http\Request;

class Email extends Controller
{
  public function store(Request $request)
  {
      $users = User::get();
      $this->validate(request(), [
      'title'    =>'required',
      'body'    =>'required',
    ]);
      $post = new Post;
      $post->title = $request->title;
      $post->body = $request->body;
      $post->save();
      foreach($users as $user)
      {
          Mail::to($user->email)->send(new admin($post));
      }
      return redirect('/');
  }
  public function send(){
    $users = mailuser::where('flag',0)->get();
    foreach ($users as $user) {
      //dd($user->email);
      Mail::to($user->email)->send(new EmailNotif($user));
      $user->flag = 1;
      $user->save();
    }
  }
}
