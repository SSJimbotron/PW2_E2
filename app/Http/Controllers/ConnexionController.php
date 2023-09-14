<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnexionController extends Controller
{
    public function create(){
        return view('auth.connexion.create');
    }
}
