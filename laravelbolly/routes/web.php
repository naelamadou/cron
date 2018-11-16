<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function(){


	return view('pages.index')->with('title','Home page');

});

Route::get('/index', function(){



	return view('index');
});

Route::post('/index', function(){


	return 'Merci '.request('nom').'<br><br>Nous vous enverrons un message sur votre mail: '.request('email');
});

Route::get('/home/{prenom}', function(){

$prenom = request('prenom');


	return view('home', ['prenom'=>$prenom]);
});