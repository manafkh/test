<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::middleware('auth:api')->group(function (){
//
//});
//Route::get('experts','AppointmentsController@index');
//Route::get('/experts/{id}','AppointmentsController@details');


//Route::post('/login', function (Request $request) {
//    $data = $request->validate([
//        'email' => 'required|email',
//        'password' => 'required'
//    ]);
//
//    $user = User::where('email', $request->email)->first();
//
//    if (!$user || !Hash::check($request->password, $user->password)) {
//        return response([
//            'message' => ['These credentials do not match our records.']
//        ], 404);
//    }
//
//    $token = $user->createToken('my-app-token')->plainTextToken;
//
//    $response = [
//        'user' => $user,
//        'token' => $token
//    ];
//
//    return response($response, 201);
//});
//Route::post('auth/register', 'AuthController@register');
//Route::post('auth/login', 'AuthController@login');
////Route::group(['middleware' => 'jwt.auth'], function(){
//    Route::get('auth/user', 'AuthController@user');
//    Route::post('auth/logout', 'AuthController@logout');
//
//
////Route::group(['middleware' => 'jwt.refresh'], function(){
//    Route::get('auth/refresh', 'AuthController@refresh');
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::get('refresh', 'AuthController@refresh');
    Route::get('user', 'AuthController@user');
    Route::get('experts','AppointmentsController@index');
    Route::get('experts/{id}','AppointmentsController@details');
    Route::post('experts/{id}','AppointmentsController@appointment');
});