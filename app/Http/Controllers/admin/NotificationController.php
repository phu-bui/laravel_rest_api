<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Notifications\EmailNotification;
use App\Mail\DbTemplateMail;
use App\Models\User;
use Mail;

class NotificationController extends Controller
{
    //
    // public function send() 
    // {
    // 	$user = User::first();
  
    //     $project = [
    //         'greeting' => 'Hi '.$user->name.',',
    //         'body' => 'This is the project assigned to you.',
    //         'thanks' => 'Thank you this is from codeanddeploy.com',
    //         'actionText' => 'View Project',
    //         'actionURL' => url('/'),
    //         'id' => 57
    //     ];
  
    //     Notification::send($user, new EmailNotification($project));
   
    //     dd('Notification sent!');
    // }

    public function send(){
        // Query the required template
        $user = User::first();
        $template = "<!DOCTYPE html>
        <html>
        <head>
            <title>StartBlog.com</title>
        </head>
        <body>
            <h1>Modyfi</h1>
            <p>Body</p>
            
            <p>Thank you</p>
        </body>
        </html>
        "; 
        Mail::to($user->email)->send(new DbTemplateMail($template));
        dd("Email is Sent.");
    }
}
