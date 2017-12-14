<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/notifications',function(){
        $data = DB::table('notifications')->where('read_at',Null)->orWhere('read_at','!=',null)->limit(5)->latest()->get();
        //$data2 = DB::table('notifications')->where('read_at',Null)->limit(5)->latest()->get();
        return $data;
});

Route::get('/markasread',function(){
        $unreads = DB::table('notifications')->where('read_at',Null)->get();
        foreach( $unreads as $unread):
            $data['read_at']=Carbon\Carbon::now();
             DB::table('notifications')->where('id',$unread->id)->update($data);
            endforeach;

});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
