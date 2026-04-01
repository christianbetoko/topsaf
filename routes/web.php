<?php

use App\Livewire\Formations;
use App\Livewire\SingleFormation;
use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\History;
use App\Livewire\InscriptionFormation;
use App\Livewire\Produits;
use App\Livewire\Produit;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', Home::class)->name('home');
Route::get('/historique', History::class)->name('history');
Route::get('/formations', Formations::class)->name('formations');
Route::get('/produits', Produits::class)->name('produits');
Route::get('/produit/{slug}', Produit::class)->name('produit');
Route::get('/formation/{slug}', SingleFormation::class)->name('formation');
Route::get('/inscription-formation/{slug}', InscriptionFormation::class)->name('inscription-formation');
