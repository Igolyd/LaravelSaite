<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProvileController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/create_form', function () {
    return view('mabe');
})->middleware('verified','auth:sanctum')->name('mabe');

Route::get('/provile/edit', [ProvileController::class, 'editProvile']
)->middleware('verified','auth')->name('editProvile');

Route::post('/support/supporttop',[CheckoutController::class, 'checksup'])->name('mobius')->middleware('verified','auth:sanctum');
Route::get('/forum/set',[CheckoutController::class, 'setforum'])->name('setforum');

Route::get('/support', function () {
    return view('contacts');
})->name('contact')->middleware('verified','auth:sanctum');

Route::post('/forum/submit',[CheckoutController::class, 'subforum'])->name('subforum');
Route::get('/forum/set/{id}',[CheckoutController::class, 'showOneForum'])->name('oneForum');
Route::get('/forum/set/{id}/edit',[CheckoutController::class, 'updateOneForum'])->middleware('auth')->name('updateOneForum');
Route::post('/forum/update/{id}',[CheckoutController::class, 'updateForum'])->name('updateForum');
Route::post('/forum/setmessage/{id}',[CheckoutController::class, 'createMessage'])->name('createMessage');