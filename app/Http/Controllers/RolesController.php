<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\CatRoles;

class RolesController extends Controller
{

    public function registrarRol (Request $request) {
        if ( session()->has('usuario') ) {
            try {

                $verificarExistencia = CatRoles::where('nombreRol',$request['nombreRol'])
                                                    ->orWhere('nombreRol','like','%'.$request['nombreRol'])
                                                    ->orWhere('nombreRol','like','%'.$request['nombreRol'].'%')
                                                    ->orWhere('nombreRol','like',$request['nombreRol'].'%')
                                                    ->first();

                if ( !is_numeric($verificarExistencia) || count($verificarExistencia) == 0 ) {
                    DB::beginTransaction();
                        $rol                  = new CatRoles;
                        $rol->nombreRol       = $request['nombreRol'];
                        $rol->descripcionRol  = $request['descripcionRol'];
                        $rol->fechaAlta       = Carbon::now();
                        $rol->Activo          = 1;
                        $rol->save();
                    DB::commit();
                }

                return !is_numeric($verificarExistencia) || count($verificarExistencia) == 0 ? redirect('obtenerInsumosRoles') : back();

            } catch (\Throwable $th) {
                Log::info($th);
                return back();
            }
        } else {
            return redirect('/');
        }
    }

    public function inactivarRol ( $id ) {
        if ( session()->has('usuario') ) {
            try {
                CatRoles::where('PKCatRoles', $id)
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

    public function activarRol ( $id ) {
        if ( session()->has('usuario') ) {
            try {
                CatRoles::where('PKCatRoles', $id)
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

    public function detalleRol ( $PKCatRoles ) {
        if ( session()->has('usuario') ) {
            return CatRoles::where( 'PKCatRoles', $PKCatRoles )->get();
        } else {
            return redirect('/');
        }
    }

    public function actualizarRol ( Request $request ) {
        if ( session()->has('usuario') ) {
            try {
                CatRoles::where('PKCatRoles',  $request['PKCatRoles'])
                        ->update([
                            'nombreRol'        => $request['nombreRol'],
                            'descripcionRol'   => $request['descripcionRol']
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