<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Actualite;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdministrationController extends Controller
{
    /**
     * Affiche la page d'administration
     *
     * @return View
     */
    public function index()
    {

        // Récupération de tous les usagers,activités,actualités et réservations
        $usagers = User::all();
        $activites = Activite::all();
        $actualites = Actualite::all();
        $reservations = Reservation::all();

        // Passe les variables dans la vue
        return view('admin.index', [
            "usagers" => $usagers,
            "activites" => $activites,
            "actualites" => $actualites,
            "reservations" => $reservations,
        ]);


    }
}
