<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthAuthController;
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


Route::get('index', [AuthAuthController::class, 'login'])->name('login');  // "index" est mon url_name que je veux. le premeier "login" est ma fonction qui est dans la classe "AuthAuthController" / le deuxieme login est l'appellation pour le reprensenter si je suis a l'exterieur de ce fichier

Route :: get ('registration', [AuthAuthController::class, 'registration'])->name('registration');


Route:: post('post_registration', [AuthAuthController::class, 'postRegistration'])->name('post-registration');


Route:: post('post_login',[AuthAuthController::class, 'postLogin'])->name('post-login');


Route:: post('post_logout',[AuthAuthController::class, 'postLogout'])->name('post-logout');


Route:: get('dashboard',[AuthAuthController::class, 'dashboard'])->name('dashboard');