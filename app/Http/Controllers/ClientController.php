<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Affiche le formulaire de modification
     *
     * @param int $id Id de l'actualité à modifier
     * @return View
     */
    public function edit($id)
    {
        return view('clients.edit', [
            "usager" => User::findOrFail($id),
        ]);
    }


         /**
     * Traite l'enregistrement
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request) {
        // Valider
        $valides = $request->validate([
            "id" => "required",
            "prenom" => "required",
            "nom" => "required",
            "email" => "required|email",
        ],[
            "id.required" => "L'id de l'usager est obligatoire",
            "prenom.required" => "Le prénom est requis",
            "nom.required" => "Le nom est requis",
            "email.required" => "Le courriel est requis",
            "email.email" => "Le courriel doit avoir un format valide",
        ]);

        // Sauvegarder
        $user = User::findOrFail($valides["id"]);
        $user->prenom = $valides["prenom"];
        $user->nom = $valides["nom"];
        $user->email = $valides["email"];

        $user->save();

        // Rediriger
        return redirect()
                ->route('accueil')
                ->with('succes', "La modification de l'usager à été effectuer");

    }

    public function updatemdp(Request $request){
                // Valider
                $valides = $request->validate([
                    "id" => "required",
                    "password" => "required|min:8",
                    "confirmation_password" => "required|same:password",
                ],[
                    "id.required" => "L'id de l'usager est obligatoire",
                    "password.required" => "Le mot de passe est requis",
                    "password.min" => "Le mot de passe doit avoir une longueur de :min caractères",
                    "confirmation_password.required" => "La confirmation du mot de passe est requise",
                    "confirmation_password.same" => "Le mot de passe n'a pu être confirmé",

                ]);

                // Sauvegarder
                $user = User::findOrFail($valides["id"]);
                $user->password = Hash::make($valides["password"]);

                $user->save();

                // Rediriger
                return redirect()
                        ->route('accueil')
                        ->with('succes', "La modification du mot de passe à été effectuer");

    }
}
