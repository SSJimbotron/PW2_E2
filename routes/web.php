<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\ForfaitController;
use App\Http\Controllers\ProgrammationController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\EnregistrementController;
use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UsagerController;
use App\Models\Reservation;
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

// **ACCUEIL***
Route::get('/', [SiteController::class, 'index'])
    ->name('accueil');

// =========================================================

// ***ACTUALITÉS***
//  index
Route::get('/actualites', [ActualiteController::class, 'index'])
    ->name('actualite.index');
// show
// Route::get('/actualites/{id}', [ActualiteController::class, 'show'])
//     ->name('actualite.show');

// =========================================================

// ***ACTIVITÉS***
//  index
Route::get('/activites', [ActiviteController::class, 'index'])
    ->name('activites.index');
// show
Route::get('/activites/{id}', [ActiviteController::class, 'show'])
    ->name('activites.show');

// =========================================================

// ***A PROPOS***
//  index
Route::get('/apropos', [SiteController::class, 'apropos'])
    ->name('apropos.index');

// =========================================================

// ***FORFAITS***
//  index
Route::get('/forfaits', [ForfaitController::class, 'index'])
    ->name('forfaits.index');

// =========================================================

// ***PROGRAMMATION***
//  index
Route::get('/programmation', [ProgrammationController::class, 'index'])
    ->name('programmation.index');


// ================= CONNEXION ET ENREGISTREMENT =====================


Route::get("/connexion", [ConnexionController::class, 'create'])
    ->name('connexion.create')
    ->middleware('guest');

Route::post("/connexion", [ConnexionController::class, 'authentifier'])
    ->name('connexion.authentifier');

Route::post("/deconnexion", [ConnexionController::class, 'deconnecter'])
    ->name('deconnexion');

Route::get("/enregistrement", [EnregistrementController::class, 'create'])
    ->name('enregistrement.create');

Route::post("/enregistrement", [EnregistrementController::class, 'store'])
    ->name('enregistrement.store');


// ======================= RÉSERVATIONS ===========================

//edit
Route::get("reservation/edit/{id}", [ReservationController::class, 'edit'])
    ->name('admin.reservation.edit');
Route::post("reservation/update", [ReservationController::class, 'update'])
    ->name('admin.reservation.update');

// create
Route::get("reservation/create", [ReservationController::class, 'create'])
    ->name('admin.reservation.create');
Route::post("reservation", [ReservationController::class, 'store'])
    ->name('admin.reservation.store');

// ======================= ADMINISTRATION ===========================


Route::get("/admin", [AdministrationController::class, 'index'])
    ->name('admin.index');


// ***ACTIVITES***
//  edit
Route::get("/admin/activites/edit/{id}", [ActiviteController::class, 'edit'])
    ->name('admin.activites.edit');
Route::post("/admin/activites/update", [ActiviteController::class, 'update'])
    ->name('admin.activites.update');

// create
Route::get("/admin/activites/create", [ActiviteController::class, 'create'])
    ->name('admin.activites.create');
Route::post("/admin/activites", [ActiviteController::class, 'store'])
    ->name('admin.activites.store');

//  destroy
Route::post("/admin/activites/destroy/{id}", [ActiviteController::class, 'destroy'])
    ->name('admin.activites.destroy');


// ***ACTUALITES***
//  edit
Route::get("/admin/actualites/edit/{id}", [ActualiteController::class, 'edit'])
    ->name('admin.actualites.edit');

Route::post("/admin/actualites/update", [ActualiteController::class, 'update'])
    ->name('admin.actualites.update');

// create
Route::get("/admin/actualites/create", [ActualiteController::class, 'create'])
    ->name('admin.actualites.create');

Route::post("/admin/actualites", [ActualiteController::class, 'store'])
    ->name('admin.actualites.store');

//  destroy
Route::post("/admin/actualites/destroy/{id}", [ActualiteController::class, 'destroy'])
    ->name('admin.actualites.destroy');


// ***USAGERS***
//  edit
Route::get("/admin/usagers/edit/{id}", [UsagerController::class, 'edit'])
    ->name('admin.usagers.edit');
Route::post("/admin/usagers/update", [UsagerController::class, 'update'])
    ->name('admin.usagers.update');

// create
Route::get("/admin/usagers/create", [UsagerController::class, 'create'])
    ->name('admin.usagers.create');
Route::post("/admin/usagers", [UsagerController::class, 'store'])
    ->name('admin.usagers.store');

//  destroy
Route::post("/admin/usagers/destroy/{id}", [UsagerController::class, 'destroy'])
    ->name('admin.usagers.destroy');
