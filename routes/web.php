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

Route::get('/', 'XSiteController@home');
Route::get('/about', 'XSiteController@about');

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');




Route::group(['middleware' => ['auth', 'checkrole:admin']], function () {
    Route::get('/xsiswa', 'XsiswaController@index');
    Route::post('/xsiswa/create', 'XsiswaController@create');
    Route::get('/xsiswa/{xsiswa}/edit', 'XsiswaController@edit');
    Route::post('/xsiswa/{xsiswa}/update', 'XsiswaController@update');
    Route::get('/xsiswa/{xsiswa}/delete', 'XsiswaController@delete');
    Route::get('/xsiswa/{xsiswa}/profile', 'XsiswaController@profile');
    Route::post('/xsiswa/{xsiswa}/addnilai', 'XsiswaController@addnilai');
    Route::get('/xsiswa/{xsiswa}/{idxmapel}/deletenilai', 'XsiswaController@deletenilai');
    Route::get('/xguru/{id}/profile', 'XguruController@profile');
    Route::get('/xsiswa/exportExcel', 'XsiswaController@exportExcel');
    Route::get('/xsiswa/exportPDF', 'XsiswaController@exportPDF');
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