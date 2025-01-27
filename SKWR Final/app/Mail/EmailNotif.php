<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

// use Notification;
// use App\Notifications\notifadmin;

class EmailNotif extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Notification::send($key, new notifadmin($key, "hello"));


      return $this->view('email.admin') //pass here your email blade file
        ->subject($this->data->subject)
        ->text('email.admin_plain')
	    	->with('content',$this->data);

      // return $this->from('sender@example.com')
      //               ->view('email.admin')
      //               ->text('email.admin_plain')
      //               ->with(
      //                 [
      //                   'data' => $this->data,
      //                       'testVarOne' => '1',
      //                       'testVarTwo' => '2',
      //                 ]);

                    //   ->attach(public_path('/images').'/demo.jpg', [
                    //           'as' => 'demo.jpg',
                    //           'mime' => 'image/jpeg',
                    //   ]);
    // }
        // return $this->view('email.admin')->with('img', $img);
    }
}
