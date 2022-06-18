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

class ClientesController extends Controller
{

    public function registrarCliente ( Request $request) {
        if ( session()->has('usuario') ) {
            try {
                DB::beginTransaction();
                    $direccion                      = new TblDirecciones;
                    $direccion->FKCatPoblaciones    = $request['PKCatPoblaciones'];
                    $direccion->coordenadas         = $request['coordenadas'];
                    $direccion->referencias         = $request['referencias'];
                    $direccion->direccion           = $request['direccion'];
                    $direccion->save();

                    $cliente                    = new TblClientes;
                    $cliente->FKTblDirecciones  = $direccion->id;
                    $cliente->nombreCliente     = $request['nombreCliente'];
                    $cliente->apellidoPaterno   = $request['apellidoPaterno'];
                    $cliente->apellidoMaterno   = $request['apellidoMaterno'];
                    $cliente->telefono          = $request['telefono'];
                    $cliente->fechaAlta         = Carbon::now();
                    $cliente->save();
                DB::commit();

                return back();

            } catch (\Throwable $th) {
                Log::info($th);
                return back();
            }
        } else {
            return redirect('/');
        }
    }

    public function inactivarCliente ( $id ) {
        if ( session()->has('usuario') ) {
            try {
                TblClientes::where('PKTblClientes', $id)
                        ->update(['Activo' => 0]);

                return back();
            } catch (\Throwable $th) {
                Log::info($th);
                return back();
            }
        } else {
            return redirect('/');
        }
    }

    public function activarCliente ( $id ) {
        if ( session()->has('usuario') ) {
            try {
                TblClientes::where('PKTblClientes', $id)
                        ->update(['Activo' => 1]);

                return back();
            } catch (\Throwable $th) {
                Log::info($th);
                return back();
            }
        } else {
            return redirect('/');
        }
    }

    public function detalleCliente ( $PKTblClientes ) {
        if ( session()->has('usuario') ) {
            return TblClientes::where( 'PKTblClientes', $PKTblClientes )->get();
        } else {
            return redirect('/');
        }
    }

}