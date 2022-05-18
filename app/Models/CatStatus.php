<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatStatus extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'catstatus';
    protected $primarykey ='PKCatStatus';
    protected $fillable = [
        'PKCatStatus',
        'nombreStatus',
        'descripcionStatus',
        'fechaAlta'
    ];

    public function reporte(){
        return $this->hasOne(TblReportes::class);
    }
    public $sequence = null;

    
}
