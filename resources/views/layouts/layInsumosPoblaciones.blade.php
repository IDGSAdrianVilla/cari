<div class="col-sm-10">
    <div class="form-group">
        <label>Buscar en Poblaciones</label>
        <input id="search" type="text" class="form-control" placeholder="Buscar en Poblaciones" maxlength="30">
    </div>
</div>
<div class="col-sm-2">
    <div class="form-group">
        <label>Reporte</label>
        <a href="javascript:void(0);"><button class="btn btn-info form-control"><img src="/images/reporte.png" alt="" width="22px"></button></a>
    </div>
</div>

<table class="table" style="margin-top:30px; text-align: center;" id="mytable">
    <thead class="table-header" style="background:gray;">
        <tr>
            <th class="header__item" style="text-align: center;"><a style="color: white;" id="bnm" class="filter__link filter__link--number" href="javascript:void(0);">Folio</a></th>
            <th class="header__item" style="text-align: center;"><a style="color: white;" id="cliente" class="filter__link" href="javascript:void(0);">Nombre Población</a></th>
            <th class="header__item" style="text-align: center;"><a style="color: white;" id="qwe" class="filter__link" href="javascript:void(0);">Código Postal Población</a></th>
            <th style="text-align: center;"><a style="color: white;">Fecha</a></th>
            <th style="text-align: center;"><a style="color: white;">Opciones</a></th>
        </tr>
    </thead>
    <tbody class="table-content">

        @foreach ($tPoblaciones as $item)

            <tr class="table-row">
                <td class="table-data verModalInsumoPoblacion" data-toggle='modal' data-target='#verModalInsumoPoblacion' id="{{ $item->PKCatPoblaciones }}">
                    {{ $item->PKCatPoblaciones }}
                </td>
                <td class="table-data verModalInsumoPoblacion" data-toggle='modal' data-target='#verModalInsumoPoblacion' id="{{ $item->PKCatPoblaciones }}">
                    {{ $item->nombrePoblacion }}
                </td>
                <td class="table-data verModalInsumoPoblacion" data-toggle='modal' data-target='#verModalInsumoPoblacion' id="{{ $item->PKCatPoblaciones }}">
                    {{ $item->codigoPostal }}
                </td>
                <td class="table-data verModalInsumoPoblacion" data-toggle='modal' data-target='#verModalInsumoPoblacion' id="{{ $item->PKCatPoblaciones }}">
                    {{ $item->fechaAlta }}
                </td>

                @if ( $item->Activo == 1)
                    <td class="table-data">
                        <a href="/inactivarPoblacion/{{ $item->PKCatPoblaciones }}">
                            <button class="btn btn-warning"><b>Inactivar</b></button>
                        </a>
                    </td>
                @else
                    <td class="table-data">
                        <a href="/activarPoblacion/{{ $item->PKCatPoblaciones }}">
                            <button class="btn btn-info"><b>Activar</b></button>
                        </a>
                    </td>
                @endif

            </tr>
        @endforeach
    </tbody>
</table>