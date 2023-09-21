<?php

namespace App\Http\Controllers;

use App\Models\Forfait;
use Illuminate\Http\Request;

class ForfaitController extends Controller
{
    /**
     * Affiche la liste des forfaits
     *
     * @return View
     */
    public function index()
    {
        // Récupération de tous les usagers
        return view('forfaits.index');
    }
}
