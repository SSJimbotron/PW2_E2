<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForfaitController extends Controller
{
        /**
     * Affiche la liste des forfaits
     *
     * @return View
     */
    public function index() {
        return view('forfaits.index');
    }
}
