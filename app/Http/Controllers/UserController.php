<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\TblEmpleados;

class UserController extends Controller
{

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
        try {
            if ( $this->validarCorreo($request['correo']) ) {
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
    
                return $request['FKCatRoles'] != $temporal[0]['FKCatRoles'] ? $this->logout() : back();
            } else {
                return back()->withErrors(['mensajeError' => 'Otra cuenta ya esta asociada a este correo.']);
            }

        } catch (\Throwable $th) {
            Log::info($th);
            return back()->withErrors(['mensajeError' => 'Error al actualizar']);
        }
    }

    public function actualizarSesion ( Request $request ) {
        try {
            if ( $this->validarCorreo($request['correo']) ) {
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
    }

    public function validarCorreo( $correo ) {
        $return = TblEmpleados::where('correo', $correo)->get();
        return count($return) > 0 ? false : true;
    }

    public function registrarUsuario ( Request $request ) {
        try {

            $verificarExistencia = TblEmpleados::where([
                                        ['usuario',$request['usuario']],
                                        ['contrasenia',$request['contrasenia']]
                                    ])->first();

            if( !is_numeric($verificarExistencia) || count($verificarExistencia) == 0 ){
                DB::beginTransaction();
                    $usuario                    = new TblEmpleados;
                    $usuario->FKCatRoles        = $request['FKCatRoles'];
                    $usuario->nombreEmpleado    = $request['nombreEmpleado'];
                    $usuario->apellidoPaterno   = $request['apellidoPaterno'];
                    $usuario->apellidoMaterno   = $request['apellidoMaterno'];
                    $usuario->fechaAlta         = $request['fechaAlta'];
                    $usuario->usuario           = $request['usuario'];
                    $usuario->contrasenia       = $request['contrasenia'];
                    $usuario->fechaAlta         = Carbon::now();
                    $usuario->Activo            = 1;
                    $var = $usuario->save();
                DB::commit();
            }

            return back();
        } catch (\Throwable $th) {
            Log::info($th);
            return back();
        }
    }

    public function inactivarUsuario ( $id ) {
        try {
            TblEmpleados::where('PKTblEmpleados', $id)
                        ->update(['Activo' => 0]);

            return back();
        } catch (\Throwable $th) {
            Log::info($th);
            return back();
        }
        
    }

    public function activarUsuario ( $id ) {
        try {
            TblEmpleados::where('PKTblEmpleados', $id)
                        ->update(['Activo' => 1]);

            return back();
        } catch (\Throwable $th) {
            Log::info($th);
            return back();
        }
    }

    public function detalleUsuario ( $PKTblEmpleados ) {
        return TblEmpleados::select(
                                'tblempleados.PKTblEmpleados',
                                'tblempleados.nombreEmpleado',
                                'tblempleados.apellidoPaterno',
                                'tblempleados.apellidoMaterno',
                                'tblempleados.fechaAlta',
                                'tblempleados.correo',
                                'tblempleados.usuario',
                                'tblempleados.Activo',
                                'tblempleados.contrasenia',
                                'tblempleados.FKCatRoles',
                                'catroles.nombreRol'
                            )
                           ->join('catroles','PKCatRoles','FKCatRoles')
                           ->where( 'PKTblEmpleados', $PKTblEmpleados )
                           ->get();
    }

    public function logout () {
        session()->flush();
        return redirect('/');
    }

}