<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\ForfaitController;
use App\Http\Controllers\ProgrammationController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\EnregistrementController;
use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UsagerController;
use App\Models\Reservation;
use GuzzleHttp\Middleware;
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


// ================= CONNEXION / ENREGISTREMENT / MODIFICATION CLIENT =====================

// ***CONNEXION***
Route::get("/connexion", [ConnexionController::class, 'create'])
    ->name('connexion.create')
    ->middleware('guest');

Route::post("/connexion", [ConnexionController::class, 'authentifier'])
    ->name('connexion.authentifier');

// ***DECONNEXION***
Route::post("/deconnexion", [ConnexionController::class, 'deconnecter'])
    ->name('deconnexion');

//  ***ENREGISTREMENT
Route::get("/enregistrement", [EnregistrementController::class, 'create'])
    ->name('enregistrement.create')
    ->middleware('guest');

Route::post("/enregistrement", [EnregistrementController::class, 'store'])
    ->name('enregistrement.store')
    ->middleware('guest');

// ***MON COMPTE***
//  edit
Route::get('/moncompte/{id}', [ClientController::class, 'edit'])
    ->name('moncompte.edit')
    ->middleware('auth');
//  update nom/prenom/courriel
Route::post("/moncompte/update", [ClientController::class, 'update'])
    ->name('moncompte.update')
    ->middleware('auth');
// update mdp
Route::post("/moncompte/mdp/update", [ClientController::class, 'updatemdp'])
    ->name('moncompte.mdp.update')
    ->middleware('auth');

// ======================= RÉSERVATIONS ===========================

//edit
Route::get("/admin/reservations/edit/{id}", [ReservationController::class, 'edit'])
    ->name('admin.reservations.edit')
    ->middleware('auth', 'checkrole:3');
Route::post("reservations/update", [ReservationController::class, 'update'])
    ->name('admin.reservations.update')
    ->middleware('auth', 'checkrole:3');

// create
Route::get("/admin/reservations/create", [ReservationController::class, 'create'])
    ->name('admin.reservations.create')
    ->middleware('auth', 'checkrole:3');
Route::post("reservations", [ReservationController::class, 'store'])
    ->name('admin.reservations.store')
    ->middleware('auth', 'checkrole:3');

//destroy
Route::post("/admin/reservations/destroy", [ReservationController::class, 'destroy'])
    ->name('admin.reservations.destroy')
    ->middleware('auth', 'checkrole:3');

// ======================= ADMINISTRATION ===========================


Route::get("/admin", [AdministrationController::class, 'index'])
    ->name('admin.index')
    ->middleware('auth', 'admin');


// ***ACTIVITES***
//  edit
Route::get("/admin/activites/edit/{id}", [ActiviteController::class, 'edit'])
    ->name('admin.activites.edit')
    ->middleware('auth', 'checkrole:3');
Route::post("/admin/activites/update", [ActiviteController::class, 'update'])
    ->name('admin.activites.update')
    ->middleware('auth', 'checkrole:3');
Route::post("/admin/activites/updateimg", [ActiviteController::class, 'updateimg'])
    ->name('admin.activites.updateimg')
    ->middleware('auth', 'checkrole:3');

// create
Route::get("/admin/activites/create", [ActiviteController::class, 'create'])
    ->name('admin.activites.create')
    ->middleware('auth', 'checkrole:3');
Route::post("/admin/activites", [ActiviteController::class, 'store'])
    ->name('admin.activites.store')
    ->middleware('auth', 'checkrole:3');

//  destroy
Route::post("/admin/activites/destroy", [ActiviteController::class, 'destroy'])
    ->name('admin.activites.destroy')
    ->middleware('auth', 'checkrole:3');



// ***ACTUALITES***
//  edit
Route::get("/admin/actualites/edit/{id}", [ActualiteController::class, 'edit'])
    ->name('admin.actualites.edit')
    ->middleware('auth', 'checkrole:3');

Route::post("/admin/actualites/update", [ActualiteController::class, 'update'])
    ->name('admin.actualites.update')
    ->middleware('auth', 'checkrole:3');
//  edit de l'image
Route::post("/admin/actualites/updateimg", [ActualiteController::class, 'updateimg'])
    ->name('admin.actualites.updateimg')
    ->middleware('auth', 'checkrole:3');

// create
Route::get("/admin/actualites/create", [ActualiteController::class, 'create'])
    ->name('admin.actualites.create')
    ->middleware('auth', 'checkrole:3');

Route::post("/admin/actualites", [ActualiteController::class, 'store'])
    ->name('admin.actualites.store')
    ->middleware('auth', 'checkrole:3');

// delete

Route::post("/admin/actualites/destroy", [ActualiteController::class, 'destroy'])
    ->name('admin.actualites.destroy')
    ->middleware('auth', 'checkrole:3');


// ***USAGERS***
//  edit
Route::get("/admin/usagers/edit/{id}", [UsagerController::class, 'edit'])
    ->name('admin.usagers.edit')
    ->middleware('auth', 'checkrole:3');
Route::post("/admin/usagers/update", [UsagerController::class, 'update'])
    ->name('admin.usagers.update')
    ->middleware('auth', 'checkrole:3');

// create
Route::get("/admin/usagers/create", [UsagerController::class, 'create'])
    ->name('admin.usagers.create')
    ->middleware('auth', 'checkrole:3');
Route::post("/admin/usagers", [UsagerController::class, 'store'])
    ->name('admin.usagers.store')
    ->middleware('auth', 'checkrole:3');

//  destroy

Route::post("/admin/usagers/destroy", [UsagerController::class, 'destroy'])
    ->name('admin.usagers.destroy')
    ->middleware('auth', 'checkrole:3');

