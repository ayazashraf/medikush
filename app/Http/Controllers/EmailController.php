<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Redirect,Response,Config;
use Mail;
use Illuminate\Support\Facades\DB;

class EmailController extends Controller
{
    public function sendEmail()
    {
      $users = DB::table('users')->distinct()->get();
      var_dump($users);
        $data['title'] = "This is Test Mail Tuts Make";
 
        Mail::send('email', $data, function($message) {
 
            $message->to('ayaz@foreigntree.com', 'Foreign Tree')
 
                    ->subject('New Email ');
        });
 
        if (Mail::failures()) {
           return response()->Fail('Sorry! Please try again latter');
         }else{
           return response()->success('Great! Successfully send in your mail');
         }
    }
}