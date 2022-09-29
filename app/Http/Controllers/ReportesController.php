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
                            
                    TblDetalleReporte::where('PKTblDetalleReporte', '=', function ( $subselect ) use ( $request ) {
                                        $subselect->from('tblreportes')
                                                ->select('FKTblDetalleReporte')
                                                ->where('PKTblReportes', $request["PKTblReportes"]);
                                    })
                                    ->update([
                                        'diagnostico'               => $request['diagnostico'],
                                        'solucion'                  => $request['solucion'],
                                        'FKTblEmpleadosActualizo'   => session('usuario')[0]->{'PKTblEmpleados'},
                                        'fechaActualizacion'        => Carbon::now()
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

    public function actualizarReporteAPI (Request $request) {
        Log::alert($request);
        try {

            DB::beginTransaction();
                TblReportes::where('PKTblReportes', $request['formFolio'])
                        ->update([
                            'descripcionProblema' => $request['formDescripcionProblema'],
                            'observaciones'       => $request['formObservaciones']
                        ]);
                        
                TblDetalleReporte::where('PKTblDetalleReporte', '=', function ( $subselect ) use ( $request ) {
                                    $subselect->from('tblreportes')
                                              ->select('FKTblDetalleReporte')
                                              ->where('PKTblReportes', $request["formFolio"]);
                                })
                                ->update([
                                    'diagnostico'               => $request['formDiagnostico'],
                                    'solucion'                  => $request['formSolucion'],
                                    'FKTblEmpleadosActualizo'   => $request['formPKTblEmpleados'],
                                    'fechaActualizacion'        => Carbon::now()
                                ]);
            DB::commit();

        } catch (\Throwable $th) {
            Log::info($th);
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

    public function atendiendoReporteAPI ( $id, $empleado ) {
        try {
            DB::beginTransaction();
                $temp = TblReportes::where('PKTblReportes', $id)
                    ->first();

                TblDetalleReporte::where('PKTblDetalleReporte', $temp->{'FKTblDetalleReporte'})
                                ->update([
                                    'FKTblEmpleadosAtediendo'   => $empleado,
                                    'fechaAtendiendo'           => Carbon::now()
                                ]);
            DB::commit();

        } catch (\Throwable $th) {
            Log::info($th);
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

    public function desatendiendoReporteAPI ( $id ) {
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
    }

    public function atenderReporte ( $id ) {
        if ( session()->has('usuario') ) {
            try {

                DB::beginTransaction();
                    TblReportes::where('PKTblReportes', $id)
                            ->update([
                                    'FKCatStatus' => 2
                                ]);

                    TblDetalleReporte::where('PKTblDetalleReporte', '=', function ( $subselect ) use ( $id ) {
                                        $subselect->from('tblreportes')
                                                  ->select('FKTblDetalleReporte')
                                                  ->where('PKTblReportes', $id);
                                    })
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

                    TblDetalleReporte::where('PKTblDetalleReporte', '=', function ( $subselect ) use ( $id ) {
                                        $subselect->from('tblreportes')
                                                ->select('FKTblDetalleReporte')
                                                ->where('PKTblReportes', $id);
                                    })
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

    public function consultarConcentradoReportes ( Request $request ) {
        $request = (array) $request;
        $cont = 0;
        $param = count($request);

        $query = 'SELECT * FROM generalreportes';
        if ( isset($request['clienteReporteExcel']) ) {
            $query = $query . 'WHERE PKTblClientes = '.$request['PKTblClientes'];
            $cont+=1;
        }

        $query = $query . ($cont > 0 ? ($param > 3 ? ' AND ' : '') : ' WHERE ');

        if ( isset($request['poblacionReporteExcel']) ) {
            $query = $query . 'PKCatPoblaciones = '.$request['PKCatPoblaciones'];
            $cont+=1;
        }

        $query = $query . ($cont > 0 ? ($param > 3 || $param > 5 ? ' AND ' : '') : ' WHERE ');

        if ( isset($request['problemaReporteExcel']) ) {
            $query = $query . 'PKCatProblemas = '.$request['PKCatProblemas'];
            $cont+=1;
        }

        $query = $query . ($cont > 0 ? ($param > 3 || $param > 5 || $param > 7 ? ' AND ' : '') : ' WHERE ');

        if ( isset($request['fechaDesde']) ) {
            $query = $query . 'TO_DATE(fechaAlta) => TO_DATE('.$request['fechaDesde'].')';
            $cont+=1;
        }

        $query = $query . ($cont > 0 ? ($param > 3 || $param > 5 || $param > 7 || $param > 9 ? ' AND ' : '') : ' WHERE ');

        if ( isset($request['fechaHasta']) ) {
            $query = $query . 'TO_DATE(fechaAlta) <= TO_DATE('.$request['fechaHasta'].')';
            $cont+=1;
        }

        $query = $query . ($cont > 0 ? ($param > 3 || $param > 5 || $param > 7 || $param > 9 || $param > 11 ? ' AND ' : '') : ' WHERE ');

        if ( isset($request['IDStatus']) ) {
            $query = $query . 'status = '.$request['IDStatus'];
        }

        Log::alert($query);

        return redirect()->back()->with('success', 'your message,here');
    }

}