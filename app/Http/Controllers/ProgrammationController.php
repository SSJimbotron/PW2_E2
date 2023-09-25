<?php

namespace App\Http\Controllers;

use App\Models\Artiste;
use Illuminate\Http\Request;

class ProgrammationController extends Controller
{
        /**
     * Affiche la liste de programmation
     *
     * @return View
     */
    public function index() {

        return view('programmation.index', [
            "artistes" => Artiste::all()
        ]);
    }
}
