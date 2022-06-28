<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\TblEmpleados;

class UserController extends Controller
{
    public function login_react (Request $request) {
        $return = TblEmpleados::where([
                                        ["correo", $request['correo']],
                                        ["contrasenia", $request['contrasenia']],
                                        ["FKCatRoles", 1],
                                        ["Activo", 1]
                                     ])
                              ->get();

        if ( count($return) > 0 ) {
            return response()->json([
                'message' => "Bienvenido a CARI"
            ], 200);
        } else {
            return response()->json([
                'message' => "Al parecer no tienes permitido acceder"
            ], 401);
        }
    }

    public function login (Request $request) {
        $return = TblEmpleados::where([
                                        ["correo", $request['correo']],
                                        ["contrasenia", $request['contrasenia']],
                                        ["Activo", 1]
                                     ])
                              ->get();

        session()->flush();
        session(['usuario' => $return]);

        return count($return) > 0 ? redirect('inicio') : back()->withErrors(['mensajeError' => 'Por favor verifique sus credenciales']);
    }

    public function actualizarEmpleado ( Request $request ) {
        if ( session()->has('usuario') ) {
            try {
                if ( $this->validarCorreo($request['correo'], $request['PKTblEmpleados']) ) {
                    $temporal = TblEmpleados::where('PKTblEmpleados', $request['PKTblEmpleados'])
                                            ->get();
        
                    if ( !is_string($request['contrasenia']) && !empty($request['FKCatRoles']) ) {
                        $data = [
                            'nombreEmpleado'    => $request['nombreEmpleado'],
                            'apellidoPaterno'   => $request['apellidoPaterno'],
                            'apellidoMaterno'   => $request['apellidoMaterno'],
                            'FKCatRoles'        => $request['FKCatRoles'],
                            'correo'            => $request['correo']
                        ];
                    } else {
                        $data = [
                            'nombreEmpleado'    => $request['nombreEmpleado'],
                            'apellidoPaterno'   => $request['apellidoPaterno'],
                            'apellidoMaterno'   => $request['apellidoMaterno'],
                            'correo'            => $request['correo'],
                            'FKCatRoles'        => $request['FKCatRoles'],
                            'contrasenia'       => $request['contrasenia']
                        ];
                    }
        
                    TblEmpleados::where("PKTblEmpleados", $request['PKTblEmpleados'])
                                ->update($data);
        
                    return back();
                } else {
                    return back()->withErrors(['mensajeError' => 'Otra cuenta ya esta asociada a este correo.']);
                }

            } catch (\Throwable $th) {
                Log::info($th);
                return back()->withErrors(['mensajeError' => 'Error al actualizar']);
            }
        } else {
            return redirect('/');
        }
    }

    public function actualizarSesion ( Request $request ) {
        if ( session()->has('usuario') ) {
            try {
                if ( $this->validarCorreo($request['correo'], $request['PKTblEmpleados']) ) {
                    if ( !is_string($request['contrasenia']) ) {
                        $data = [
                            'nombreEmpleado'    => $request['nombreEmpleado'],
                            'apellidoPaterno'   => $request['apellidoPaterno'],
                            'apellidoMaterno'   => $request['apellidoMaterno'],
                            'correo'            => $request['correo']
                        ];
                    } else {
                        $data = [
                            'nombreEmpleado'    => $request['nombreEmpleado'],
                            'apellidoPaterno'   => $request['apellidoPaterno'],
                            'apellidoMaterno'   => $request['apellidoMaterno'],
                            'correo'            => $request['correo'],
                            'contrasenia'       => $request['contrasenia']
                        ];
                    }
            
                    TblEmpleados::where("PKTblEmpleados", session('usuario')[0]->{'PKTblEmpleados'})
                                ->update($data);
            
                    return $this->logout();
                } else {
                    return back()->withErrors(['mensajeError' => 'Otra cuenta ya esta asociada a este correo.']);
                }
            } catch (\Throwable $th) {
                Log::info($th);
                return back()->withErrors(['mensajeError' => 'Error al actualizar']);
            }
        } else {
            return redirect('/');
        }
    }

    public function validarCorreo( $correo, $pk ) {
        $return = TblEmpleados::where([
                                        ['correo', $correo],
                                        ['PKTblEmpleados', '!=', $pk]
                                     ])
                              ->get();
        return count($return) > 0 ? false : true;
    }

    public function validarSoloCorreo( $correo ) {
        $return = TblEmpleados::where('correo', $correo)->get();
        return count($return) > 0 ? false : true;
    }

    public function registrarUsuario ( Request $request ) {
        if ( session()->has('usuario') ) {
            if ( $this->validarSoloCorreo($request['correo']) ) {
                try {
                    DB::beginTransaction();
                        $usuario                    = new TblEmpleados;
                        $usuario->FKCatRoles        = $request['FKCatRoles'];
                        $usuario->nombreEmpleado    = $request['nombreEmpleado'];
                        $usuario->apellidoPaterno   = $request['apellidoPaterno'];
                        $usuario->apellidoMaterno   = $request['apellidoMaterno'];
                        $usuario->correo            = $request['correo'];
                        $usuario->contrasenia       = $request['contrasenia'];
                        $usuario->fechaAlta         = Carbon::now();
                        $usuario->Activo            = 1;
                        $var = $usuario->save();
                    DB::commit();

                    return back();
                } catch (\Throwable $th) {
                    Log::info($th);
                    return back();
                }
            } else {
                return back()->withErrors(['mensajeError' => 'Otra cuenta ya esta asociada a este correo.']);
            }
        } else {
            return redirect('/');
        }
    }

    public function register_user ( Request $request ) {
        if ( $this->validarSoloCorreo($request['correo']) ) {
            try {
                DB::beginTransaction();
                    $usuario                    = new TblEmpleados;
                    $usuario->FKCatRoles        = $request['FKCatRoles'];
                    $usuario->nombreEmpleado    = $request['nombreEmpleado'];
                    $usuario->apellidoPaterno   = $request['apellidoPaterno'];
                    $usuario->apellidoMaterno   = $request['apellidoMaterno'];
                    $usuario->correo            = $request['correo'];
                    $usuario->contrasenia       = $request['contrasenia'];
                    $usuario->fechaAlta         = Carbon::now();
                    $usuario->Activo            = 1;
                    $var = $usuario->save();
                DB::commit();

                return response()->json([
                    'message' => "Se registro con éxito el nuevo usuario"
                ], 200);
            } catch (\Throwable $th) {
                Log::info($th);
                return response()->json([
                    'error'   => $th,
                    'message' => "Error al registrar nuevo usuario"
                ], 401);
            }
        } else {
            return response()->json([
                'message' => "Otra cuenta ya esta asociada a este correo"
            ], 401);
        }
    }

    public function inactivarUsuario ( $id ) {
        if ( session()->has('usuario') ) {
            try {
                TblEmpleados::where('PKTblEmpleados', $id)
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

    public function activarUsuario ( $id ) {
        if ( session()->has('usuario') ) {
            try {
                TblEmpleados::where('PKTblEmpleados', $id)
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

    public function detalleUsuario ( $PKTblEmpleados ) {
        if ( session()->has('usuario') ) {
            return TblEmpleados::select(
                                    'tblempleados.PKTblEmpleados',
                                    'tblempleados.nombreEmpleado',
                                    'tblempleados.apellidoPaterno',
                                    'tblempleados.apellidoMaterno',
                                    'tblempleados.fechaAlta',
                                    'tblempleados.correo',
                                    'tblempleados.Activo',
                                    'tblempleados.contrasenia',
                                    'tblempleados.FKCatRoles',
                                    'catroles.nombreRol'
                                )
                                ->join('catroles','PKCatRoles','FKCatRoles')
                                ->where( 'PKTblEmpleados', $PKTblEmpleados )
                                ->get();
        } else {
            return redirect('/');
        }
    }

    public function logout () {
        session()->flush();
        return redirect('/');
    }

}