<?php

namespace App\Exports;

use App\Models\TblReportes;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Log;

class ReportesExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function __construct(string $status)
    {
        $this->status = $status;
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'Apellido Paterno',
            'Apellido Materno',
            'Telefono',
            'Problema',
            'Descripción del problema',
            'Población',
            'Fecha'
        ];
    }

    public function query()
    {
        return TblReportes::query()
                          ->select(
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
                          ->where('FKCatStatus', $this->status == 'Pendiente' ? 1 : 2 )
                          ->orderBy('tblreportes.PKTblReportes', 'desc');
    }
}
