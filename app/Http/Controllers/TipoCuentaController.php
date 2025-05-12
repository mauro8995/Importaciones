<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipoCuentaController extends Controller
{
    //
    public function create(){
        return view('TipoCuenta.create');
    }

    public function index(){
        return view('TipoCuenta.index');
    }
}
