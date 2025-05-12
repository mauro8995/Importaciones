<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BancoController extends Controller
{
    //
    public function create(){
        return view('Banco.create');
    }

    public function index(){
        return view('Banco.index');
    }
}
