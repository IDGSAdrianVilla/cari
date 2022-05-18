<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblDetalleReporte extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'tbldetallereporte';
    protected $primarykey ='PKTblDetalleReporte';
    protected $fillable = [
        'PKTblDetalleReporte',
        'diagnostico',
        'solucion',
        'FKTblEmpleadosActualizo',
        'fechaActualizacion',
        'FKTblEmpleadosAtencion',
        'fechaAtencion',
        'FKTblEmpleadosAtendiendo',
        'fechaAtendiendo'
    ];

     public function reportes(){
        return $this->belongsTo(TblDetalleReporte::class);
    }

    public $sequence = null;
}