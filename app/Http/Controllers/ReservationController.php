<?php

namespace App\Http\Controllers;

use App\Models\Forfait;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    // ======================= AJOUT =======================
    public function create()
    {
        $usagers = User::all();
        $forfaits = Forfait::all();

        return view('admin.reservations.create', ["usagers" => $usagers,"forfaits" => $forfaits,]);
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
}
