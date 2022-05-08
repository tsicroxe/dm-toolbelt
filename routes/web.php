<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use App\Http\Livewire\CharacterSheetContainer;
use App\Http\Livewire\CharacterViewer;
use App\Http\Livewire\EquipmentDescription;
use App\Http\Livewire\RaceDescription;
use App\Http\Livewire\ReferencesContainer;
use App\Http\Livewire\SpellDescription;
use App\Http\Livewire\TokenizerContainer;

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

Route::view('/', 'welcome')->name('home');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');

    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
    ->middleware('signed')
    ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');

    Route::get('/characters', CharacterSheetContainer::class)->name('characters');
    Route::get('/characters/{character}', CharacterViewer::class)->name('character.view');

});


Route::get('/race/{race:name}', RaceDescription::class);
Route::get('/equipment/{equipment}', EquipmentDescription::class);
Route::get('/spells/{spell}', SpellDescription::class);

Route::get('/tokenizer', TokenizerContainer::class)->name('tokenizer');
Route::get('/references', ReferencesContainer::class)->name('references');
