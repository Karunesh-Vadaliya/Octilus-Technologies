<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
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
    return view('index');
});
Route::post('user/unique', [UserController::class, 'userUnique']);
Route::post('user/details', [UserController::class, 'saveUserDetails'])->name('user-details');
Route::get('user/details/{id}', [UserController::class, 'getUserDetails'])->name('get-user-details');
Route::post('user/address', [UserController::class, 'saveUserAddresses'])->name('user-address');
Route::get('/thank-you', function () {
    return view('thank_you');
})->name('thankyou');