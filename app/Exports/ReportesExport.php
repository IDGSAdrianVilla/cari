<?php

namespace App\Exports;

use App\Models\TblReportes;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TblReportes::select(
                                    'nombreCliente',
                                    'apellidoPaterno',
                                    'apellidoMaterno',
                                    'telefono',
                                    'catproblemas.nombreProblema',
                                    'tblreportes.descripcionProblema',
                                    'catpoblaciones.nombrePoblacion',
                                    'tblreportes.fechaAlta'
                                )
                          ->join('catproblemas','catproblemas.PKCatProblemas','tblreportes.FKCatProblemas')
                          ->join('tblclientes','tblclientes.PKTblClientes','tblreportes.FKTblClientes')
                          ->join('tbldirecciones','tbldirecciones.PKTblDirecciones','tblclientes.FKTblDirecciones')
                          ->join('catpoblaciones','catpoblaciones.PKcatpoblaciones','tbldirecciones.FKcatpoblaciones')
                          ->where('FKCatStatus','1')
                          ->get();
    }
}
