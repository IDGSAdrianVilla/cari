<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatPoblaciones extends Model
{
    use HasFactory;
        public $timestamps=false;
        protected $table = 'catpoblaciones';
        protected $primarykey ='PKCatPoblaciones';
        protected $fillable =[
            'PKCatPoblaciones',
            'nombrePoblacion',
            'codigoPostal',
            'fechaAlta',
            'Activo'
        ];
    //relacion uno a muchos
    public function direcciones(){
        return $this->hasMany(TblDirecciones::class);
    }

    public $sequence = null;
}