<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orden\OrdenEstado;
use Illuminate\Support\Facades\Auth;

class OrdenEstadoController extends Controller
{
    public function index()
    {
        $ordenes_estado = OrdenEstado::all();
        return view('OrdenEstado.index', compact('ordenes_estado'));
    }

    public function create()
    {
        return view('OrdenEstado.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ODES_NOMBRE' => 'required|string|max:255',
            'ODES_COLOR' => 'required|string|max:255',
            'ODES_ICONO' => 'nullable|string|max:255',
        ]);


        OrdenEstado::create([
            'ODES_NOMBRE' => $request->ODES_NOMBRE,
            'ODES_COLOR' => $request->ODES_COLOR,
            'ODES_ICONO' => $request->ODES_ICONO,
            'ODES_USER_CREATE' =>  Auth::id(),
        ]);

        return redirect()->route('OrdenEstado.index')->with('success', 'Estado creado correctamente.');
    }

    public function edit($id)
    {
        $orden_estado = OrdenEstado::findOrFail($id);
        return view('OrdenEstado.editar', compact('orden_estado'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ODES_NOMBRE' => 'required|string|max:255',
            'ODES_COLOR' => 'required|string|max:255',
            'ODES_ICONO' => 'nullable|string|max:255',
        ]);

        $orden_estado = OrdenEstado::findOrFail($id);
        $orden_estado->update([
            'ODES_NOMBRE' => $request->ODES_NOMBRE,
            'ODES_COLOR' => $request->ODES_COLOR,
            'ODES_ICONO' => $request->ODES_ICONO,
            'ODES_USER_UPDATE' =>  Auth::id(),
        ]);

        return redirect()->route('OrdenEstado.index')->with('success', 'Estado actualizado correctamente.');
    }

    public function destroy(Request $request)
    {
        $orden_estado = OrdenEstado::findOrFail($request->id);

        $orden_estado->ODES_DELETE = 1;
        $orden_estado->save();

        return redirect()->route('OrdenEstado.index')->with('success', 'Estado eliminado correctamente.');
    }
}
