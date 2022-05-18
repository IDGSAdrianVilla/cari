<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblClientes extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'tblclientes';
    protected $primarykey ='PKTblClientes';
    protected $fillable = [
        'PKTblClientes',
        'FKTblDirecciones',
        'nombreCliente',
        'apellidoPaterno',
        'apellidoMaterno',
        'telefono',
        'fechaAlta',
        'Activo'
    ];

    //relacion uno a uno
    public function direcciones(){
        return $this->hasOne(TblClientes::class);
    }

    public $sequence = null;
}