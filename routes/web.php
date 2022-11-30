<?php

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

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'role:cliente', 'prefix' => 'cliente', 'as' => 'cliente.'], function() { 
        Route::resource('paginas', \App\Http\Controllers\Clientes\ClienteControlador::class);
        Route::get('/success/{check}', [\App\Http\Controllers\Clientes\CheckoutControlador::class, 'correo']);
        Route::get('/recibos', [\App\Http\Controllers\Clientes\CheckoutControlador::class, 'recibos']);
        Route::post('/pdf/{check}', [\App\Http\Controllers\Clientes\CheckoutControlador::class, 'pdf']);
        Route::resource('checkout', \App\Http\Controllers\Clientes\CheckoutControlador::class);
    });
   Route::group(['middleware' => 'role:trabajador', 'prefix' => 'trabajador', 'as' => 'trabajador.'], function() {
       Route::resource('servicios', \App\Http\Controllers\Trabajador\TrabajadorControlador::class);
   });
   Route::post('webhooks',\App\Http\Controllers\WebhooksControlador::class);
});
