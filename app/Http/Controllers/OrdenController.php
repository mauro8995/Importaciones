<?php

namespace App\Http\Controllers;

use App\Models\Proveedor\Proveedor;
use App\Models\Pais\Pais;
use Illuminate\Http\Request;
use App\Models\Empresa\Empresa;
use App\Models\Orden\Orden_cabecera;
use App\Models\Orden\Orden_detalle;
use App\Models\Departamento\Departamento;
use App\Models\Distrito\Distrito;
use App\Models\Provincias\Provincias;
use Illuminate\Support\Facades\DB;
use App\Models\Files\files_multimedia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Orden\OrdenEstado;
use App\Models\Orden\OrdenDetalleEstado;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Carbon\Carbon;
class OrdenController extends Controller
{
    //
    public function create(){


        return view('Orden.Calculo',
        [
            "proveedor"=>Proveedor::where('PRO_DELETE',0)->get(),
            "pais"=>Pais::where('PA_DELETE',0)->get(),
            "cliente"=>Empresa::where('EMP_DELETE',0)->get(),
            'provincia'=>Provincias::all(),
            'distrito'=>Distrito::all(),
            
            'departamento'=>Departamento::all(),
        ]
        );
    }

    public function tracking(){
        return view('Tracking.Ver');
    } 

    public function store(Request $request)
    {
        DB::beginTransaction();
            $total = 0;
            $max_semanas=0;
            foreach ($request->detalles as $key => $value) {
                # code...
                $total +=  $value['sale_sale_total'];
                if($max_semanas <=$value['semanas']){
                    $max_semanas =$value['semanas'];
                }
            }
            // Crear la cabecera de la orden
            $ordenCabecera = Orden_cabecera::create([
                'ORD_PROVEEDOR_ID' => $request->ORD_PROVEEDOR_ID,
                'ORD_TIPO_ENVIO' => $request->ORD_TIPO_ENVIO,
                'ORD_FECHA' => now()->toDateString(), // Devuelve 'YYYY-MM-DD'
                'ORD_USER_CREATE' => $request->ORD_USER_CREATE,
                'ORD_ID_PAIS_ORIGEN' => $request->ORD_ID_PAIS_ORIGEN,
                'ORD_ID_PAIS_DESTINO' => $request->ORD_ID_PAIS_DESTINO,
                'ORD_ID_DEPARTAMENTO' => $request->ORD_ID_DEPARTAMENTO,
                'ORD_ID_PROVINCIAS' => $request->ORD_ID_PROVINCIAS,
                'ORD_ID_DISTRITOS' => $request->ORD_ID_DISTRITOS,
                'ORD_SEMANA_ENTREGA'=>$max_semanas,
                'ORD_DIRECCION'=>$request->ORD_DIRECCION,
                'ORD_FECHA_LLEGANDA_TENTATIVA'=> now()->addWeeks($max_semanas)->toDateString(), 
                'ORD_ID_MONEDA'=>2,
                'ORD_ID_CLIENTE'=>$request->ORD_ID_CLIENTE,
                'ORD_TOTAL_ORDEN'=> $total,
                'ORD_COMENTARIOS'=>$request->ORD_COMENTARIOS,
                'ORD_ID_ORDEN_ESTADO'=>OrdenEstado::where('ODES_DELETE',0)->first()->ODES_ID
            ]);

         

            // Crear el detalle de la orden
            foreach ($request->detalles as $detalle) {
                Orden_detalle::create([
                    'ORD_ID_ORDEN_CABECERA' => $ordenCabecera->ORD_ID,
                    'ORD_DET_PRODUCTO_ID' => $detalle['producto'] ?? null,
                    'ORD_DET_CODE_COPE' => $detalle['code_cope'] ?? null,
                    'ORD_DET_COD_CLIENTE' => $detalle['cod_cliente'] ?? null,
                    'ORD_DET_UNI_MEDIDA' => $detalle['uni_medida'] ?? null,
                    'ORD_DET_CANTIDAD' => $detalle['cantidad'] ?? null,
                    'ORD_DET_PRECIO' => $detalle['precio'] ?? null,
                    'ORD_DET_SEMANAS' => $detalle['semanas'] ?? null,
                    'ORD_DET_CIF_VALOR' => $detalle['cif_valor'] ?? null,
                    'ORD_DET_SALES_FACTOR' => $detalle['sales_factor'] ?? null,
                    'ORD_DET_AD_VALOREM' => $detalle['AD_VALOREM'] ?? null,
                    'ORD_DET_AD_VALOREM_TOTAL' => $detalle['AD_VALOREM_TOTAL'] ?? null,
                    'ORD_DET_PRECIO_UNI' => $detalle['precio'] ?? null,
                    'ORD_DET_PRECIO_UNI_TOTAL' => $detalle['cantidad'] *$detalle['precio'] ,
                    'ORD_DET_UNIDAD_MAKE_UP' => $detalle['unidad_make_up'] ?? null,
                    'ORD_DET_UNIDAD_MAKE_UP_TOTAL' => $detalle['unidad_make_up_total'] ?? null,
                    'ORD_DET_SALE_SALE' => $detalle['sale_sale'] ?? null,
                    'ORD_DET_SALE_SALE_TOTAL' => $detalle['sale_sale_total'] ?? null,
                    'ORD_DET_VALOR_TOTAL' => $detalle['valorTotal'] ?? null,
                    'ORD_DET_INFO' => json_encode($detalle['info'] ?? []),
                    'ORD_DET_CALCULO' => json_encode($detalle['calculo']['inputs'] ?? []),
                ]);
            }

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Orden registrada correctamente','idOrden'=>$ordenCabecera->ORD_ID]);
      
    }


    public function index(){
        return view('Orden.index');
    }

    public function delete(Request $request){
        $orden = Orden_cabecera::find($request->id);
        $orden->ORD_DELETE = 1;
        $orden->ORD_USER_DELETE = Auth::id();
        $orden->ORD_DATE_DELETE = Carbon::now(); 
        $orden->save();

        return response()->json(["object" => "success","menssage"=>"Orden Eliminada"]);
    }

    public function edit($id){
        $orden = Orden_cabecera::find($id);
        $user_create = null;
        if($orden->ORD_USER_CREATE){
            $user_create = User::find($orden->ORD_USER_CREATE);
        }
        
        // dd($orden);
        $proveedores= Proveedor::where('PRO_DELETE',0)->get();
        $paises =Pais::where('PA_DELETE',0)->get();
        $cliente=Empresa::where('EMP_DELETE',0)->get();
        $provincias=Provincias::all();
        $distritos=Distrito::all();
        $departamentos =Departamento::all();
        $documentos = files_multimedia::where('FILE_CODE','FILE_ORDEN')->where('FILE_ID_EXTERNO',$id)->get();
        $OrdenEstado=OrdenEstado::where('ODES_DELETE',0)->get();
        $OrdenEstadoDetalle = OrdenDetalleEstado::where('ORDS_DELETE',0)->get();
        return view('Orden.edit',compact('orden',"proveedores",'OrdenEstadoDetalle',"paises","cliente",'provincias','distritos','departamentos','documentos','OrdenEstado','user_create'));
    }


    public function update(Request $request, $id)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'ORD_PROVEEDOR_ID' => 'required',
            'ORD_FECHA' => 'required|date',
            'ORD_SEMANA_ENTREGA' => 'required|numeric|min:1|max:53',
            'ORD_ID_PAIS_ORIGEN' => 'required',
            'ORD_ID_PAIS_DESTINO' => 'required',
            'ORD_DIRECCION' => 'required',
            'ORD_COMENTARIOS' => 'required',
            'ODES_ID' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Find the order or fail
            $orden = Orden_cabecera::findOrFail($id);
            $nuevaFecha = Carbon::parse($orden->ORD_CREATED_AT)->addWeeks($request->ORD_SEMANA_ENTREGA)->toDateString();
            // Update order data
            $orden->ORD_PROVEEDOR_ID = $request->ORD_PROVEEDOR_ID;
            $orden->ORD_FECHA = $request->ORD_FECHA;
            $orden->ORD_SEMANA_ENTREGA = $request->ORD_SEMANA_ENTREGA;
            $orden->ORD_FECHA_LLEGANDA_TENTATIVA = $nuevaFecha;
            $orden->ORD_ID_PAIS_ORIGEN = $request->ORD_ID_PAIS_ORIGEN;
            $orden->ORD_ID_PAIS_DESTINO = $request->ORD_ID_PAIS_DESTINO;
            $orden->ORD_ID_DEPARTAMENTO = $request->ORD_ID_DEPARTAMENTO;
            $orden->ORD_ID_PROVINCIAS = $request->ORD_ID_PROVINCIAS;
            $orden->ORD_ID_DISTRITOS = $request->ORD_ID_DISTRITOS;
            $orden->ORD_DIRECCION = $request->ORD_DIRECCION;
            $orden->ORD_COMENTARIOS = $request->ORD_COMENTARIOS;
            $orden->ORD_ID_ORDEN_ESTADO = $request->ODES_ID;
            $orden->ORD_ID_CLIENTE = $request->ORD_ID_CLIENTE;
            // Update user information
            $orden->ORD_USER_UPDATE = Auth::id();
            
            // Save the order
            $orden->save();
            
         
            
            return redirect()
                ->route('ordenes.edit', $orden->ORD_ID)
                ->with('success', 'Orden actualizada correctamente');
                
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Error al actualizar orden: ' . $e->getMessage());
            
            return redirect()
                ->back()
                ->with('error', 'Error al actualizar la orden: ' . $e->getMessage())
                ->withInput();
        }
    }



    public function download(Request $request)
    {
        // Obtener el archivo desde la base de datos
        $file = files_multimedia::find($request->id);
        
        if (!$file) {
            return response()->json([
                'success' => false,
                'message' => 'Archivo no encontrado en la base de datos'
            ], 404);
        }
        
        /* 
        Tu ruta es: uploads/files/FILE_ORDEN/50801718-c4a0-4f68-829f-dcb37ee6fb7a.pdf
        
        Importante: 
        - Si tu ruta ya incluye 'public/' al inicio en la base de datos, usar solo $file->FILE_RUTA
        - Si tu ruta no incluye 'public/' y los archivos están en el disco público, usar 'public/' . $file->FILE_RUTA
        */
        
        // Si los archivos están en el disco público pero la ruta en la BD no incluye 'public/'
        $relativePath = 'public/' . $file->FILE_RUTA;
        
        // Si tu ruta ya incluye 'public/' en la BD, usar esto en su lugar:
        // $relativePath = $file->FILE_RUTA;
        
        // Verificar si el archivo existe
        if (!Storage::exists($relativePath)) {
            // Si el archivo no se encuentra, intenta sin el prefijo 'public/'
            $alternativePath = $file->FILE_RUTA;
            
            if (!Storage::exists($alternativePath)) {
                return response()->json([
                    'success' => false,
                    'message' => 'El archivo no existe en el almacenamiento',
                    'path_checked' => $relativePath,
                    'alternative_path_checked' => $alternativePath
                ], 404);
            }
            
            // Si lo encuentra sin el prefijo, usamos esa ruta
            $relativePath = $alternativePath;
        }
        
        // Descargar el archivo
        return Storage::download($relativePath, $file->FILE_NOMBRE_ORIGINAL ?? basename($file->FILE_RUTA));
    }

    public function uploadFilesFromAjax(Request $request)
    {
        $request->validate([
            'files' => 'required',
            'files.*' => 'file|max:20480',
            'file_code' => 'required|string',
            'id_externo' => 'nullable|string'
        ]);
        
        $files = $request->file('files');
        $fileCode = $request->input('file_code');
        $idExterno = $request->input('id_externo');
        
        $uploadedFiles = $this->saveFiles($files, $fileCode, $idExterno);
        
        return response()->json([
            'success' => true,
            'files' => $uploadedFiles
        ]);
    }

    /**
     * Guarda múltiples archivos y registra en base de datos
     * 
     * @param array $files Array de archivos (Illuminate\Http\UploadedFile[])
     * @param string $fileCode Código para la carpeta
     * @param string|null $idExterno ID externo opcional
     * @return array Información de los archivos guardados
     */
    public function saveFiles($files, $fileCode, $idExterno = null)
    {
        $uploadedFiles = [];
        
        // Crear la carpeta si no existe
        $basePath = 'uploads/files/' . $fileCode;
        $fullPath = storage_path('app/public/' . $basePath);
        
        if (!File::exists($fullPath)) {
            File::makeDirectory($fullPath, 0755, true);
        }

        // Procesar cada archivo
        foreach ($files as $file) {
            // Generar nombre único para el archivo
            $originalName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $fileName = Str::uuid() . '.' . $extension;
            $fileName = $idExterno."_".$fileName;
            // Guardar el archivo
            $filePath = $file->storeAs('public/' . $basePath, $fileName);
            
            // Determinar el tipo de archivo
            $fileType = $this->getFileType($extension);
            
            // Crear registro en la base de datos
            $fileMultimedia = files_multimedia::create([
                'FILE_TYPE' => $fileType,
                'FILE_RUTA' => $basePath . '/' . $fileName,
                'FILE_USER_CREATE' => Auth::id(),
                'FILE_DELETE' => false,
                'FILE_CREATED_AT' => now(),
                'FILE_CODE' => $fileCode,
                'FILE_ID_EXTERNO' => $idExterno
            ]);
            
            $uploadedFiles[] = [
                'id' => $fileMultimedia->FILE_ID,
                'name' => $originalName,
                'path' => asset('storage/' . $basePath . '/' . $fileName),
                'type' => $fileType
            ];
        }
        
        return $uploadedFiles;
    }

    /**
     * Determina el tipo de archivo basado en su extensión
     * 
     * @param string $extension
     * @return string
     */
    private function getFileType($extension)
    {
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'webp'];
        $videoExtensions = ['mp4', 'avi', 'mov', 'wmv', 'flv', 'mkv', 'webm'];
        $audioExtensions = ['mp3', 'wav', 'ogg', 'aac', 'wma'];
        $documentExtensions = ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'txt'];
        
        $extension = strtolower($extension);
        
        if (in_array($extension, $imageExtensions)) {
            return 'image';
        } elseif (in_array($extension, $videoExtensions)) {
            return 'video';
        } elseif (in_array($extension, $audioExtensions)) {
            return 'audio';
        } elseif (in_array($extension, $documentExtensions)) {
            return 'document';
        } else {
            return 'other';
        }
    }

    public function getDetalle(Request $request){
        // Parámetros de DataTables
    $draw = $request->input('draw', 1);
    $start = $request->input('start', 0);
    $length = $request->input('length', 10);
    $search = $request->input('search.value', '');
    $orderColumn = $request->input('order.0.column', 0);
    $orderDir = $request->input('order.0.dir', 'asc');
    
    // Obtener las columnas
    $columns = [
        'ORD_DET_ID', 'ORD_ID_ORDEN_CABECERA', 'ORD_DET_PRODUCTO_ID', 
        'ORD_DET_CODE_COPE', 'ORD_DET_COD_CLIENTE', 'ORD_DET_UNI_MEDIDA',
        'ORD_DET_CANTIDAD', 'ORD_DET_PRECIO', 'ORD_DET_SEMANAS',
        'ORD_DET_CIF_VALOR', 'ORD_DET_SALES_FACTOR', 'ORD_DET_AD_VALOREM',
        'ORD_DET_AD_VALOREM_TOTAL', 'ORD_DET_PRECIO_UNI', 'ORD_DET_PRECIO_UNI_TOTAL',
        'ORD_DET_UNIDAD_MAKE_UP', 'ORD_DET_UNIDAD_MAKE_UP_TOTAL', 'ORD_DET_SALE_SALE',
        'ORD_DET_SALE_SALE_TOTAL', 'ORD_DET_VALOR_TOTAL', 'ORD_DET_INFO'
    ];
    
    // Construir la consulta
    $query = Orden_detalle::query();
    
    // Filtrar por ID de orden cabecera si se proporciona
    if ($request->has('idOrden') && $request->idOrden) {
        $query->where('ORD_ID_ORDEN_CABECERA', $request->idOrden);
    }
    $query->where('ORD_DET_DELETE',0);
    $query->with('producto');
    // Aplicar búsqueda global
    if (!empty($search)) {
        $query->where(function($q) use ($search, $columns) {
            foreach ($columns as $column) {
                $q->orWhere($column, 'LIKE', "%{$search}%");
            }
        });
    }
    
    // Contar el total de registros sin filtrar
    $recordsTotal = $query->count();
    
    // Aplicar ordenamiento
    $columnToOrder = isset($columns[$orderColumn]) ? $columns[$orderColumn] : $columns[0];
    $query->orderBy($columnToOrder, $orderDir);
    
    // Aplicar paginación
    $data = $query->skip($start)->take($length)->get();
    
    // Contar registros después de filtrar
    $recordsFiltered = $recordsTotal;
    if (!empty($search)) {
        $recordsFiltered = $query->count();
    }
    
    // Formato de respuesta para DataTables
    return response()->json([
        'draw' => intval($draw),
        'recordsTotal' => $recordsTotal,
        'recordsFiltered' => $recordsFiltered,
        'data' => $data
    ]);
    }


    public function updateEstadoDetalle(Request $request){
        $Orden_detalle =  Orden_detalle::find($request->id_orden);
        $Orden_detalle->ORD_ID_ESTADO = $request->orden_estado;
        $Orden_detalle->save();

        return response()->json(["object"=>"success", "message"=>"Creado"]);
    }

    public function updateOrdenDetalleTipoEnvio(Request $request){
        $Orden_detalle =  Orden_detalle::find($request->id_orden);
        $Orden_detalle->ORD_ID_TIPO_ENVIO = $request->tipo_envio;
        $Orden_detalle->save();

        return response()->json(["object"=>"success", "message"=>"Creado"]);
    }

    public function deleteOrdenDetalle(Request $request){
        $Orden_detalle =  Orden_detalle::find($request->idOrdenDetalle);
        $Orden_detalle->ORD_DET_DELETE = 1;
        $Orden_detalle->save();

        $Orden_detalle->ORD_ID_ORDEN_CABECERA;

        $array_orden_detalle = Orden_detalle::where('ORD_ID_ORDEN_CABECERA',$Orden_detalle->ORD_ID_ORDEN_CABECERA)->where('ORD_DET_DELETE', 0)->get();
        $total_monto = 0;
        foreach ($array_orden_detalle as $key => $value) {
            # code...
            $total_monto +=$value->ORD_DET_VALOR_TOTAL;
        }

        $orden = Orden_cabecera::find($Orden_detalle->ORD_ID_ORDEN_CABECERA);
        $orden->ORD_TOTAL_ORDEN = $total_monto;
        $orden->ORD_UPDATED_AT = now();
        $orden->ORD_USER_UPDATE = Auth::id();
        $orden->save();

        return response()->json(["object"=>"success", "message"=>"Creado"]);
    }
  
}
