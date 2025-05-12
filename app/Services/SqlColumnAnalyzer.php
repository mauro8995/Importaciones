<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class SqlColumnAnalyzer
{
    private array $tableAliases = [];
    private array $allTableColumns = [];
    private array $foreignKeys = [];

    /**
     * Analiza una consulta SQL y retorna información detallada de las columnas
     */
    public function analyze(string $sqlQuery): array
    {
        // Primero extraemos los aliases de las tablas
        $this->extractTableAliases($sqlQuery);
        
        // Obtener información de llaves foráneas
        $this->extractForeignKeys();

        return [
            'selected_columns' => $this->extractColumnInfo($sqlQuery),
            'all_columns' => $this->getAllTableColumns()
        ];
    }

    /**
     * Extrae información de las llaves foráneas para todas las tablas involucradas
     */
    private function extractForeignKeys(): void
    {
        $this->foreignKeys = [];
        
        foreach ($this->tableAliases as $tableName) {
            $foreignKeys = DB::select("
                SELECT 
                    KCU.COLUMN_NAME,
                    KCU.TABLE_NAME AS TABLE_NAME,
                    KCU.CONSTRAINT_NAME,
                    RC.DELETE_RULE,
                    RC.UPDATE_RULE,
                    KCU2.TABLE_NAME AS REFERENCED_TABLE,
                    KCU2.COLUMN_NAME AS REFERENCED_COLUMN
                FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE KCU
                INNER JOIN INFORMATION_SCHEMA.REFERENTIAL_CONSTRAINTS RC 
                    ON KCU.CONSTRAINT_NAME = RC.CONSTRAINT_NAME
                INNER JOIN INFORMATION_SCHEMA.KEY_COLUMN_USAGE KCU2 
                    ON RC.UNIQUE_CONSTRAINT_NAME = KCU2.CONSTRAINT_NAME
                WHERE KCU.TABLE_NAME = ?
            ", [$tableName]);

            foreach ($foreignKeys as $fk) {
                $this->foreignKeys[$tableName][$fk->COLUMN_NAME] = [
                    'constraint_name' => $fk->CONSTRAINT_NAME,
                    'referenced_table' => $fk->REFERENCED_TABLE,
                    'referenced_column' => $fk->REFERENCED_COLUMN,
                    'delete_rule' => $fk->DELETE_RULE,
                    'update_rule' => $fk->UPDATE_RULE
                ];
            }
        }
    }

    /**
     * Obtiene todas las columnas de las tablas mencionadas
     */
    private function getAllTableColumns(): array
    {
        $allColumns = [];
        
        foreach ($this->tableAliases as $alias => $tableName) {
            $columns = DB::select("
                SELECT 
                    C.COLUMN_NAME,
                    C.DATA_TYPE,
                    C.CHARACTER_MAXIMUM_LENGTH,
                    C.NUMERIC_PRECISION,
                    C.NUMERIC_SCALE,
                    C.IS_NULLABLE,
                    COLUMNPROPERTY(object_id(?), C.COLUMN_NAME, 'IsIdentity') as IS_IDENTITY,
                    CASE 
                        WHEN PK.COLUMN_NAME IS NOT NULL THEN 1
                        ELSE 0
                    END as IS_PRIMARY_KEY
                FROM INFORMATION_SCHEMA.COLUMNS C
                LEFT JOIN (
                    SELECT K.TABLE_NAME, K.COLUMN_NAME
                    FROM INFORMATION_SCHEMA.TABLE_CONSTRAINTS AS T
                    JOIN INFORMATION_SCHEMA.KEY_COLUMN_USAGE AS K
                    ON T.CONSTRAINT_NAME = K.CONSTRAINT_NAME
                    WHERE T.CONSTRAINT_TYPE = 'PRIMARY KEY'
                ) PK 
                ON C.TABLE_NAME = PK.TABLE_NAME 
                AND C.COLUMN_NAME = PK.COLUMN_NAME
                WHERE C.TABLE_NAME = ?
                ORDER BY C.ORDINAL_POSITION
            ", [$tableName, $tableName]);
            
            $tableColumns = [];
            foreach ($columns as $column) {
                // Verificar si es llave foránea
                $foreignKeyInfo = $this->foreignKeys[$tableName][$column->COLUMN_NAME] ?? null;

                $tableColumns[] = [
                    'table' => $tableName,
                    'table_alias' => $alias,
                    'column_name' => $column->COLUMN_NAME,
                    'column_alias' => $alias . '.' . $column->COLUMN_NAME,
                    'data_type' => $this->formatDataType($column),
                    'is_nullable' => $column->IS_NULLABLE === 'YES',
                    'is_primary_key' => (bool)$column->IS_PRIMARY_KEY,
                    'is_identity' => (bool)$column->IS_IDENTITY,
                    'is_foreign_key' => $foreignKeyInfo !== null,
                    'foreign_key_info' => $foreignKeyInfo
                ];
            }
            
            $allColumns[$tableName] = [
                'alias' => $alias,
                'columns' => $tableColumns
            ];
        }
        
        return $allColumns;
    }

    private function extractColumnInfo(string $sqlQuery): array
    {
        $columnInfo = [];
        
        if (preg_match('/SELECT(.*?)FROM/is', $sqlQuery, $matches)) {
            $selectPart = $matches[1];
            
            preg_match_all('/([A-Za-z0-9_]+)\.([A-Za-z0-9_]+)\s+AS\s*\[(.*?)\]/i', $selectPart, $columnMatches, PREG_SET_ORDER);
            
            foreach ($columnMatches as $match) {
                $tableAlias = $match[1];
                $columnName = $match[2];
                $columnAlias = $match[3];
                
                $tableName = $this->getTableNameFromAlias($tableAlias);
                
                if ($tableName) {
                    // Verificar si es llave foránea
                    $foreignKeyInfo = $this->foreignKeys[$tableName][$columnName] ?? null;

                    // Obtener información de la columna
                    $columnData = DB::selectOne("
                        SELECT 
                            DATA_TYPE,
                            CHARACTER_MAXIMUM_LENGTH,
                            NUMERIC_PRECISION,
                            NUMERIC_SCALE,
                            IS_NULLABLE,
                            COLUMNPROPERTY(object_id(?), ?, 'IsIdentity') as IS_IDENTITY
                        FROM INFORMATION_SCHEMA.COLUMNS 
                        WHERE TABLE_NAME = ? AND COLUMN_NAME = ?
                    ", [$tableName, $columnName, $tableName, $columnName]);

                    if ($columnData) {
                        $columnInfo[] = [
                            'table' => $tableName,
                            'table_alias' => $tableAlias,
                            'column_name' => $columnName,
                            'column_alias' => $columnAlias,
                            'data_type' => $this->formatDataType($columnData),
                            'is_nullable' => $columnData->IS_NULLABLE === 'YES',
                            'is_identity' => (bool)$columnData->IS_IDENTITY,
                            'is_foreign_key' => $foreignKeyInfo !== null,
                            'foreign_key_info' => $foreignKeyInfo
                        ];
                    }
                }
            }
        }
        
        return $columnInfo;
    }

    ///----
    
   
  

    private function extractTableAliases(string $sqlQuery): void
    {
        // Limpiar aliases previos
        $this->tableAliases = [];
        
        // Patrón para encontrar FROM y JOINs
        $pattern = '/(?:FROM|JOIN)\s+([A-Za-z0-9_]+)\s+(?:AS\s+)?([A-Za-z0-9_]+)/i';
        
        preg_match_all($pattern, $sqlQuery, $matches, PREG_SET_ORDER);
        
        foreach ($matches as $match) {
            $tableName = $match[1];
            $alias = $match[2];
            $this->tableAliases[$alias] = $tableName;
        }
    }
    
    /**
     * Obtiene el nombre real de la tabla desde su alias
     *
     * @param string $alias
     * @return string|null
     */
    private function getTableNameFromAlias(string $alias): ?string
    {
        return $this->tableAliases[$alias] ?? null;
    }
    
    /**
     * Obtiene el tipo de dato de una columna
     *
     * @param string $tableName
     * @param string $columnName
     * @return string
     */
    private function getColumnDataType(string $tableName, string $columnName): string
    {
        try {
            $column = DB::selectOne("
                SELECT 
                    DATA_TYPE,
                    CHARACTER_MAXIMUM_LENGTH,
                    NUMERIC_PRECISION,
                    NUMERIC_SCALE,
                    IS_NULLABLE
                FROM INFORMATION_SCHEMA.COLUMNS 
                WHERE TABLE_NAME = ?
                AND COLUMN_NAME = ?
            ", [$tableName, $columnName]);
            
            if (!$column) {
                return 'unknown';
            }
            
            return $this->formatDataType($column);
            
        } catch (\Exception $e) {
            return 'error: ' . $e->getMessage();
        }
    }
    
    /**
     * Formatea el tipo de dato con su precisión/longitud
     *
     * @param object $column
     * @return string
     */
    private function formatDataType(object $column): string
    {
        $dataType = strtolower($column->DATA_TYPE);
        
        if (in_array($dataType, ['decimal', 'numeric'])) {
            return "{$dataType}({$column->NUMERIC_PRECISION},{$column->NUMERIC_SCALE})";
        }
        
        if (in_array($dataType, ['varchar', 'nvarchar', 'char', 'nchar'])) {
            $length = $column->CHARACTER_MAXIMUM_LENGTH === -1 ? 'max' : $column->CHARACTER_MAXIMUM_LENGTH;
            return "{$dataType}({$length})";
        }
        
        return $dataType;
    }


    // ---


    
}