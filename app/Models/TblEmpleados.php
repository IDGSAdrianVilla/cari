<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblEmpleados extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'tblempleados';
    protected $primarykey ='PKTblEmpleados';
    protected $fillable = [
        'PKTblEmpleados',
        'FKCatRoles',
        'nombreEmpleado',
        'apellidoPaterno',
        'apellidoMaterno', 
        'fechaAlta',
        'usuario',
        'contrasenia',
        'fechaAlta',
        'Activo'
    ];
    
    public function reportes(){
        return $this->hasOne(TblDetalleReporte::class);
    }

    public function rol(){
        return $this->hasOne(CatRoles::class);
    }

    public $sequence = null;
}