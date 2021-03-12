<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\IUserRequest;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;


class ProvileController extends Controller
{
    public function setProvile($name){
        $user = new User();
        return view('provile',['user'=>$user->find($name)]);
    }
    public function editProvile($name){
        $user = new User();
        return view('update-provile',['user'=>$user->find($name)]);
    }
    public function editProvileSubmit($name, IUserRequest $request){
        $user = User::create([
            'name' => $request['name'],
        ]);
        return redirect()->route('setProvile', $name);
    }
    public function logoutSelf(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
