<?php

namespace App\Http\Controllers;

use App\Services\SqlColumnAnalyzer;
use Illuminate\Http\Request;
use App\Models\Filtro\Filtro;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{
    //

     // Vista para configurar filtros
     public function configure()
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


     // Guardar la configuración de filtros
    public function store(Request $request)
    {
        
    }
    public function getColumns(Request $request)
    {
        
        $analyzer = new SqlColumnAnalyzer();

        $sql = $request->consulta;

        // Obtener todas las columnas de las tablas
        $allColumns = $analyzer->analyze($sql);

        return response()->json([
            'success' => true,
            'all_columns' => $allColumns
        ]);
    }


    public function getColumnsdata(Request $request)
    {
        $tableName = $request->table;
        
        try {
            $columns = DB::select("
                SELECT 
                    COLUMN_NAME as column_name,
                    DATA_TYPE as data_type,
                    CHARACTER_MAXIMUM_LENGTH,
                    NUMERIC_PRECISION,
                    NUMERIC_SCALE,
                    IS_NULLABLE,
                    COLUMNPROPERTY(object_id(?), COLUMN_NAME, 'IsIdentity') as is_identity
                FROM INFORMATION_SCHEMA.COLUMNS 
                WHERE TABLE_NAME = ?
                ORDER BY ORDINAL_POSITION
            ", [$tableName, $tableName]);

            // Formatear los tipos de datos
            foreach ($columns as &$column) {
                // Formatear el tipo de dato según su tipo
                if (in_array($column->data_type, ['varchar', 'nvarchar', 'char', 'nchar'])) {
                    $length = $column->CHARACTER_MAXIMUM_LENGTH === -1 ? 'max' : $column->CHARACTER_MAXIMUM_LENGTH;
                    $column->data_type = "{$column->data_type}($length)";
                }
                elseif (in_array($column->data_type, ['decimal', 'numeric'])) {
                    $column->data_type = "{$column->data_type}({$column->NUMERIC_PRECISION},{$column->NUMERIC_SCALE})";
                }
            }

            return response()->json([
                'success' => true,
                'columns' => $columns
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener las columnas',
                'error' => $e->getMessage()
            ], 500);
        }
    }



    public function ejecutarConsulta(Request $request)
    {
        $consultaSQL = $request->input('query'); // Recibe la consulta desde el frontend
        $filtro = $request->input('where', null); // Parámetro opcional para filtro

        // Validar que la consulta contiene SELECT y FROM (seguridad básica)
        if (!preg_match('/\bSELECT\b/i', $consultaSQL) || !preg_match('/\bFROM\b/i', $consultaSQL)) {
            return response()->json(['error' => 'Consulta no válida'], 400);
        }

        // Extraer nombres de las columnas con alias dentro de []
        preg_match_all('/\[(.*?)\]/', $consultaSQL, $matches);
        $columnas = $matches[1] ?? [];

        if (empty($columnas)) {
            return response()->json(['error' => 'No se encontraron alias en la consulta'], 400);
        }

        // Agregar WHERE si existe
        if ($filtro) {
            $consultaSQL .= " WHERE $filtro";
        }

        // Agregar límite de 200 registros
        //$consultaSQL .= " LIMIT 200";

        try {
            // Ejecutar la consulta y obtener los resultados
            $datos = DB::select($consultaSQL);

            // Convertir los resultados a un array asociativo
            $datosArray = array_map(function ($item) {
                return (array) $item;
            }, $datos);

            return response()->json([
                'columns' => $columnas,
                'data' => $datosArray
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al ejecutar la consulta', 'detalle' => $e->getMessage()], 500);
        }
    }



    public function tablaInfo(Request $request) {
        $tabla = $request->query('tabla');
        $valueField = $request->query('valueField');
        $textField = $request->query('textField');
        $deleted = $request->query('delete');
        if (!$tabla || !$valueField || !$textField) {
            return response()->json(['error' => 'Faltan parámetros'], 400);
        }
    
        // Consulta genérica para traer datos de cualquier tabla
        $datos = DB::table($tabla)->select($valueField, $textField)->where($deleted,0)->get();
    
        return response()->json($datos);
    }
}
