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

Route::get('/test',function (){
$weekend = App\Setting::where('name','weekend')->first();
$weekend = json_decode($weekend->data);

$date = Carbon::parse('10/12/2017');
$date=$date->format('D');
dd($date);

});

Auth::routes();


Route::get('/', function () {
    return redirect('/login');
});


/*
|--------------------------------------------------------------------------|
|                            Admin Routes                                   |
|--------------------------------------------------------------------------|
*/

Route::group(['prefix='=>'admin','middleware'=>['auth','admin']],function (){

    Route::get('/admin','Admin\AdminController@index')->name('admin');
    Route::get('dashboard','Admin\AdminController@index')->name('admin.dashboard');

});


/*
|--------------------------------------------------------------------------|
|                             Employee Routes                               |
|--------------------------------------------------------------------------|
 */
Route::group(['prefix'=>'emp','middleware'=>['auth','emp']],function(){

});

