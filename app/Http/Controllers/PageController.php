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
    private function obtenerTblReportes () {
        return DB::select('SELECT
                                  folio,
                                  nombreCliente,
                                  apellidoPaterno,
                                  apellidoMaterno,
                                  nombrePoblacion,
                                  nombreProblema,
                                  fechaAlta
                           FROM generalReportes
                           WHERE status = "Pendiente"
                           ORDER BY folio ASC
                           LIMIT 5');
    }

    private function obtenerTblCatPoblaciones () {
        return CatPoblaciones::where('Activo', 1)->get();
    }

    private function obtenerTblCatProblemas () {
        return CatProblemas::where('Activo', 1)->get();
    }

    private function obtenerTblCatRoles () {
        return CatRoles::where('Activo', 1)->get();
    }

    private function obtenerTblClientes () {
        return TblClientes::where('Activo', 1)->get();
    }

    public function obtenerInsumos () {
        if ( session()->has('usuario') ) {
            $reportes       = $this->obtenerTblReportes();
            $poblaciones    = $this->obtenerTblCatPoblaciones();
            $problemas      = $this->obtenerTblCatProblemas();
            $roles          = $this->obtenerTblCatRoles();
            $clientes       = $this->obtenerTblClientes();

            return view('inicio')
                ->with('reportes', $reportes)
                ->with('poblaciones', $poblaciones)
                ->with('problemas', $problemas)
                ->with('roles', $roles)
                ->with('clientes', $clientes);
        } else {
            return view('login');
        }
    }

    public function obtenerInsumosReportes ( $status ) {
        if ( session()->has('usuario') ) {
            $reportes = DB::select('SELECT * FROM generalReportes WHERE status = "'.$status.'"');
            $detalleReporte = DB::select('SELECT * FROM generalReportes WHERE status = "'.$status.'" LIMIT 1');

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
            return view('login');
        }
    }

    public function obtenerInsumosRoles () {
        $troles         = CatRoles::all();
        $poblaciones    = $this->obtenerTblCatPoblaciones();
        $problemas      = $this->obtenerTblCatProblemas();
        $roles          = $this->obtenerTblCatRoles();
        $clientes       = $this->obtenerTblClientes();

        $cont = 0;
        foreach ($roles as $item) {
            $roles[$cont]['fechaAlta'] = Carbon::parse($roles[$cont]['fechaAlta'])->format('d-m-Y');
            $cont += 1;
        }

        return view('insumos')
             ->with('busqueda','Roles')
             ->with('troles', $troles)
             ->with('poblaciones', $poblaciones)
             ->with('problemas', $problemas)
             ->with('roles', $roles)
             ->with('clientes', $clientes);
    }

    public function obtenerInsumosProblemas () {
        $tProblemas = CatProblemas::all();

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
    }

    public function obtenerInsumosPoblaciones () {
        $tPoblaciones   = CatPoblaciones::all();
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
    }

    public function obtenerUsuarios () {
        $poblaciones    = $this->obtenerTblCatPoblaciones();
        $problemas      = $this->obtenerTblCatProblemas();
        $roles          = $this->obtenerTblCatRoles();
        $clientes       = $this->obtenerTblClientes();

        $usuarios = TblEmpleados::select('PKTblEmpleados','nombreRol', 'nombreEmpleado', 'apellidoPaterno', 'apellidoMaterno', 'tblempleados.fechaAlta', 'usuario', 'tblempleados.Activo')
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
    }

    public function obtenerClientes () {
        $poblaciones    = $this->obtenerTblCatPoblaciones();
        $problemas      = $this->obtenerTblCatProblemas();
        $roles          = $this->obtenerTblCatRoles();
        $clientes       = $this->obtenerTblClientes();

        $clientes = TblClientes::select('tblclientes.PKTblClientes', 'tblclientes.nombreCliente', 'tblclientes.apellidoPaterno', 'tblclientes.apellidoMaterno', 'tblclientes.telefono', 'tblclientes.telefonoOpcional', 'tblclientes.fechaAlta', 'tblclientes.Activo', 'tbldirecciones.coordenadas', 'tbldirecciones.referencias', 'tbldirecciones.direccion', 'catpoblaciones.nombrePoblacion')
                               ->join('tbldirecciones','tbldirecciones.PKTblDirecciones','tblclientes.FKTblDirecciones')
                               ->join('catpoblaciones','catpoblaciones.PKCatPoblaciones','tbldirecciones.FKCatPoblaciones')
                               ->get();

        $cont = 0;
        foreach ($clientes as $item) {
            $clientes[$cont]['fechaAlta'] = Carbon::parse($clientes[$cont]['fechaAlta'])->format('d-m-Y');
            $cont += 1;
        }

        return view('clientes')
             ->with('tclientes', $clientes)
             ->with('poblaciones', $poblaciones)
             ->with('problemas', $problemas)
             ->with('roles', $roles)
             ->with('clientes', $clientes);
    }

}