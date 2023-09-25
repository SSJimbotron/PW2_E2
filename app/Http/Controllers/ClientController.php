<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Actualite;
use App\Models\Forfait;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
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
        // Récupération de tous les usagers
        $usagers = User::all();
        $activites = Activite::all();
        $actualites = Actualite::all();
        $reservations = Reservation::all();

        return view('clients.edit', [
            "usager" => User::findOrFail($id), "usagers" => $usagers,
            "activites" => $activites,
            "actualites" => $actualites,
            "reservations" => $reservations,
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
        ], [
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
            ->with('succes', "La modification de l'usager à été effectuée");
    }
    /**
     * Traite l'ajout de la part du client
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {

        // Valider
        $valides = $request->validate([
            "forfait" => "required",
            "date_arrivee" => "required|date|after:17/08/2024|before:2024-08-22",
            "date_depart" => "required|date|after_or_equal:date_arrivee|before:2024-08-22",
            "client" => "required",
        ], [

            "forfait.required" => "Le forfait est obligatoire",
            "date_arrivee.required" => "La date d'arrivée est obligatoire'",
            "date_arrivee.date" => "La date d'arrivée doit être une date",
            "date_arrivee.after" => "La date d'arrivée est minimalement le 2024-08-19",
            "date_arrivee.after" => "La date d'arrivée est maximalement le 2024-08-22",
            "date_depart.required" => "La description est obligatoire",
            "date_depart.date" => "La date de départ doit être une date",
            "date_depart.after_or_equal" => "La date de départ doit être égale ou supérieur à la date d'arrivée",
            "date_depart.after" => "La date de depart est maximalement le 2024-08-22",
            "client.required" => "Un client est obligatoire",
        ]);

        $forfaits = Forfait::all();
        foreach ($forfaits as $forfait) {
            if ($forfait->id == $valides["forfait"]) {
                $jours_forfait = $forfait->jour - 1;
            }
        }
        $date_limite = Carbon::parse($valides["date_arrivee"])->addDays($jours_forfait);
        $date_depart = Carbon::parse($valides["date_depart"]);

        if ($date_limite->gte($date_depart)) {
            // Ajouter à la BDD
            $reservation = new Reservation(); // $reservation contient un objet "vide" du modèle (équivalent à une nouvelle entrée dans la table)
            $reservation->user_id = $valides["client"];
            $reservation->forfait_id = $valides["forfait"];
            $reservation->date_arrivee = $valides["date_arrivee"];
            $reservation->date_depart = $valides["date_depart"];

            $reservation->save();

            // Rediriger
            return redirect()
                ->route('client.edit')
                ->with('succes', "La réservation a été ajoutée avec succès!");
        } else {
            // Rediriger
            return redirect()
                ->route('reservations.index')
                ->with('erreur', "Les dates doivent respecter votre forfait");
        }
    }
    public function updatemdp(Request $request)
    {
        // Valider
        $valides = $request->validate([
            "id" => "required",
            "password" => "required|min:8",
            "confirmation_password" => "required|same:password",
        ], [
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
