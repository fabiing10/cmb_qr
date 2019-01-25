<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;

class Email extends Model
{
    //

    public function sendEmail($data,$emails){

      Mail::send($data['template'], $data, function($message) use($emails,$data){
            foreach ($emails as $email) {
                   $message->to($email);
            }
            $message->subject($data['subject']);
        });


    }
}
