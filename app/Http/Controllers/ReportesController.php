<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\TblDirecciones;
use App\Models\TblClientes;
use App\Models\TblDetalleReporte;
use App\Models\TblReportes;
use App\Http\Controllers\PageController;

use App\Exports\ReportesExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportesController extends Controller
{

    public function registrarReporte (Request $request) {
        if ( session()->has('usuario') ) {
            try {

                DB::beginTransaction();

                    $detalle = new TblDetalleReporte;
                    $detalle->save();

                    $reporte                            = new TblReportes;
                    $reporte->FKCatProblemas            = $request['PKCatProblemas'];
                    $reporte->FKTblEmpleadosRecibio     = session('usuario')[0]->{'PKTblEmpleados'};
                    $reporte->FKCatStatus               = 1;
                    $reporte->FKTblDetalleReporte       = $detalle->id;
                    $reporte->FKTblClientes             = $request['PKTblClientes'];
                    $reporte->descripcionProblema       = $request['descripcionProblema'];
                    $reporte->observaciones             = $request['observaciones'];
                    $reporte->fechaAlta                 = Carbon::now();
                    $var = $reporte->save();
                    
                DB::commit();

                return back();

            } catch (\Throwable $th) {
                Log::info($th);
                return back()->withErrors(['mensajeError' => 'Algo no salió bien.']);
            }
        } else {
            return redirect('/');
        }
    }

    public function registrarReporteAPI (Request $request) {
        Log::alert($request);
        try {

            DB::beginTransaction();

                $detalle = new TblDetalleReporte;
                $detalle->save();

                $reporte                            = new TblReportes;
                $reporte->FKCatProblemas            = $request['PKCatProblemas'];
                $reporte->FKTblEmpleadosRecibio     = $request['PKTblEmpleados'];
                $reporte->FKCatStatus               = 1;
                $reporte->FKTblDetalleReporte       = $detalle->id;
                $reporte->FKTblClientes             = $request['PKTblClientes'];
                $reporte->descripcionProblema       = $request['descripcionProblema'];
                $reporte->observaciones             = $request['observaciones'];
                $reporte->fechaAlta                 = Carbon::now();
                $var = $reporte->save();
                
            DB::commit();

        } catch (\Throwable $th) {
            Log::info($th);
            return $th;
        }
    }

    public function actualizarReporte (Request $request) {
        if ( session()->has('usuario') ) {
            try {

                DB::beginTransaction();
                    TblReportes::where('PKTblReportes', $request['PKTblReportes'])
                            ->update([
                                'descripcionProblema' => $request['descripcionProblema'],
                                'observaciones'       => $request['observaciones']
                            ]);
                            
                    TblDetalleReporte::where('PKTblDetalleReporte', DB::raw('(SELECT FKTblDetalleReporte FROM tblreportes WHERE PKTblReportes = '.$request["PKTblReportes"].')'))
                                    ->update([
                                        'diagnostico'               => $request['diagnostico'],
                                        'solucion'                  => $request['solucion'],
                                        'FKTblEmpleadosActualizo'   => session('usuario')[0]->{'PKTblEmpleados'},
                                        'fechaActualizacion'        => Carbon::now()
                                    ]);
                DB::commit();

                //return redirect('/reportes/Pendiente');
                return back();
            } catch (\Throwable $th) {
                Log::info($th);
                return back()->withErrors(['mensajeError' => 'Algo no salió bien.']);
            }
        } else {
            return redirect('/');
        }
    }

    public function obtenerDetalleReporte ( $id ) {
        if ( session()->has('usuario') ) {
            return DB::select('SELECT * FROM generalreportes WHERE folio = '.$id);
        } else {
            return redirect('/');
        }
    }

    public function obtenerDetalleReporteAPI ( $id ) {
        return DB::select('SELECT * FROM generalreportes WHERE folio = '.$id);
    }

    public function obtenerDetalleCliente ( $id ) {
        if ( session()->has('usuario') ) {
            return DB::select('SELECT * FROM generalclientes WHERE pktblclientes = '.$id);
        } else {
            return redirect('/');
        }
    }

    public function atendiendoReporte ( $id ) {
        if ( session()->has('usuario') ) {
            try {
                DB::beginTransaction();
                    $temp = TblReportes::where('PKTblReportes', $id)
                        ->first();

                    TblDetalleReporte::where('PKTblDetalleReporte', $temp->{'FKTblDetalleReporte'})
                                    ->update([
                                        'FKTblEmpleadosAtediendo'   => session('usuario')[0]->{'PKTblEmpleados'},
                                        'fechaAtendiendo'           => Carbon::now()
                                    ]);
                DB::commit();

                return back();
            } catch (\Throwable $th) {
                Log::info($th);
                return back()->withErrors(['mensajeError' => 'Algo no salió bien.']);
            }
        } else {
            return redirect('/');
        }
    }

    public function desatendiendoReporte ( $id ) {
        if ( session()->has('usuario') ) {
            try {
                DB::beginTransaction();
                    $temp = TblReportes::where('PKTblReportes', $id)
                        ->first();

                    TblDetalleReporte::where('PKTblDetalleReporte', $temp->{'FKTblDetalleReporte'})
                                    ->update([
                                        'FKTblEmpleadosAtediendo'   => null,
                                        'fechaAtendiendo'           => null
                                    ]);
                DB::commit();

                return back();
            } catch (\Throwable $th) {
                Log::info($th);
                return back()->withErrors(['mensajeError' => 'Algo no salió bien.']);
            }
        } else {
            return redirect('/');
        }
    }

    public function atenderReporte ( $id ) {
        if ( session()->has('usuario') ) {
            try {

                DB::beginTransaction();
                    TblReportes::where('PKTblReportes', $id)
                            ->update([
                                    'FKCatStatus' => 2
                                ]);

                    TblDetalleReporte::where('PKTblDetalleReporte', DB::raw('(SELECT FKTblDetalleReporte FROM tblreportes WHERE PKTblReportes = '.$id.')'))
                                    ->update([
                                            'FKTblEmpleadosAtencion'    => session('usuario')[0]->{'PKTblEmpleados'},
                                            'fechaAtencion'             => Carbon::now()
                                        ]);
                DB::commit();

                return redirect('/reportes/Atendido');
            } catch (\Throwable $th) {
                Log::info($th);
                return back()->withErrors(['mensajeError' => 'Algo no salió bien.']);
            }
        } else {
            return redirect('/');
        }
    }

    public function retomarReporte ($id) {
        if ( session()->has('usuario') ) {
            try {

                DB::beginTransaction();
                    TblReportes::where('PKTblReportes', $id)
                            ->update([
                                    'FKCatStatus' => 1
                                ]);

                    TblDetalleReporte::where('PKTblDetalleReporte', DB::raw('(SELECT FKTblDetalleReporte FROM tblreportes WHERE PKTblReportes = '.$id.')'))
                                    ->update([
                                            'FKTblEmpleadosAtencion' => null,
                                            'fechaAtencion'         => null
                                        ]);
                DB::commit();

                return redirect('/reportes/Pendiente');
            } catch (\Throwable $th) {
                Log::info($th);
                return back()->withErrors(['mensajeError' => 'Algo no salió bien.']);
            }
        } else {
            return redirect('/');
        }
    }

    public function reporteExcel ( $status ) {
        if ( session()->has('usuario') ) {
            return (new ReportesExport( $status ))->download('Reportes '.$status.'s ('.Carbon::now()->format('d-m-Y').').xlsx');
        } else {
            return redirect('/');
        }
    }

}