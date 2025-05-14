<?php

use App\Http\Livewire\Cliente;
use App\Http\Livewire\ClientesDashboard;
use App\Http\Livewire\Sorteo;
use App\Http\Livewire\Usuarios;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



// Auth::routes(['register' => false]);
Auth::routes();

Route::get('/', Cliente::class);
Route::get('/sorteo', Sorteo::class);

Route::group(['middleware' => ['auth']], function (){
    Route::get('/usuarios', Usuarios::class)->name('usuarios');
    Route::get('/clientes', ClientesDashboard::class)->name('clientes');
});
