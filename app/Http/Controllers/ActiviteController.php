<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActiviteController extends Controller
{
    /**
     * Affiche la liste des activités
     *
     * @return View
     */
    public function index() {
        return view('activites.index');
    }
}
