<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;


Route::get('/', function () {
    return view('welcome');
});

Route::view('/home','gautam'); //route banene ka short method hai / me url ka name jo url me show karega then apne folder ka name

//Route::redirect('home','/'); //is ka work yeh hota hai to app ak page ke url se dusare page par automatice redirect ho jate ho

//Route ke method 1). Route::get($url, $callback); 2). Route::post($url, $callback); 3). Route::put($url, $callback); 4). Route::patch($url, $callback); 5). Route::delete($url, $callback); 6). Route::option($url, $callback);

Route::get('user',[User::class,'fat']);

Route::get('gamesh',[User::class,'love']);

