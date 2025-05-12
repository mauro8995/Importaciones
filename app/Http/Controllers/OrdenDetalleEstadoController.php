<?php

namespace App\Http\Controllers;

use App\Models\Orden\OrdenDetalleEstado;
use Illuminate\Http\Request;

class OrdenDetalleEstadoController extends Controller
{
    public function index()
    {
        $estados = OrdenDetalleEstado::where('ORDS_DELETE', false)->get();
        return view('OrdenDetalleEstado.index', compact('estados'));
    }

    public function create()
    {
        return view('OrdenDetalleEstado.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ORDS_NOMBRE' => 'required|string|max:255',
            'ORDS_COLOR' => 'required|string|max:255',
            'ORDS_ICONO' => 'required|string|max:255',
        ]);

        // Agregar un campo adicional (en este caso el usuario que crea el registro)
        OrdenDetalleEstado::create(array_merge(
            $request->all(),
            ['ORDS_USER_CREATE' => auth()->id()]
        ));

        return redirect()->route('OrdenDetalleEstado.index')->with('success', 'Estado creado exitosamente.');
    }

    public function edit($id)
    {
        $ordenDetalleEstado = OrdenDetalleEstado::find($id);
        return view('OrdenDetalleEstado.editar', compact('ordenDetalleEstado'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'ORDS_NOMBRE' => 'required|string|max:255',
            'ORDS_COLOR' => 'required|string|max:255',
            'ORDS_ICONO' => 'required|string|max:255',
        ]);
        $OrdenDetalleEstado = OrdenDetalleEstado::find($request->ORDS_IDE);
        $OrdenDetalleEstado->ORDS_NOMBRE = $request->ORDS_NOMBRE;
        $OrdenDetalleEstado->ORDS_COLOR = $request->ORDS_COLOR;
        $OrdenDetalleEstado->ORDS_ICONO = $request->ORDS_ICONO;
        $OrdenDetalleEstado->ORDS_USER_UPDATE = auth()->id();
        $OrdenDetalleEstado->save();

        return redirect()->route('OrdenDetalleEstado.index')->with('success', 'Estado actualizado exitosamente.');
    }

    public function destroy(OrdenDetalleEstado $ordenDetalleEstado)
    {
        $ordenDetalleEstado->update(['ORDS_DELETE' => true, 'ORDS_DELETE_AT' => now()]);

        return redirect()->route('OrdenDetalleEstado.index')->with('success', 'Estado eliminado exitosamente.');
    }
}
