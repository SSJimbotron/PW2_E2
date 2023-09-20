<?php

namespace App\Http\Controllers;

use App\Models\Forfait;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReservationController extends Controller
{

    // ======================= AJOUT =======================
    public function create()
    {
        $usagers = User::all();
        $forfaits = Forfait::all();
        $reservations = Reservation::all();

        return view('admin.reservations.create', ["usagers" => $usagers, "forfaits" => $forfaits,          "reservations" => $reservations,]);
    }

    /**
     * Traite l'ajout
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        // Valider
        $valides = $request->validate([
            "id" => "required",
            "forfait" => "required",
            "date_arrivee" => "required|date|after:17/08/2024",
            "date_depart" => "required|date|after_or_equal:date_arrivee",
            "client" => "required",
        ], [
            "id.required" => "L'id' est obligatoire",
            "forfait.required" => "Le forfait est obligatoire",
            "date_arrivee.required" => "La date d'arrivée est obligatoire'",
            "date_arrivee.date" => "La date d'arrivée doit être une date",
            "date_arrivee.after" => "La date d'arrivée est minimalement le 2024-08-19",
            "date_depart.required" => "La description est obligatoire",
            "date_depart.date" => "La date de départ doit être une date",
            "date_depart.after_or_equal" => "La date de départ doit être égale ou supérieur à la date d'arrivée",
            "client.required" => "Un client est obligatoire",
        ]);

        // Ajouter à la BDD
        $reservation = new Reservation(); // $reservation contient un objet "vide" du modèle (équivalent à une nouvelle entrée dans la table)
        $reservation->user_id = $valides["client"];
        $reservation->forfait_id = $valides["forfait"];
        $reservation->date_arrivee = $valides["date_arrivee"];
        $reservation->date_depart = $valides["date_depart"];


        $reservation->save();


        // Rediriger
        return redirect()
            ->route('admin.index')
            ->with('succes', "La réservation a été ajoutée avec succès!");
    }

    /**
     * Affiche la liste des réservations
     *
     * @return View
     */
    // ======================= MODIFICATION =======================

    /**
     * Affiche le formulaire de modification
     *
     * @param int $id Id de la reservation à modifier
     * @return View
     */
    public function edit($id)
    {
        // Récupération de tous les usagers
        $usagers = User::all();
        $forfaits = Forfait::all();

        return view('admin.reservations.edit', [
            "usagers" => $usagers, "forfaits" => $forfaits,  "reservations" => Reservation::findOrFail($id),
        ]);
    }
    /**
     * Traite la modification
     *
     * @param Request $request Objet qui contient tous les champs reçus dans la requête
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        // Valider
        $valides = $request->validate([
            "id" => "required",
            "forfait" => "required",
            "date_arrivee" => "required|date|after:17/08/2024",
            "date_depart" => "required|date|after_or_equal:date_arrivee",
            "client" => "required",
        ], [
            "id.required" => "L'id' est obligatoire",
            "forfait.required" => "Le forfait est obligatoire",
            "date_arrivee.required" => "La date d'arrivée est obligatoire'",
            "date_arrivee.date" => "La date d'arrivée doit être une date",
            "date_arrivee.after" => "La date d'arrivée est minimalement le 2024-08-19",
            "date_depart.required" => "La description est obligatoire",
            "date_depart.date" => "La date de départ doit être une date",
            "date_depart.after_or_equal" => "La date de départ doit être égale ou supérieur à la date d'arrivée",
            "client.required" => "Un client est obligatoire",
        ]);

        // Ajouter à la BDD
        $reservation = Reservation::findOrFail($valides["id"]);
        $reservation->user_id = $valides["client"];
        $reservation->forfait_id = $valides["forfait"];
        $reservation->date_arrivee = $valides["date_arrivee"];
        $reservation->date_depart = $valides["date_depart"];


        $reservation->save();

        // Rediriger
        return redirect()
            ->route('admin.index')
            ->with('succes', "La réservation a été modifiée avec succès!");
    }
}
