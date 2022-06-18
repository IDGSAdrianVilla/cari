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
        if ( session()->has('usuario') ) {
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
        } else {
            return redirect('/');
        }
    }

    public function inactivarPoblacion ( $id ) {
        if ( session()->has('usuario') ) {
            try {
                CatPoblaciones::where('PKCatPoblaciones', $id)
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

    public function activarPoblacion ( $id ) {
        if ( session()->has('usuario') ) {
            try {
                CatPoblaciones::where('PKCatPoblaciones', $id)
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

    public function detallePoblacion ( $PKCatPoblaciones ) {
        if ( session()->has('usuario') ) {
            return CatPoblaciones::where( 'PKCatPoblaciones', $PKCatPoblaciones )->get();
        } else {
            return redirect('/');
        }
    }

    public function actualizarPoblacion ( Request $request ) {
        if ( session()->has('usuario') ) {
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
        } else {
            return redirect('/');
        }
    }

}