<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('cari/login_react','App\Http\Controllers\UserController@login_react');

Route::get('cari/obtener_reportes/{status}', 'App\Http\Controllers\PageController@obtenerTblReportesApi');
Route::get('cari/obtener_usuarios', 'App\Http\Controllers\PageController@obtenerTblEmpleados');
Route::get('cari/obtener_insumos', 'App\Http\Controllers\PageController@obtenerInsumosAPI');

//insumos para retablas de los mismos
Route::get('cari/obtener_poblaciones/{categoria}', 'App\Http\Controllers\PageController@obtenerInsumosPC');

Route::get('cari/obtener_detalleReporte/{pk}','App\Http\Controllers\ReportesController@obtenerDetalleReporteAPI');

Route::post('cari/register_user','App\Http\Controllers\UserController@register_user');
Route::post('cari/registrar_reporte','App\Http\Controllers\ReportesController@registrarReporteAPI');

//Actualizaciones desde modal
Route::post('cari/actualizar_reporte','App\Http\Controllers\ReportesController@actualizarReporteAPI');
Route::get('cari/atendiendo_reporte/{id}/{empleado}','App\Http\Controllers\ReportesController@atendiendoReporteAPI');
Route::get('cari/desatendiendo_reporte/{id}','App\Http\Controllers\ReportesController@desatendiendoReporteAPI');