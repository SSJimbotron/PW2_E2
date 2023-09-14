<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActualiteController extends Controller
{
    /**
     * Affiche la liste des actualités
     *
     * @return View
     */
    public function index() {
        return view('actualites.index');
    }
}
