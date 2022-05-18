<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('login');
});

Route::post('/login','App\Http\Controllers\UserController@login')->name('login');
Route::get('/logout','App\Http\Controllers\UserController@logout')->name('logout');

Route::get('/inicio','App\Http\Controllers\PageController@obtenerInsumos')->name('inicio');

// Rutas modulo de control reportes
Route::post('registrarReporte','App\Http\Controllers\ReportesController@registrarReporte')->name('registrarReporte');

// Rutas catalogos
    // poblaciones
    Route::post('registrarPoblacion','App\Http\Controllers\PoblacionesController@registrarPoblacion')->name('registrarPoblacion');

    // problemas
    Route::post('registrarProblema','App\Http\Controllers\ProblemasController@registrarProblema')->name('registrarProblema');

    // roles
    Route::post('registrarRol','App\Http\Controllers\RolesController@registrarRol')->name('registrarRol');

// Rutas con respecto a usuario/empleado
Route::post('actualizarEmpleado','App\Http\Controllers\UserController@actualizarEmpleado')->name('actualizarEmpleado');

// Rutas para la navegación de los reportes
Route::get('/reportes/{status}','App\Http\Controllers\PageController@obtenerInsumosReportes')->name('reportes');

//obtener detalle de cada reportes según se presione un click
Route::get('/detalleReporte/{id}','App\Http\Controllers\ReportesController@obtenerDetalleReporte')->name('detalleReporte');

//actualizar reporte en curso desde el modal
Route::post('actualizarReporte','App\Http\Controllers\ReportesController@actualizarReporte')->name('actualizarReporte');

// Cambiar a vista de insumos correspondiente
Route::get('/obtenerInsumosRoles','App\Http\Controllers\PageController@obtenerInsumosRoles')->name('obtenerInsumosRoles');
Route::get('/obtenerInsumosProblemas','App\Http\Controllers\PageController@obtenerInsumosProblemas')->name('obtenerInsumosProblemas');
Route::get('/obtenerInsumosPoblaciones','App\Http\Controllers\PageController@obtenerInsumosPoblaciones')->name('obtenerInsumosPoblaciones');

//rutas para servicios de estado reporte
Route::get('/atendiendo/{id}','App\Http\Controllers\ReportesController@atendiendoReporte')->name('atendiendo');
Route::get('/desatendiendo/{id}','App\Http\Controllers\ReportesController@desatendiendoReporte')->name('desatendiendo');
Route::get('/atender/{id}','App\Http\Controllers\ReportesController@atenderReporte')->name('atender');
Route::get('/retomar/{id}','App\Http\Controllers\ReportesController@retomarReporte')->name('retomar');

// rutas para servicios de estado en insumos
Route::get('/inactivarRol/{id}','App\Http\Controllers\RolesController@inactivarRol')->name('inactivarRol');
Route::get('/activarRol/{id}','App\Http\Controllers\RolesController@activarRol')->name('activarRol');

Route::get('/inactivarProblema/{id}','App\Http\Controllers\ProblemasController@inactivarProblema')->name('inactivarProblema');
Route::get('/activarProblema/{id}','App\Http\Controllers\ProblemasController@activarProblema')->name('activarProblema');

Route::get('/inactivarPoblacion/{id}','App\Http\Controllers\PoblacionesController@inactivarPoblacion')->name('inactivarPoblacion');
Route::get('/activarPoblacion/{id}','App\Http\Controllers\PoblacionesController@activarPoblacion')->name('activarPoblacion');

// obtener detalle de cada insumo por click
Route::get('/detallePoblacion/{id}','App\Http\Controllers\PoblacionesController@detallePoblacion')->name('detallePoblacion');
Route::get('/detalleProblema/{id}','App\Http\Controllers\ProblemasController@detalleProblema')->name('detalleProblema');
Route::get('/detalleRol/{id}','App\Http\Controllers\RolesController@detalleRol')->name('detalleRol');
Route::get('/detalleUsuario/{id}','App\Http\Controllers\UserController@detalleUsuario')->name('detalleUsuario');

// Modificaciones de insumos
Route::post('actualizarPoblacion','App\Http\Controllers\PoblacionesController@actualizarPoblacion')->name('actualizarPoblacion');
Route::post('actualizarProblema','App\Http\Controllers\ProblemasController@actualizarProblema')->name('actualizarProblema');
Route::post('actualizarRol','App\Http\Controllers\RolesController@actualizarRol')->name('actualizarRol');

// insumos para pagina usuarios
Route::get('/obtenerUsuarios','App\Http\Controllers\PageController@obtenerUsuarios')->name('obtenerUsuarios');

// insumos para clientes
Route::get('/obtenerClientes','App\Http\Controllers\PageController@obtenerClientes')->name('obtenerClientes');

// acciones para usuarios
Route::get('/inactivarUsuario/{id}','App\Http\Controllers\UserController@inactivarUsuario')->name('inactivarUsuario');
Route::get('/activarUsuario/{id}','App\Http\Controllers\UserController@activarUsuario')->name('activarUsuario');
Route::post('registrarUsuario','App\Http\Controllers\UserController@registrarUsuario')->name('registrarUsuario');

// acciones para clientes
Route::get('/inactivarCliente/{id}','App\Http\Controllers\ClientesController@inactivarCliente')->name('inactivarCliente');
Route::get('/activarCliente/{id}','App\Http\Controllers\ClientesController@activarCliente')->name('activarCliente');
Route::post('registrarCliente','App\Http\Controllers\ClientesController@registrarCliente')->name('registrarCliente');

// rutas excel
Route::get('/reporteExcel','App\Http\Controllers\ReportesController@reporteExcel')->name('reporteExcel');