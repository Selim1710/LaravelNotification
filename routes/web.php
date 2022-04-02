<?php

use App\Models\User;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sent/notification', function () {
    $users = User::all();
    // dd($users);
    foreach($users as $user){
        Notification::send($user, new EmailNotification());
    }
    return redirect()->back()->with('message','Notification Sent');
   
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
