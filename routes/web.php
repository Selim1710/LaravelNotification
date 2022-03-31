<?php

use App\Models\User;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/sent/notification', function () {
    $users = User::find(2);
    // dd($users);
    $users->notify(new EmailNotification);
    return redirect()->back();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
