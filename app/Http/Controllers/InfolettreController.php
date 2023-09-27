<?php

namespace App\Http\Controllers;

use App\Models\Infolettre;
use Illuminate\Http\Request;

class InfolettreController extends Controller
{
    /**
     * Traite l'enregistrement d'un client pour l'infolettre
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        // Valider
        $valides = $request->validate([
            "email" => "required|email|unique:users,email",
        ], [
            "email.required" => "Le courriel est requis",
            "email.email" => "Le courriel doit avoir un format valide",
            "email.unique" => "Ce courriel ne peut pas être utilisé",
        ]);

        // Sauvegarder
        $user = new Infolettre();
        $user->email = $valides["email"];

        $user->save();

        // Rediriger
        return redirect()
            ->route('accueil')
            ->with('succes', "Vous êtes inscrit à l'infolettre'");
    }
}
