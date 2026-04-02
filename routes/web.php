<?php

use App\Livewire\Conferences;
use App\Livewire\Formations;
use App\Livewire\SingleFormation;
use App\Livewire\SingleConference;
use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\History;
use App\Livewire\InscriptionFormation;
use App\Livewire\InscriptionConference;
use App\Livewire\Produits;
use App\Livewire\Apropos;
use App\Livewire\NosAdresses;
use App\Livewire\Produit;
use App\Livewire\Contact;
use App\Livewire\Evenements;
use App\Livewire\Evenement;

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
Route::get('/apropos', Apropos::class)->name('about');
Route::get('/contact', Contact::class)->name('contact');
Route::get('/nos-adresses', NosAdresses::class)->name('nos-adresses');
Route::get('/formations', Formations::class)->name('formations');
Route::get('/conferences', Conferences::class)->name('conferences');
Route::get('/evenements', Evenements::class)->name('evenements');
Route::get('/evenement/{slug}', Evenement::class)->name('evenement');
Route::get('/conference/{slug}', SingleConference::class)->name('conference');
Route::get('/produits', Produits::class)->name('produits');
Route::get('/produit/{slug}', Produit::class)->name('produit');
Route::get('/formation/{slug}', SingleFormation::class)->name('formation');
Route::get('/inscription-formation/{slug}', InscriptionFormation::class)->name('inscription-formation');
Route::get('/inscription-conference/{slug}', InscriptionConference::class)->name('inscription-conference');
