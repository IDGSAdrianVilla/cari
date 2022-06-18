<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\CatProblemas;

class ProblemasController extends Controller
{

    public function registrarProblema (Request $request) {
        if ( session()->has('usuario') ) {
            try {

                $verificarExistencia = CatProblemas::where('nombreProblema',$request['nombreProblema'])
                                                    ->orWhere('nombreProblema','like','%'.$request['nombreProblema'])
                                                    ->orWhere('nombreProblema','like','%'.$request['nombreProblema'].'%')
                                                    ->orWhere('nombreProblema','like',$request['nombreProblema'].'%')
                                                    ->first();

                if ( !is_numeric($verificarExistencia) || count($verificarExistencia) == 0 ) {
                    DB::beginTransaction();
                        $problema                      = new CatProblemas;
                        $problema->nombreProblema      = $request['nombreProblema'];
                        $problema->descripcionProblema = $request['descripcionProblema'];
                        $problema->fechaAlta           = Carbon::now();
                        $problema->Activo              = 1;
                        $problema->save();
                    DB::commit();
                }

                return !is_numeric($verificarExistencia) || count($verificarExistencia) == 0 ? redirect('obtenerInsumosProblemas') : back();

            } catch (\Throwable $th) {
                Log::info($th);
                return back();
            }
        } else {
            return redirect('/');
        }
    }

    public function inactivarProblema ( $id ) {
        if ( session()->has('usuario') ) {
            try {
                CatProblemas::where('PKCatProblemas', $id)
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

    public function activarProblema ( $id ) {
        if ( session()->has('usuario') ) {
            try {
                CatProblemas::where('PKCatProblemas', $id)
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

    public function detalleProblema ( $PKCatProblemas ) {
        if ( session()->has('usuario') ) {
            return CatProblemas::where( 'PKCatProblemas', $PKCatProblemas )->get();
        } else {
            return redirect('/');
        }
    }

    public function actualizarProblema ( Request $request ) {
        if ( session()->has('usuario') ) {
            try {
                CatProblemas::where('PKCatProblemas',  $request['PKCatProblemas'])
                            ->update([
                                'nombreProblema'        => $request['nombreProblema'],
                                'descripcionProblema'   => $request['descripcionProblema']
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