<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Checkout;
use App\Models\Foruma;
use App\Models\User;
use App\Models\MessagePeople;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\MessagePeopleRequest;
use App\Http\Requests\ForumRequest;

class CheckoutController extends Controller
{
    public function imageUpload()
    {
        return view('imageUpload');
    }
  
    public function getProvile(){
        return view('provile');
    }

    public function checksup(CheckoutRequest $req){
   $checkout = new Checkout();
   $checkout->title = $req->input('typeprob');
   $checkout->message = $req->input('message');
   $checkout->NamePeople = Auth::user()->name;
   $checkout->EmailPeople = Auth::user()->email; 

   $checkout->save();

   return redirect()->route('dashboard')->with('good', 'The message was sent');
    }
    public function subforum(ForumRequest $request){
       $forum = new Foruma();
       $forum->message = $request->input('message');
       $forum->title = $request->input('forma');
       $forum->NamePeople = Auth::user()->name;
       $forum->EmailPeople = Auth::user()->email; 
       
       $forum->save();
       return redirect()->route('setforum');
    }
    public function setforum(){
        $forum = new Foruma();
        return view('forum',['date'=>$forum->all()->sortByDesc('id')]);
    }
    public function showOneForum($id){
        $forum = new Foruma();
        $date = new MessagePeople();
        return view('post',['data'=>$forum->find($id), 'forum'=>$date->all()->sortByDesc('id')]);

    }
    public function updateOneForum($id){
        $forum = new Foruma();
        $data = new MessagePeople();
        if(Auth::user()->name === $forum->NamePeople){
            return view('updatepost',['data'=>$forum->find($id)]);

        }
        else{
            return back();
        }
    }
    public function updateForum($id, ForumRequest $request){
        $forum = Foruma::find($id);
        $forum->message = $request->input('message');
        $forum->title = $request->input('forma');
        $forum->NamePeople = Auth::user()->name;
        $forum->EmailPeople = Auth::user()->email; 
        
        $forum->save();
        return redirect()->route('oneForum', $id);
    }
    public function createMessage($id, MessagePeopleRequest $request){
        $data = Foruma::find($id);
        $forum = new MessagePeople();
        $forum->message = $request->input('message');
        $forum->NamePeople = Auth::user()->name;
        $forum->ForumId = $id;
        $forum->profile_photo_path = Auth::user()->profile_photo_url;
        $forum->PeopleID = Auth::user()->id;
        $forum->save();
        return redirect()->route('oneForum',$id);
    }
}
