<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    /**
     * Affiche la page d'administration
     *
     * @return View
     */
    public function index() {
        return view('admin.index');
    }
}
