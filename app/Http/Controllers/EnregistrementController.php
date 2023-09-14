<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnregistrementController extends Controller
{

    public function create(){

        return view('auth.enregistrement.create');
    }

}
