<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Empresa\Empresa;
use App\Models\Provincias\Provincias;
use App\Models\Departamento\Departamento;
use App\Models\Distrito\Distrito;

class EmpresaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Empresa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Empresa.create',[
            "Provincia"=>Provincias::all(),
            "Departamento"=>Departamento::all(),
            "Distrito"=>Distrito::all(),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'EMP_NAME' => 'required|string|max:255',
        //     'EMP_RUC' => 'required|string|size:11|unique:EMPRESA,EMP_RUC',
        //     'EMP_RAZON_SOCIAL' => 'required|string|max:255',
        //     'EMP_EMAIL' => 'required|email|max:255',
        //     'EMP_TELEFONO' => 'required|string|max:20',
        //     // Add other required fields here
        // ]);

        // if ($validator->fails()) {
        //     return response()->json(['errors' => $validator->errors()], 422);
        // }

        $empresa = Empresa::create($request->all());

        return redirect()->route('empresas.index')->with('success', 'Empresa created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $empresa = Empresa::findOrFail($request->id);

        if ($empresa->EMP_DELETE) {
            return response()->json(['message' => 'Resource not found'], 404);
        }

        return response()->json($empresa);
    }

    public function edit($id)
    {
       
        return view('Empresa.edit', [
            "empresa"=>Empresa::findOrFail($id),
            "Provincia"=>Provincias::all(),
            "Departamento"=>Departamento::all(),
            "Distrito"=>Distrito::all(),
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->update($request->all());
    
        return redirect()->route('empresas.index')->with('success', 'Empresa actualizada correctamente.');
    }


    /**
     * Remove the specified resource from storage (soft delete).
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);

        if ($empresa->EMP_DELETE) {
            return response()->json(['message' => 'Resource not found'], 404);
        }

        $empresa->update([
            'EMP_DELETE' => true,
            'EMP_DATE_DELETE' => now(),
            'EMP_USER_DELETE' => auth()->id(),
        ]);

        return redirect()->route('empresas.index')->with('success', 'Empresa deleted successfully.');
    }
}
