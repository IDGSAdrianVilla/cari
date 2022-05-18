<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\CatPoblaciones;

class PoblacionesController extends Controller
{

    public function registrarPoblacion (Request $request) {

        try {

            $verificarExistencia = CatPoblaciones::where('nombrePoblacion',$request['nombrePoblacion'])
                                                 ->orWhere('nombrePoblacion','like','%'.$request['nombrePoblacion'])
                                                 ->orWhere('nombrePoblacion','like','%'.$request['nombrePoblacion'].'%')
                                                 ->orWhere('nombrePoblacion','like',$request['nombrePoblacion'].'%')
                                                 ->first();

                                                 Log::alert($verificarExistencia);

            if( !is_numeric($verificarExistencia) || count($verificarExistencia) == 0 ){
                DB::beginTransaction();
                    $poblacion                  = new CatPoblaciones;
                    $poblacion->nombrePoblacion = $request['nombrePoblacion'];
                    $poblacion->codigoPostal    = $request['codigoPostal'];
                    $poblacion->fechaAlta       = Carbon::now();
                    $poblacion->Activo          = 1;
                    $poblacion->save();
                DB::commit();
            }

            return !is_numeric($verificarExistencia) || count($verificarExistencia) == 0 ? redirect('obtenerInsumosPoblaciones') : back();

        } catch (\Throwable $th) {
            Log::info($th);
            return back();
        }

    }

    public function inactivarPoblacion ( $id ) {
        try {
            CatPoblaciones::where('PKCatPoblaciones', $id)
                        ->update(['Activo' => 0]);

            return back();
        } catch (\Throwable $th) {
            Log::info($th);
            return back();
        }
        
    }

    public function activarPoblacion ( $id ) {
        try {
            CatPoblaciones::where('PKCatPoblaciones', $id)
                        ->update(['Activo' => 1]);

            return back();
        } catch (\Throwable $th) {
            Log::info($th);
            return back();
        }
    }

    public function detallePoblacion ( $PKCatPoblaciones ) {
        return CatPoblaciones::where( 'PKCatPoblaciones', $PKCatPoblaciones )->get();
    }

    public function actualizarPoblacion ( Request $request ) {

        try {
            CatPoblaciones::where('PKCatPoblaciones',  $request['PKCatPoblaciones'])
                            ->update([
                                'nombrePoblacion'   => $request['nombrePoblacion'],
                                'codigoPostal'      => $request['codigoPostal']
                            ]);

            return back();
        } catch (\Throwable $th) {
            Log::info($th);
            return back();
        }
    }

}