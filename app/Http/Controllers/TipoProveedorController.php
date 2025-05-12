<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipoProveedorController extends Controller
{
    //

    public function create(){
        return view('TipoProveedor.create');
    }
}
