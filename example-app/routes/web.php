<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProvileController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/create_form', function () {
    return view('mabe');
})->middleware('verified','auth')->name('mabe');

Route::get('/news', function () {
    return view('news');
})->name('news');

Route::get('/provile/{name}', [ProvileController::class, 'setProvile']
)->middleware('verified','auth')->name('setProvile');

Route::get('/provile/{name}/edit', [ProvileController::class, 'editProvile']
)->middleware('verified','auth')->name('editProvile');

Route::post('/provile/{name}/editSubmit', [ProvileController::class, 'editProvileSubmit']
)->middleware('verified','auth')->name('editProvileSubmit');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/support', function () {
    return view('contact');
})->middleware('verified')->name('contact');

Auth::routes(['verify' => true, 'logout' => true]);
Route::post('/support/supporttop',[CheckoutController::class, 'checksup'])->name('mobius');
Route::get('/forum/set',[CheckoutController::class, 'setforum'])->name('setforum');
// Route::get('/provile/set',[CheckoutController::class, 'setprovile'])->name('setprovile');
Route::post('/forum/submit',[CheckoutController::class, 'subforum'])->name('subforum');
Route::post('logout-others', function (Request $request) {
    if(Hash::check($request["password"], $request->user()->getAuthPassword())) {
        Auth::logoutOtherDevices($request["password"]);
        return redirect('/provile')->with('status', 'Вышли на других устройствах');
    }
    else {
        return redirect('/provile')->with('warning', 'Пароль не совпадает с текущим');
    }
});

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::post('logout-self',[ProvileController::class, 'logoutSelf']
)->middleware('verified','auth')->name('logout-self');
Route::get('/forum/set/{id}',[CheckoutController::class, 'showOneForum'])->name('oneForum');