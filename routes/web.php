<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/1', function () {
    return view('welcome');
}); */


Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');   
  
Route::resource('ues', App\Http\Controllers\UEController::class);
/* Route::get('boleta', [App\Http\Controllers\BoletaController::class, 'index'])->name('boleta.index');
Route::get('boleta/create', [App\Http\Controllers\BoletaController::class, 'create'])->name('boleta.create');
Route::post('boleta/store', [App\Http\Controllers\BoletaController::class, 'store'])->name('boleta.store');


*///Route::get('prodsigma', [App\Http\Controllers\ProductoSigmaController::class, 'index'])->name('prodsigma.index');
/* Route::get('productos', [App\Http\Controllers\ProductoController::class, 'index'])->name('producto.index');
Route::get('productos/{id}/edit', [App\Http\Controllers\ProductoController::class, 'edit'])->name('producto.edit');
Route::get('productos/create', [App\Http\Controllers\ProductoController::class, 'create'])->name('producto.create');
Route::post('productos/store', [App\Http\Controllers\ProductoController::class, 'store'])->name('producto.store');
 */
Route::resource('prodsigma', App\Http\Controllers\ProductoSigmaController::class);
Route::resource('boleta', App\Http\Controllers\BoletaController::class);
Route::get('boleta/pdf/{id}', [App\Http\Controllers\BoletaController::class, 'GenerarBoleta'])->name('boleta.GenerarBoleta');
Route::get('boleta/pdf_acta/{id}', [App\Http\Controllers\BoletaController::class, 'GenerarActa'])->name('boleta.GenerarActa');
Route::resource('productos', App\Http\Controllers\ProductoController::class);

/* Route::get('entradas', [App\Http\Controllers\EntradaController::class, 'index'])->name('entrada.index'); */
Route::resource('entradas', App\Http\Controllers\EntradaController::class);
Route::get('entradas/pdf/{id}', [App\Http\Controllers\EntradaController::class, 'Generar'])->name('entradas.Generar');
//Route::get('proveedor', [App\Http\Controllers\ProveedorController::class, 'index'])->name('proveedor.index');

Route::resource('proveedor', App\Http\Controllers\ProveedorController::class);
Route::resource('roles', App\Http\Controllers\RoleController::class);
Route::resource('permissions', App\Http\Controllers\PermissionController::class);
 //Route::resource('users', UserController::class);
Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('inventario', App\Http\Controllers\InventarioController::class);
Route::get('reporteinv/pdf', [App\Http\Controllers\InventarioController::class, 'GenerarINV'])->name('inventario.GenerarINV');
Route::resource('reporte', App\Http\Controllers\ReporteController::class);
Route::get('reporte/pdf/{id}', [App\Http\Controllers\ReporteController::class, 'GenerarUE'])->name('boleta.GenerarUE');
Route::get('reportedis/pdf/{id}', [App\Http\Controllers\ReporteController::class, 'GenerarDIS'])->name('boleta.GenerarDIS');
Route::get('ajax-auto', [App\Http\Controllers\EntradaController::class,'selectSearch']);

Route::get('ajax-auto1', [App\Http\Controllers\EntradaController::class,'selectSearchProducto']);
Route::get('ajax-auto2', [App\Http\Controllers\EntradaController::class,'selectSearchSigma']);
Route::get('ajax-auto3', [App\Http\Controllers\BoletaController::class,'selectSearchUE']);
Route::get('ajax-auto4', [App\Http\Controllers\BoletaController::class,'selectSearchIngreso']);
Route::get('buscar', [App\Http\Controllers\ReporteController::class,'buscar'])->name('reporte.buscar');
Route::get('buscardis', [App\Http\Controllers\ReporteController::class,'buscardis'])->name('reporte.buscardis');
});
