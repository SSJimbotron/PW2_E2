<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Affiche la page d'accueil
     *
     * @return View
     */
    public function index() {
        return view('accueil');
    }

    /**
     * Affiche la page à propos
     *
     * @return View
     */
    public function apropos() {
        return view('apropos.index');
    }
}
