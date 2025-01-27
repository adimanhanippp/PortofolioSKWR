<?php

namespace App\Jobs;
use App\user;
use Notification;
use App\Notifications\notifadmin;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class QueueUserNotificationsJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
     public $authUserId = null;

     public function __construct($authUserId) {

       $this->authUserId = $authUserId;

      }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = User::get();
        Notification::send($user, new notifadmin("New Polling Has Been Activated, Please Check Your Account!"));
    }
}
