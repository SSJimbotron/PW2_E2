<?php

namespace App\Http\Controllers;

use App\Models\Forfait;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReservationController extends Controller
{

    // ======================= AJOUT =======================

    /**
     * Affiche le formulaire d'ajout d'une réservation pour l'admin
     *
     * @return void
     */
    public function create()
    {
        $usagers = User::all();
        $forfaits = Forfait::all();
        $reservations = Reservation::all();

        return view('admin.reservations.create', ["usagers" => $usagers, "forfaits" => $forfaits, "reservations" => $reservations,]);
    }


    /**
     * Traite l'ajout d'une réservation pour l'admin
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
                ->route('admin.index')
                ->with('succes', "La réservation a été ajoutée avec succès!");
        } else {
            // Rediriger
            return redirect()
                ->route('admin.reservations.create')
                ->with('erreur', "Les dates doivent respecter votre forfait");
        }
    }

    // ======================= MODIFICATION =======================

    /**
     * Affiche le formulaire de modification d'une réservation coté admin
     *
     * @param int $id Id de la reservation à modifier
     * @return View
     */
    public function edit($id)
    {
        // Récupération de tous les usagers et forfaits
        $usagers = User::all();
        $forfaits = Forfait::all();

        return view('admin.reservations.edit', [
            "usagers" => $usagers, "forfaits" => $forfaits,  "reservation" => Reservation::findOrFail($id),
        ]);
    }


    /**
     * Traite la modification d'une réservation coté admin
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
        $forfait = Forfait::find($valides["forfait"]);
        $jours_forfait = $forfait->jour;



        $date_limite = Carbon::parse($valides["date_arrivee"])->addDays($jours_forfait);
        $date_depart = Carbon::parse($valides["date_depart"]);


        if ($date_limite->gt($date_depart)) {
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
        } else {
            // Rediriger
            return redirect()
                ->route('admin.reservations.edit,["id"]')
                ->with('error', "Les dates doivent respecter votre forfait");
        }
    }

    // **** SUPRESSION ****

    /**
     * Traite la suppression d'une réservation coté admin
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {
        Reservation::destroy($request->id);

        return back()->route('admin.index')
            ->with('succes', "La réservation a été supprimée!");
    }
}
