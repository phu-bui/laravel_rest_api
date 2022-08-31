<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Notifications\EmailNotification;
use App\Mail\DbTemplateMail;
use App\Models\NotiTemplate;
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

    public function send($email){
        // Query the required template
        $noti_template = NotiTemplate::first();
        $template = $noti_template->template;
        Mail::to($email)->send(new DbTemplateMail($template));
        return back()->withInput();
    }
}
