<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\ProveedorControlles; 
use App\Http\Controllers\BancoController;
use App\Http\Controllers\TipoCuentaController;
use App\Http\Controllers\TipoProveedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RubroController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\OrdenEstadoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\OrdenDetalleEstadoController;



Route::resource('users', UserController::class);
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('home');



Route::middleware('auth')->group(function () {

    Route::get('/Marca/index', [MarcaController::class,'index'])->name('Marca.index');



    Route::get('/OrdenDetalleEstado/index', [OrdenDetalleEstadoController::class,'index'])->name('OrdenDetalleEstado.index');
    Route::get('/OrdenDetalleEstado/create', [OrdenDetalleEstadoController::class,'create']);
    Route::get('/OrdenDetalleEstado/edit/{id}', [OrdenDetalleEstadoController::class,'edit']);
    Route::post('/OrdenDetalleEstado/store', [OrdenDetalleEstadoController::class,'store']);
    Route::post('/OrdenDetalleEstado/update', [OrdenDetalleEstadoController::class,'update']);
    
    // Todas estas rutas requieren autenticación


    Route::get('/filters/configure', [FilterController::class, 'configure'])->name('filters.configure');
    Route::post('/filters/store', [FilterController::class, 'store'])->name('filters.store');
    Route::post('/filters/apply', [FilterController::class, 'filter'])->name('filters.filter');
    Route::post('/filters/columns', [FilterController::class, 'getColumns'])->name('filters.columns');
    Route::post('/get-table-columns', [FilterController::class, 'getColumnsdata'])->name('get.table.columns');
    Route::get('/tableInfo', [FilterController::class, 'tablaInfo']);
    
    
    Route::get('/filter/ejecutarConsulta', [FilterController::class, 'ejecutarConsulta']);
    
    
    
    Route::get('/empresas/create', [EmpresaController::class, 'create']);
    Route::post('/empresas/store', [EmpresaController::class, 'store']);
    Route::get('/empresas/index', [EmpresaController::class, 'index'])->name('empresas.index');
    Route::get('/empresas/edit/{id}', [EmpresaController::class, 'edit'])->name('empresa.edit');
    Route::put('/empresas/{id}', [EmpresaController::class, 'update'])->name('empresa.update');
    Route::get('/empresas/getdata', [EmpresaController::class, 'show']);
    
    
   
    
    Route::get('/Orden/create', [OrdenController::class, 'create']);
    Route::get('/Orden/tracking', [OrdenController::class, 'tracking']);
    Route::post('/Orden/store', [OrdenController::class, 'store'])->name('orden.store');
    Route::post('/Orden/delete', [OrdenController::class, 'delete']);
    Route::get('/Orden/index', [OrdenController::class, 'index']);
    Route::get('/Orden/edit/{id}', [OrdenController::class, 'edit'])->name('ordenes.edit');
    Route::post('/Orden/{id}', [OrdenController::class, 'update'])->name('ordenes.update');
    Route::post('/Orden/upload/file', [OrdenController::class, 'uploadFilesFromAjax']);
    Route::get('/Orden/descargar/{id}', [OrdenController::class, 'download']);
    Route::get('/Orden/detalle/get', [OrdenController::class, 'getDetalle']);
    Route::post('/Orden/detalle/delete', [OrdenController::class, 'deleteOrdenDetalle']);

    Route::post('/Orden/update/ordenEstado', [OrdenController::class, 'updateEstadoDetalle']);
    Route::post('/Orden/update/ordenTipoEnvio', [OrdenController::class, 'updateOrdenDetalleTipoEnvio']);
    
    // Route::post('/Orden/delete', [OrdenController::class, 'updateDeleteOrden']);

    
    
  
    
    Route::get('/Proveedor/create', [ProveedorControlles::class, 'create']);
    Route::get('/Proveedor/index', [ProveedorControlles::class, 'index']);
    Route::post('/Proveedores/store', [ProveedorControlles::class, 'store'])->name('proveedores.store');
    
  
    
    Route::get('/TipoCuenta/create', [TipoCuentaController::class, 'create']);
    Route::get('/TipoCuenta/index', [TipoCuentaController::class, 'index']);
    Route::post('/TipoCuenta/store', [TipoCuentaController::class, 'store']);
    
    
    
    
    Route::get('/Banco/create', [BancoController::class, 'create']);
    Route::post('/Banco/store', [BancoController::class, 'store']);
    Route::get('/Banco/index', [BancoController::class, 'index']);
    
    
    Route::get('/TipoProveedor/create', [TipoProveedorController::class, 'create']);
    
    
    
    Route::get('/Rubro/create', [RubroController::class, 'create']);
    Route::get('/Rubro/index', [RubroController::class, 'index']);
    
    
   
    Route::get('/productos/create', [ProductoController::class, 'create']);
    Route::post('/productos/store', [ProductoController::class, 'store'])->name('productos.store');

    Route::post('/productos/delete', [ProductoController::class, 'delete']);
    Route::get('/productos/select2', [ProductoController::class, 'getProductos'])->name('productos.select2');
    Route::get('/productos/info/{id}', [ProductoController::class, 'getInfoProducto'])->name('productos.info');
    Route::get('/productos/index', [ProductoController::class, 'index']);
    Route::get('/productos/edit/{id}', [ProductoController::class, 'edit'])->name('productos.edit');
    Route::post('/productos/update/{id}', [ProductoController::class, 'update'])->name('productos.update');
    
    
    
    
    Route::post('/Cotizacion', [PdfController::class, 'generarCotizacion']);
    Route::post('/Cotizacion/orden/{id}', [PdfController::class, 'generateOrden']);
    
    
 
    
    Route::get('/OrdenEstado/index',  [OrdenEstadoController::class, 'index'])->name('OrdenEstado.index');
    Route::get('/OrdenEstado/create',  [OrdenEstadoController::class, 'create']);
    Route::get('/OrdenEstado/edit/{id}',  [OrdenEstadoController::class, 'edit'])->name('OrdenEstado.edit');
    Route::post('/OrdenEstado/update/{id}',  [OrdenEstadoController::class, 'update']);
    Route::post('/OrdenEstado/store',  [OrdenEstadoController::class, 'store']);
    Route::post('/OrdenEstado/delete',  [OrdenEstadoController::class, 'destroy']);


    Route::get('/user/change-password/{id}', [UserController::class, 'showChangePasswordForm'])->name('user.changePasswordForm');
    Route::post('/user/change-password', [UserController::class, 'updatePassword'])->name('user.updatePassword');
});

