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
    return view('home');
});

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');




Route::group(['middleware' => ['auth', 'checkrole:admin']], function () {
    Route::get('/xsiswa', 'XsiswaController@index');
    Route::post('/xsiswa/create', 'XsiswaController@create');
    Route::get('/xsiswa/{id}/edit', 'XsiswaController@edit');
    Route::post('/xsiswa/{id}/update', 'XsiswaController@update');
    Route::get('/xsiswa/{id}/delete', 'XsiswaController@delete');
    Route::get('/xsiswa/{id}/profile', 'XsiswaController@profile');
    Route::post('/xsiswa/{id}/addnilai', 'XsiswaController@addnilai');
    Route::get('/xsiswa/{id}/{idxmapel}/deletenilai', 'XsiswaController@deletenilai');
});


Route::group(['middleware' => ['auth', 'checkrole:admin,xsiswa']], function () {
    Route::get('/dashboard', 'DashboardController@index');
});

/*
Route::get('/good', function () {
    return view('welcome', ['name' => 'Jojo']);
});*/
/*
Route::get('home', function () {
    return view('main');
});
/*
Route::get('/foo', function () {
    return "HELLO BRO";
});

Route::redirect('/here', '/foo');
Route::get('user/{name?}', function ($name = 'Alvin') {
    return $name;
});

/*Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        // Matches The "/admin/users" URL
        return "admin > users";
    });
});*/

/*
Route::get('/users/{user}', function (User $user) {
    return $user->email;
});
*/