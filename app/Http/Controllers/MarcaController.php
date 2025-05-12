<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Marca\Marca;
use Illuminate\Support\Facades\Auth;

class MarcaController extends Controller
{
    //
       /**
     * Muestra una lista de todas las marcas.
     */
    public function index()
    {
        // $marcas = Marca::where('MAR_DELETE', false)->get();
        return view('Marca.index');
    }

    /**
     * Guarda una nueva marca en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'MAR_NOMBRE' => 'required|string|max:255|unique:MARCA',
            'MAR_DESCRIPCION' => 'nullable|string|max:500',
            'MAR_ICONO' => 'nullable|string|max:255',
        ]);

        $marca = new Marca();
        $marca->MAR_NOMBRE = $request->MAR_NOMBRE;
        $marca->MAR_DESCRIPCION = $request->MAR_DESCRIPCION;
        $marca->MAR_ICONO = $request->MAR_ICONO;
        $marca->MAR_USER_CREATE = Auth::id(); // Se asume autenticación en Laravel
        $marca->MAR_CREATED_AT = now();

        $marca->save(); // Guarda la nueva marca

        return response()->json(['message' => 'Marca creada correctamente', 'marca' => $marca]);
    }

    /**
     * Muestra los detalles de una marca específica.
     */
    public function edit($id)
    {
        $marca = Marca::findOrFail($id);
        return response()->json($marca);
    }

    /**
     * Actualiza una marca existente.
     */
    public function update(Request $request, $id)
    {
        $marca = Marca::findOrFail($id);

        $request->validate([
            'MAR_NOMBRE' => 'required|string|max:255|unique:MARCA,MAR_NOMBRE,' . $marca->MAR_IDE . ',MAR_IDE',
            'MAR_DESCRIPCION' => 'nullable|string|max:500',
            'MAR_ICONO' => 'nullable|string|max:255',
        ]);

        $marca->MAR_NOMBRE = $request->MAR_NOMBRE;
        $marca->MAR_DESCRIPCION = $request->MAR_DESCRIPCION;
        $marca->MAR_ICONO = $request->MAR_ICONO;
        $marca->MAR_USER_UPDATE = Auth::id();
        $marca->MAR_UPDATED_AT = now();

        $marca->save(); // Guarda los cambios

        return response()->json(['message' => 'Marca actualizada correctamente', 'marca' => $marca]);
    }

    /**
     * Elimina una marca (soft delete).
     */
    public function destroy($id)
    {
        $marca = Marca::findOrFail($id);

        $marca->MAR_DELETE = true;
        $marca->MAR_USER_DELETE = Auth::id();
        $marca->MAR_DELETE_AT = now();

        $marca->save(); // Guarda la eliminación lógica

        return response()->json(['message' => 'Marca eliminada correctamente']);
    }
}
