<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use App\Models\Checkout;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth' ,'verified']);
    }

    public function checksup(CheckoutRequest $req){
   $checkout = new Checkout();
   $checkout->title = $req->input('typeprob');
   $checkout->message = $req->input('message');

   $checkout->save();

   return redirect()->route('home');
    }
    public function checkreg(CheckoutRequest $req){
        $name = $req->name;
        $email = $req->email;
        $password = $req->password;
        $password = password_hash($password,PASSWORD_DEFAULT);
        DB::table('users')->insert(['name' => $name, 'email' => $email,
        'password' => $password]);
 }
}
