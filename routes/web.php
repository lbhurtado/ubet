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

use App\User;

Route::resource('articles', 'ArticleController');

//Route::get('/', function () {
//   DB::listen(function ($query) {
//     var_dump($query->sql);
//   });
//
//   $user = User::find(1);
//
//   dd($user->phoneNumber->dialling_code->id);

//   $user->phoneNumber()->create([
//      'phone_number' => '9173011987',
//       'dialling_code_id' => 171
//   ]);
//
//       dd($user->phoneNumber);

//   $user->messengers()->create([
//       'driver' => 'Telegram',
//       'chat_id' => '123456789'
//   ]);
//
//   dd($user->messengers);

//});
//Route::get('/', function (\Illuminate\Http\Request $request) {
//    $user = $request->user();
//
//    $user->updatePermissionTo('edit posts'); //'edit posts', 'delete posts'
//
//    return new \Illuminate\Http\Response('hello', 200);
//    var_dump($user->can('delete users'));
//});

Route::get('/', function () {
    return view('welcome');
});

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

Route::get('/auth/token', 'Auth\AuthTokenController@getToken')->name('auth.token');
Route::post('/auth/token', 'Auth\AuthTokenController@postToken');
Route::get('/auth/token/resend', 'Auth\AuthTokenController@getResend')->name('auth.token.resend');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/settings/twofactor', 'TwoFactorSettingsController@index')->name('settings.twofactor');
    Route::put('/settings/twofactor', 'TwoFactorSettingsController@update')->name('settings.twofactor.update');
});