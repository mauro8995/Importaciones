<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RubroController extends Controller
{
    //

    public function create(){
        return view('Rubro.create');
    }

    public function index(){
        return view('Rubro.index');
    }

}
