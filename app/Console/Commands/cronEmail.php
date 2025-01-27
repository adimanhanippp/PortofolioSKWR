<?php

namespace App\Console\Commands;

use App\mailuser;
use Illuminate\Console\Command;
use App\Mail\EmailNotif;
use Illuminate\Support\Facades\Mail;
// use resources\views\vendor\mail\html\default.blade.php;
// use DB;

class cronEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->users = mailuser::where('flag',0)->get();
        // dd($user);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      foreach ($this->users as $user) {
        Mail::send('email.admin', ['data' => $user], function($message){
          $message->to($user->email)->subject($user->subject);
        });
        // Mail::to($user->email)->send(new EmailNotif($user));
        $user->flag = 1;
        $user->save();
      }
    }
}
