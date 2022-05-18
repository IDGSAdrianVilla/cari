<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatProblemas extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'catproblemas';
    protected $primarykey ='PKCatProblemas';
    protected $fillable = [
        'PKCatProblemas',
        'nombreProblema',
        'descripcionProblema',
        'fechaAlta',
        'Activo'
    ];
    
    public function reporte(){
        return $this->hasOne(TblReportes::class);
    }

    public $sequence = null;
}