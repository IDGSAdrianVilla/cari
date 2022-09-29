<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\TblReportes;
use App\Models\TblEmpleados;
use App\Models\TblClientes;
use App\Models\CatPoblaciones;
use App\Models\CatProblemas;
use App\Models\CatRoles;

class PageController extends Controller
{
    public function obtenerTblReportes () {
        return DB::select('SELECT
                                  folio,
                                  nombreCliente,
                                  apellidoPaterno,
                                  apellidoMaterno,
                                  nombrePoblacion,
                                  nombreProblema,
                                  fechaAlta
                           FROM generalreportes
                           WHERE status = "Pendiente"
                           ORDER BY folio DESC
                           LIMIT 5');
    }

    public function obtenerTblReportesApi ( $status ) {
        return DB::select('SELECT * FROM generalreportes WHERE status = "'.$status.'"');
    }

    public function obtenerTblEmpleados () {
        return TblEmpleados::select(
            'tblempleados.PKTblEmpleados',
            'tblempleados.nombreEmpleado',
            'tblempleados.apellidoPaterno',
            'tblempleados.apellidoMaterno',
            'tblempleados.fechaAlta',
            'tblempleados.correo',
            'tblempleados.Activo',
            'catroles.nombreRol'
        )
        ->join('catroles','PKCatRoles','FKCatRoles')
        ->orderBy('PKTblEmpleados','DESC')
        ->get();
    }

    public function obtenerInsumosPC ( $categoria ) {
        switch ( $categoria ) {
            case 'poblaciones':
                $retorno = CatPoblaciones::orderBy('PKCatPoblaciones', 'DESC')->get();
            break;
            case 'problemas':
                $retorno = CatProblemas::orderBy('PKCatProblemas', 'DESC')->get();
            break;
            case 'roles':
                $retorno = CatRoles::orderBy('PKCatRoles', 'DESC')->get();
            break;
            case 'clientes':
                $retorno = TblClientes::orderBy('PKTblClientes', 'DESC')->get();
            break;
            case 'empleados':
                $retorno = TblEmpleados::orderBy('PKTblEmpleados', 'DESC')->get();
            break;
        }

        return $retorno;
    }

    public function obtenerTblCatPoblaciones () {
        return CatPoblaciones::where('Activo', 1)->get();
    }

    public function obtenerTblCatProblemas () {
        return CatProblemas::where('Activo', 1)->get();
    }

    public function obtenerTblCatRoles () {
        return CatRoles::where('Activo', 1)->get();
    }

    public function obtenerTblClientes () {
        return TblClientes::where('Activo', 1)->get();
    }

    public function obtenerRegistroReportesUsuarios() {
        $resultado = DB::select("select
                                    count(*) as registros,
                                    concat(tblempleados.nombreEmpleado, ' ', tblempleados.apellidoPaterno) as nombre
                                from tblreportes
                                inner join tblempleados on tblempleados.PKTblEmpleados = tblreportes.FKTblEmpleadosRecibio
                                group by nombre");

        $cantidadRegistros = [];
        $nombresRegistros = [];

        foreach ($resultado as $item) {
            array_push($cantidadRegistros, $item->registros);
            array_push($nombresRegistros, $item->nombre);
        }

        return [
            'cantidadRegistros' => $cantidadRegistros,
            'nombresRegistros'  => $nombresRegistros
        ];
    }

    public function obtenerAtencionReportesUsuarios() {
        $resultado = DB::select("select
                                    count(*) as registros,
                                    concat(tblempleados.nombreEmpleado, ' ', tblempleados.apellidoPaterno) as nombre
                                from tblreportes
                                inner join tbldetallereporte on tbldetallereporte.PKTblDetalleReporte = tblreportes.FKTblDetalleReporte
                                inner join tblempleados on tblempleados.PKTblEmpleados = tbldetallereporte.FKTblEmpleadosAtencion
                                group by nombre");

        $cantidadRegistros = [];
        $nombresRegistros = [];

        foreach ($resultado as $item) {
            array_push($cantidadRegistros, $item->registros);
            array_push($nombresRegistros, $item->nombre);
        }

        return [
            'cantidadRegistros' => $cantidadRegistros,
            'nombresRegistros'  => $nombresRegistros
        ];
    }

    public function obtenerInsumos () {
        if ( session()->has('usuario') ) {
            $reportes           = $this->obtenerTblReportes();
            $poblaciones        = $this->obtenerTblCatPoblaciones();
            $problemas          = $this->obtenerTblCatProblemas();
            $roles              = $this->obtenerTblCatRoles();
            $clientes           = $this->obtenerTblClientes();
            $graficaRegistro    = $this->obtenerRegistroReportesUsuarios();
            $graficaAtencion    = $this->obtenerAtencionReportesUsuarios();

            return view('inicio')
                ->with('reportes', $reportes)
                ->with('poblaciones', $poblaciones)
                ->with('problemas', $problemas)
                ->with('roles', $roles)
                ->with('clientes', $clientes)
                ->with('cantidadRegistrosRegistro', $graficaRegistro['cantidadRegistros'])
                ->with('nombresRegistrosRegistro', $graficaRegistro['nombresRegistros'])
                ->with('cantidadRegistrosAtencion', $graficaAtencion['cantidadRegistros'])
                ->with('nombresRegistrosAtencion', $graficaAtencion['nombresRegistros']);
        } else {
            return redirect('/');
        }
    }

    public function obtenerInsumosAPI () {
        return [
            "reportes"           => $this->obtenerTblReportes(),
            "poblaciones"        => $this->obtenerTblCatPoblaciones(),
            "problemas"          => $this->obtenerTblCatProblemas(),
            "roles"              => $this->obtenerTblCatRoles(),
            "clientes"           => $this->obtenerTblClientes(),
            "graficaRegistro"    => $this->obtenerRegistroReportesUsuarios(),
            "graficaAtencion"    => $this->obtenerAtencionReportesUsuarios()
        ];
    }

    public function obtenerInsumosReportes ( $status ) {
        if ( session()->has('usuario') ) {
            $reportes = DB::select('SELECT * FROM generalreportes WHERE status = "'.$status.'"');
            $detalleReporte = DB::select('SELECT * FROM generalreportes WHERE status = "'.$status.'" LIMIT 1');

            $poblaciones    = $this->obtenerTblCatPoblaciones();
            $problemas      = $this->obtenerTblCatProblemas();
            $roles          = $this->obtenerTblCatRoles();
            $clientes       = $this->obtenerTblClientes();

            return view('reportes')
                 ->with('status', $status)
                 ->with('reportes', $reportes)
                 ->with('poblaciones', $poblaciones)
                 ->with('problemas', $problemas)
                 ->with('detalleReporte', $detalleReporte)
                 ->with('roles', $roles)
                 ->with('clientes', $clientes);
        } else {
            return redirect('/');
        }
    }

    public function obtenerInsumosRoles () {
        if ( session()->has('usuario') ) {
            if ( session('usuario')[0]->{'FKCatRoles'} == 1 ) {
                $troles         = CatRoles::orderBy('PKCatRoles', 'DESC')->get();
                $poblaciones    = $this->obtenerTblCatPoblaciones();
                $problemas      = $this->obtenerTblCatProblemas();
                $roles          = $this->obtenerTblCatRoles();
                $clientes       = $this->obtenerTblClientes();

                $cont = 0;
                foreach ($troles as $item) {
                    $troles[$cont]['fechaAlta'] = Carbon::parse($troles[$cont]['fechaAlta'])->format('d-m-Y');
                    $cont += 1;
                }

                return view('insumos')
                    ->with('busqueda','Roles')
                    ->with('troles', $troles)
                    ->with('poblaciones', $poblaciones)
                    ->with('problemas', $problemas)
                    ->with('roles', $roles)
                    ->with('clientes', $clientes);
            } else {
                return back()->withErrors(['mensajeError' => 'Al parecer no tienes permitido esto.']);
            }
        } else {
            return redirect('/');
        }
    }

    public function obtenerInsumosProblemas () {
        if ( session()->has('usuario') ) {
            if ( session('usuario')[0]->{'FKCatRoles'} == 1 ) {
                $tProblemas = CatProblemas::orderBy('PKCatProblemas', 'DESC')->get();

                $poblaciones    = $this->obtenerTblCatPoblaciones();
                $problemas      = $this->obtenerTblCatProblemas();
                $roles          = $this->obtenerTblCatRoles();
                $clientes       = $this->obtenerTblClientes();

                $cont = 0;
                foreach ($tProblemas as $item) {
                    $tProblemas[$cont]['fechaAlta'] = Carbon::parse($tProblemas[$cont]['fechaAlta'])->format('d-m-Y');
                    $cont += 1;
                }

                return view('insumos')
                    ->with('busqueda','Problemas')
                    ->with('poblaciones', $poblaciones)
                    ->with('problemas', $problemas)
                    ->with('tProblemas', $tProblemas)
                    ->with('roles', $roles)
                    ->with('clientes', $clientes);
            } else {
                return back()->withErrors(['mensajeError' => 'Al parecer no tienes permitido esto.']);
            }
        } else {
            return redirect('/');
        }
    }

    public function obtenerInsumosPoblaciones () {
        if ( session()->has('usuario') ) {
            if ( session('usuario')[0]->{'FKCatRoles'} == 1 ) {
                $tPoblaciones   = CatPoblaciones::orderBy('PKCatPoblaciones', 'DESC')->get();
                $poblaciones    = $this->obtenerTblCatPoblaciones();
                $problemas      = $this->obtenerTblCatProblemas();
                $roles          = $this->obtenerTblCatRoles();
                $clientes       = $this->obtenerTblClientes();
        
                $cont = 0;
                foreach ($tPoblaciones as $item) {
                    $tPoblaciones[$cont]['fechaAlta'] = Carbon::parse($tPoblaciones[$cont]['fechaAlta'])->format('d-m-Y');
                    $cont += 1;
                }
        
                return view('insumos')
                    ->with('busqueda','Poblaciones')
                    ->with('poblaciones', $poblaciones)
                    ->with('problemas', $problemas)
                    ->with('tPoblaciones', $tPoblaciones)
                    ->with('roles', $roles)
                    ->with('clientes', $clientes);
            } else {
                return back()->withErrors(['mensajeError' => 'Al parecer no tienes permitido esto.']);
            }
        } else {
            return redirect('/');
        }
    }

    public function obtenerUsuarios () {
        if ( session()->has('usuario') ) {
            if ( session('usuario')[0]->{'FKCatRoles'} == 1 ) {
                $poblaciones    = $this->obtenerTblCatPoblaciones();
                $problemas      = $this->obtenerTblCatProblemas();
                $roles          = $this->obtenerTblCatRoles();
                $clientes       = $this->obtenerTblClientes();

                $usuarios = TblEmpleados::select(
                                        'tblempleados.PKTblEmpleados',
                                        'tblempleados.nombreEmpleado',
                                        'tblempleados.apellidoPaterno',
                                        'tblempleados.apellidoMaterno',
                                        'tblempleados.fechaAlta',
                                        'tblempleados.correo',
                                        'tblempleados.Activo',
                                        'catroles.nombreRol'
                                    )
                                    ->join('catroles','PKCatRoles','FKCatRoles')
                                    ->orderBy('PKTblEmpleados','DESC')
                                    ->get();

                $cont = 0;
                foreach ($usuarios as $item) {
                    $usuarios[$cont]['fechaAlta'] = Carbon::parse($usuarios[$cont]['fechaAlta'])->format('d-m-Y');
                    $cont += 1;
                }
                return view('usuarios')
                    ->with('usuarios', $usuarios)
                    ->with('poblaciones', $poblaciones)
                    ->with('problemas', $problemas)
                    ->with('roles', $roles)
                    ->with('clientes', $clientes);
            } else {
                return back()->withErrors(['mensajeError' => 'Al parecer no tienes permitido esto.']);
            }
        } else {
            return redirect('/');
        }
    }

    public function obtenerClientes () {
        if ( session()->has('usuario') ) {
            if ( session('usuario')[0]->{'FKCatRoles'} == 3 || session('usuario')[0]->{'FKCatRoles'} == 1 ) {
                $poblaciones    = $this->obtenerTblCatPoblaciones();
                $problemas      = $this->obtenerTblCatProblemas();
                $roles          = $this->obtenerTblCatRoles();
                $clientes       = $this->obtenerTblClientes();
        
                $tclientes = TblClientes::select(
                                            'tblclientes.PKTblClientes',
                                            'tblclientes.nombreCliente',
                                            'tblclientes.apellidoPaterno',
                                            'tblclientes.apellidoMaterno',
                                            'tblclientes.telefono',
                                            'tblclientes.telefonoOpcional',
                                            'tblclientes.fechaAlta',
                                            'tblclientes.Activo',
                                            'tbldirecciones.coordenadas',
                                            'tbldirecciones.referencias',
                                            'tbldirecciones.direccion',
                                            'catpoblaciones.nombrePoblacion'
                                        )
                                    ->join('tbldirecciones', 'tbldirecciones.PKTblDirecciones', 'tblclientes.FKTblDirecciones')
                                    ->join('catpoblaciones', 'catpoblaciones.PKCatPoblaciones', 'tbldirecciones.FKCatPoblaciones')
                                    ->orderBy('tblclientes.PKTblClientes', 'DESC')
                                    ->get();
        
                $cont = 0;
                foreach ($tclientes as $item) {
                    $tclientes[$cont]['fechaAlta'] = Carbon::parse($tclientes[$cont]['fechaAlta'])->format('d-m-Y');
                    $cont += 1;
                }
        
                return view('clientes')
                    ->with('tclientes', $tclientes)
                    ->with('poblaciones', $poblaciones)
                    ->with('problemas', $problemas)
                    ->with('roles', $roles)
                    ->with('clientes', $clientes);
            } else {
                return back()->withErrors(['mensajeError' => 'Al parecer no tienes permitido esto.']);
            }
        } else {
            return redirect('/');
        }
    }

    public function obtenerConcentradoReportes (){
        if ( session()->has('usuario') ) {
            $reportes           = $this->obtenerTblReportes();
            $poblaciones        = $this->obtenerTblCatPoblaciones();
            $problemas          = $this->obtenerTblCatProblemas();
            $roles              = $this->obtenerTblCatRoles();
            $clientes           = $this->obtenerTblClientes();

            return view('concentradosReportes')
                ->with('reportes', $reportes)
                ->with('poblaciones', $poblaciones)
                ->with('problemas', $problemas)
                ->with('roles', $roles)
                ->with('clientes', $clientes);
        } else {
            return redirect('/');
        }

    }
}