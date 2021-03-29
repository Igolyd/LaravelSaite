<?php

namespace App\Http\Middleware;

use App\Http\Requests\ForumRequest;
use Closure;
use Illuminate\Http\Request;
use App\Models\Foruma;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Gate;

class ThisUserIsThatUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param \App\Http\Requests\ForumRequest 
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle( Request $request, Closure $next)
    {
        $id = $request->route('id');
        $name = $request->all();
        if(Auth::user()->name !== $name){
            dd($id);
        }
        Gate::define('edit-post', function ($user, $post) {
            return $user->name === $post->user_id;
        });
        return redirect()->route('oneForum',$id);
    }
}
