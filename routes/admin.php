<?php

use App\models\admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Auth::routes();



Route::group(['namespace' => 'admins'], function () {
    Route::post('admin/login','CustomController@checkAdminLogin');
    Route::post('admin/logout','CustomController@logout');



    Route::get('/AdminToken', function (Request $request) {
        $id = auth::guard('admin')->user()->id;
        $user = admin::find($id);
        $token= $user->createToken('my-admin-web');
        return response()->json($token);
    });

    Route::get('adminUser', function () {

        $id = auth::guard('admin')->user()->id;
       $admin = admin::find($id);

       $token= $admin->createToken('my-admin-web');
       // $admin->setAttribute('added_at',$admin->created_at->diffForHumans());

       return response()->json($admin);
    });

    Route::get('/admin', function () {

   return view('admin');
    });






});












