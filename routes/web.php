<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/index', function () {
    return view('/youth');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// rotas p usuarios autenticados
Route::middleware(['auth'])->group(function () {
    Route::resource('posts','PostController');
    Route::resource('postcomments','PostCommentController');
});

Route::resource('videos','VideoController');

Route::any('/confirmacao/{email}/{token}', 'CadasConfirmController@confirmacao')->name('comfirmacao');

Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Teste',
        'body' => 'Olá Seja Bem-Vino'
    ];
   
    \Mail::to('jonatasjt.silva69@gmail.com')->send(new \App\Mail\MyTestMail($details));
   
    //dd("Email is Sent.");
});

Route::middleware(['admin'])->group(function () {
    Route::resource('users','UserController');
});

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile/update', 'ProfileController@updateProfile')->name('profile.update');

Route::middleware(['auth'])->group(function () {
    Route::get('/approval', 'HomeController@approval')->name('approval');

    Route::middleware(['approved'])->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
        
    });

    Route::middleware(['admin'])->group(function () {
        Route::get('/users', 'ApprovalController@index')->name('admin.users.index');
        Route::get('/users/{user_id}/approve', 'ApprovalController@approve')->name('admin.users.approve');
        Route::get('/videos', 'VideoController@index')->name('videos');
        Route::get('/lista', 'UserController@getUsers')->name('lista');
        Route::get('/contacts', 'ContactController@index')->name('contacts');
        Route::get('/administrativo','AdministrativoController@index')->name('administrativo');
        
    });
});