<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TestController;
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

Route::get('testMail', [TestController::class, '__invoke']);

Route::get('/getIntent',[PaymentController::class,'getSetUpIntent']);
Route::get('/createUser',[PaymentController::class,'createUser']);
Route::post('/postPayment',[PaymentController::class,'postPayment']);
Route::get('/paymentMethods',[PaymentController::class,'getPaymentMethods']);
Route::get('/singlePayment',[PaymentController::class,'singlePayment']);
Route::get('/suscribe',[PaymentController::class,'subscription']);
Route::get('/cancelSuscription',[PaymentController::class,'cancelSubscription']);
Route::get('/resumeSuscription',[PaymentController::class,'resumeSuscription']);
