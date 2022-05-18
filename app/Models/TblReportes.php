<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblReportes extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'tblreportes';
    protected $primarykey ='PKTblReportes';
    protected $fillable = [
        'PKTblReportes',
        'FKCatProblemas',
        'FKTblEmpleadosRecibio',
        'FKCatStatus',
        'FKTblDetalleReporte',
        'FKTblClientes',
        'descripcionProblema',
        'observaciones',
        'fechaAlta'
    ];

    public function detalles(){
        return $this->hasOne(TblDetalleReporte::class);
    }

    public function empleado(){
        return $this->belongsTo(TblEmpleados::class);
    }

    public function catstatus(){
        return $this->belongsTo(CatStatus::class);
    }

    public function catproblemas(){
        return $this->belongsTo(CatProblemas::class);
    }

    public $sequence = null;
}