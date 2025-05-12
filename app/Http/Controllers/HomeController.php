<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
                 // Obtiene todas las tablas de la base de datos actual
     // Obtiene todas las tablas de la base de datos actual
     $tables = DB::select("
     SELECT TABLE_NAME 
     FROM INFORMATION_SCHEMA.TABLES 
     WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_CATALOG = 'importaciones'
        ");
      return view('filters.configure', ['tables' => $tables]);
    } 

    public function dashboard(){
      return view('inicio.dashboard');
    }
}
