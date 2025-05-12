<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor\Proveedor;
use App\Models\Banco\Banco;
use App\Models\Tipo_cuenta\TipoCuenta;
use App\Models\Tipo_proveedor\TipoProveedor;


use Illuminate\Support\Facades\Auth;

class ProveedorControlles extends Controller
{
    //

    public function create(){
        return view('Proveedor.create',[
            "banco"=>Banco::where('BAN_DELETE','0')->get(),
            "tipo_cuenta"=>TipoCuenta::where('TCU_DELETE','0')->get(),
            "tipo_proveedor"=>TipoProveedor::where('TPRO_DELETE','0')->get(),
        ]);
    }


    public function store(Request $request){
        // Crear nuevo proveedor
        $proveedor = Proveedor::create([
            'PRO_NOMBRE' => $request->PRO_NOMBRE,
            'PRO_TELEFONO' => $request->PRO_TELEFONO,
            'PRO_CORREO' => $request->PRO_CORREO,
            'PRO_DIRECCION' => $request->PRO_DIRECCION,
            'PRO_TIPO_CUENTA' => $request->PRO_TIPO_CUENTA,
            'PRO_BANCO' => $request->PRO_BANCO,
            'PRO_NUMERO_CUENTA' => $request->PRO_NUMERO_CUENTA,
            'PRO_NOMBRE_REPRESENTANTE' => $request->PRO_NOMBRE_REPRESENTANTE,
            'PRO_TIPO_PROVEEDOR' => $request->PRO_TIPO_PROVEEDOR,
            'PRO_ESTADO' => $request->PRO_ESTADO,
            'PRO_USER_CREATE' => Auth::id(),
            'PRO_DELETE' => false
        ]);

        return redirect()
            ->route('Proveedor.index')
            ->with('success', 'Proveedor creado exitosamente');
    }

    public function index(){
        return view('Proveedor.index');
    }
}
