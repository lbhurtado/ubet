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

Route::resource('articles', 'ArticleController');

Route::get('/', function (\Illuminate\Http\Request $request) {
    $user = $request->user();

    $user->updatePermissionTo('edit posts'); //'edit posts', 'delete posts'

    return new \Illuminate\Http\Response('hello', 200);
//    var_dump($user->can('delete users'));
});

//Route::get('/', function () {
//    return view('welcome');
//});

Route::match(['get', 'post'], '/botman', 'BotManController@handle');
Route::get('/botman/tinker', 'BotManController@tinker');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'role:admin'], function () {

    Route::group(['middleware' => 'role:admin,delete users'], function () {
        Route::get('/admin/users', function (){
            return 'Delete users';
        });
    });

    Route::get('/admin', function (){
        return 'Admin Panel';
    });
});
