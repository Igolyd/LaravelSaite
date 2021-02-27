<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/forum', function () {
    return view('forum');
})->name('forum');

Route::get('/news', function () {
    return view('news');
})->name('news');

Route::get('/provile', function () {
    return view('provile');
})->middleware('verified')->name('provile');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/support', function () {
    return view('contact');
})->middleware('verified')->name('contact');

Auth::routes(['verify' => true, 'logout' => true]);
Route::post('/support/supporttop',[CheckoutController::class, 'checksup'])->name('mobius');
Route::post('logout-others', function (Request $request) {
    if(Hash::check($request["password"], $request->user()->getAuthPassword())) {
        Auth::logoutOtherDevices($request["password"]);
        return redirect('/provile')->with('status', 'Вышли на других устройствах');
    }
    else {
        return redirect('/provile')->with('warning', 'Пароль не совпадает с текущим');
    }
});
Route::post('logout-self', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
});
Route::post('/reg/checkout', [CheckoutController::class, 'checkreg'])->name('checkout');