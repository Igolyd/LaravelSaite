<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Checkout;
use App\Models\Foruma;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ForumRequest;

class CheckoutController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUpload()
    {
        return view('imageUpload');
    }
  
    public function __construct()
    {
        $this->middleware(['auth' ,'verified']);
    }
    public function getProvile(){
        return view('provile');
    }

    public function checksup(CheckoutRequest $req){
   $checkout = new Checkout();
   $checkout->title = $req->input('typeprob');
   $checkout->message = $req->input('message');
   $checkout->NamePeople = Auth::user()->name;

   $checkout->save();

   return redirect()->route('home');
    }
    public function subforum(ForumRequest $request){
       $forum = new Foruma();
       $forum->path_img = $request->file('image_forum')->store('uploads','public');
       $forum->message = $request->input('message');
       $forum->title = $request->input('forma');
       $forum->namePeople = Auth::user()->name;
       
       $forum->save();
       return redirect()->route('setforum');
    }
    public function setforum(){
        $forum = new Foruma();
        return view('forum',['date'=>$forum->all()->sortByDesc('id')]);
    }
    public function showOneForum($id){
        $forum = new Foruma();
        return view('post',['data'=>$forum->find($id)]);

    }
}
