<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //

    public function send(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required'
        ]);
  

        if($this->isOnline()){
           $mail_data = [
               'recipient'=> 'vincemichaellingon@gmail.com',
               'fromEmail'=>$request->email,
               'fromName'=>$request->name,
               'subject'=>$request->subject,
               'body'=>$request->message
           ];

           \Mail::send('email-template',$mail_data, function($message) use ($mail_data){
               $message->to($mail_data['recipient'])
                       ->from($mail_data['fromEmail'],$mail_data['fromName'])
                       ->subject($mail_data['subject']);
           });

           return redirect()->back()->with('success','Email Successfuly Sent!');
        }else{
            return redirect()->back()->withInput()->with('error','Check your internet connection');
        }
    }

        public function isOnline($site = "https://youtube.com/"){
            if(@fopen ($site, "r")){
                return true;
            }else{
                return false;
            }
        
    }
}
