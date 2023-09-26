<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsagerController extends Controller
{
    // ======================= AJOUT =======================
    /**
     * Affiche le formulaire d'enregistrement
     *
     * @return View
     */
    public function create()
    {
        return view('admin.usagers.create', [
            "usagers" => User::all()
        ]);
    }
    /**
     * Traite l'enregistrement
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        // Valider
        $valides = $request->validate([
            "prenom" => "required",
            "nom" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:8",
            "confirmation_password" => "required|same:password",
            "role" => "required|min:1|max:3"
        ], [
            "prenom.required" => "Le prénom est requis",
            "nom.required" => "Le nom est requis",
            "email.required" => "Le courriel est requis",
            "email.email" => "Le courriel doit avoir un format valide",
            "email.unique" => "Ce courriel ne peut pas être utilisé",
            "password.required" => "Le mot de passe est requis",
            "password.min" => "Le mot de passe doit avoir une longueur de :min caractères",
            "confirmation_password.required" => "La confirmation du mot de passe est requise",
            "confirmation_password.same" => "Le mot de passe n'a pu être confirmé",
            "role.required" => "Le role doit être spécifier",
            "role.min" => "Le role doit être au minimum :min",
            "role.max" => "Le role doit être au maximum :mmax",
        ]);

        // Sauvegarder
        $user = new User();
        $user->prenom = $valides["prenom"];
        $user->nom = $valides["nom"];
        $user->email = $valides["email"];
        $user->password = Hash::make($valides["password"]);
        $user->role = $valides["role"];

        $user->save();

        // Rediriger
        return redirect()
            ->route('admin.index')
            ->with('succes', "Le compte de l'usager à été créer !");
    }

    // ======================= MODIFICATION =======================
    /**
     * Affiche le formulaire de modification
     *
     * @param int $id Id de l'actualité à modifier
     * @return View
     */
    public function edit($id)
    {
        return view('admin.usagers.edit', [
            "usager" => User::findOrFail($id),
            "reservations" => Reservation::all(),
            "usagers" =>   $usagers = User::all(),
        ]);
    }


    /**
     * Traite l'enregistrement
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        // Valider
        $valides = $request->validate([
            "id" => "required",
            "prenom" => "required",
            "nom" => "required",
            "email" => "required|email",
            "role" => "required|min:1|max:3"
        ], [
            "id.required" => "L'id de l'usager est obligatoire",
            "prenom.required" => "Le prénom est requis",
            "nom.required" => "Le nom est requis",
            "email.required" => "Le courriel est requis",
            "email.email" => "Le courriel doit avoir un format valide",
            "role.required" => "Le role doit être spécifier",
            "role.min" => "Le role doit être au minimum :min",
            "role.max" => "Le role doit être au maximum :mmax",
        ]);

        // Sauvegarder
        $user = User::findOrFail($valides["id"]);
        $user->prenom = $valides["prenom"];
        $user->nom = $valides["nom"];
        $user->email = $valides["email"];
        $user->role = $valides["role"];

        $user->save();

        // Rediriger
        return redirect()
            ->route('admin.index')
            ->with('succes', "La modification de l'usager à été effectuer");
    }
    /**
     * Traite la suppression
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {
        // Récupérer l'utilisateur
        $usager = User::findOrFail($request['id']);

        // Vérifier si l'utilisateur a des réservations
        $reservations = Reservation::where('user_id', $usager->id)->get();

        if ($reservations->count() > 0) {
            return redirect()->route('admin.index')
                ->with('erreur', "L'usager a des réservations associés, veuillez les supprimer en premier lieu");
        } else {
            User::destroy($request->id);

            return redirect()->route('admin.index')
                ->with('succes', "L'usager a été supprimée!");
        }
    }
}
