<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Actualite;
use App\Models\User;
use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    /**
     * Affiche la page d'administration
     *
     * @return View
     */
    public function index()
    {
        // Récupération de tous les usagers
        $usagers = User::all();
        $activites = Activite::all();
        $actualites = Actualite::all();

        return view('admin.index', [
            "usagers" => $usagers,
            "activites" => $activites,
            "actualites" => $actualites,
        ]);
    }
}
