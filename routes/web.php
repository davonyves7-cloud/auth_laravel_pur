<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/connexion');
});

/*
|--------------------------------------------------------------------------
| Inscription
|--------------------------------------------------------------------------
*/

Route::get('/inscription', [AuthController::class, 'showRegister'])
    ->name('inscription');

Route::post('/inscription', [AuthController::class, 'register'])
    ->name('inscription.register');


/*
|--------------------------------------------------------------------------
| Connexion
|--------------------------------------------------------------------------
*/

Route::get('/connexion', [AuthController::class, 'showLogin'])
    ->name('connexion');

Route::post('/connexion', [AuthController::class, 'login'])
    ->name('connexion.login');


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [AuthController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| Déconnexion
|--------------------------------------------------------------------------
*/

Route::post('/deconnexion', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('deconnexion');