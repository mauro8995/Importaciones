<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnidadMedida\UnidadMedida;
use App\Models\Producto\Producto;
use App\Models\Proveedor\Proveedor;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProductoController extends Controller
{
    //

    public function create(){

        return view('Producto.create',[
            "unidad_medida" => UnidadMedida::where('UNI_DELETE', 0)->get(),
            "proveedor"=>Proveedor::where('PRO_DELETE', 0)->get(),
        ]);
    }


    public function store(Request $request)
    {
       

        // Crear nuevo producto
        $producto = Producto::create([
            'PRO_NOMBRE' => $request->PRO_NOMBRE,
            'PRO_DESCRIPCION' => $request->PRO_DESCRIPCION,
            'PRO_PRECIO' => $request->PRO_PRECIO_UNITARIO,
            'PRO_ID_PROVEEDOR' => $request->PRO_ID_PROVEEDOR,
            'PRO_ALTO' => $request->PRO_ALTO,
            'PRO_ANCHO' => $request->PRO_ANCHO,
            'PRO_PESO' => $request->PRO_PESO,
            'PRO_CODE_COPE' => $request->PRO_CODE_COPE,
            'PRO_ID_UNIDAD_MEDIDA' => $request->PRO_ID_UNIDAD_MEDIDA,
            'PRO_CODE_PARTE'=>$request->PRO_CODE_PARTE,
            'PRO_CODE_PARTE_CLIENTE'=>$request->PRO_CODE_PARTE_CLIENTE,
            'PRO_STOCK'=>55,
            'PRO_MARGEN'=>$request->PRO_MARGEN,
            'PRO_ARANCELES'=>$request->PRO_ARANCELES,
            'PRO_SEMANAS_ENTREGA'=>1,
            'PRO_USER_CREATE' => Auth::id(), // Usuario autenticado que creó el registro
            'PRO_HS_CODIGO'=>$request->PRO_HS_CODIGO,
            'PRO_PARTIDA'=>$request->PRO_PARTIDA,
            'PRO_PROFUNDIDAD'=>$request->PRO_PROFUNDIDAD,
            
        ]);

        // Redireccionar con mensaje de éxito
        return redirect()->back()->with('success', 'Producto registrado correctamente.');
    }


    public function getProductos(Request $request)
    {
        // Validar que exista un término de búsqueda
        $search = $request->input('q');

        // Obtener los productos filtrados por nombre
        $productos = Producto::where('PRO_CODE_PARTE', 'LIKE', "%$search%")
        // ->orWhere('PRO_CODE_INTERNO_CLIENTE', 'LIKE', "%$search%")
        // ->orWhere('PRO_CODE_COPE', 'LIKE', "%$search%")
        // ->orWhere('PRO_CODE_PARTE_CLIENTE', 'LIKE', "%$search%")
        // ->orWhere('PRO_CODE_PARTE', 'LIKE', "%$search%")
        
        ->orderBy('PRO_NOMBRE', 'asc')
        ->limit(10)
        ->get();

        // Formatear los datos para Select2
        $results = $productos->map(function ($producto) {
            return [
                'id' => $producto->PRO_ID,
                'text' => $producto->PRO_NOMBRE,
                'PRO_CODE_PARTE'=>$producto->PRO_CODE_PARTE,
                'codigo' => $producto->PRO_CODE_INTERNO_CLIENTE
            ];
        });

        return response()->json($results);
    }


    public function getInfoProducto($id)
    {
        $producto = Producto::find($id);
       

        if (!$producto) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }
        $unidad_medida = UnidadMedida::find($producto->PRO_ID_UNIDAD_MEDIDA);
        return response()->json([
            'invoice_comercial' => $producto->PRO_CODE_COPE, // Ajusta según tu base de datos
            'numero_parte' => $producto->PRO_CODE_PARTE,
            'descripcion' => $producto->PRO_DESCRIPCION,
            'precio' => $producto->PRO_PRECIO,
            'producto'=>$producto,
            'unidad_medida'=>$unidad_medida
        ]);
    }


    public function index(){
        return view('Producto.index',[
            
        ]);
    }


    public function edit($id){

        $producto = Producto::findOrFail($id);
        return view('Producto.editar',[
            "producto"=>$producto,
            "unidad_medida" => UnidadMedida::where('UNI_DELETE', 0)->get(),
            "proveedor"=>Proveedor::where('PRO_DELETE', 0)->get(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $producto->update($request->all());

        return redirect()->route('productos.edit', $id)->with('success', 'Producto actualizado correctamente');
    }

    public function delete(Request $request){
        $orden = Producto::find($request->id);
        $orden->PRO_DELETE = 1;
        $orden->PRO_USER_DELETE = Auth::id();
        $orden->PRO_DATE_DELETE = Carbon::now(); 
        $orden->save();

        return response()->json(["object" => "success","menssage"=>"Orden Eliminada"]);
    }



}
