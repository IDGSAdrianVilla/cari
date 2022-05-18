<div class="col-sm-10">
    <div class="form-group">
        <label>Buscar en Roles</label>
        <input id="search" type="text" class="form-control" placeholder="Buscar en Roles" maxlength="30">
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
            <th class="header__item" style="text-align: center;"><a style="color: white;" id="cliente" class="filter__link" href="javascript:void(0);">Nombre Rol</a></th>
            <th class="header__item" style="text-align: center;"><a style="color: white;" id="qwe" class="filter__link" href="javascript:void(0);">Descripción Rol</a></th>
            <th style="text-align: center;"><a style="color: white;">Fecha</a></th>
            <th style="text-align: center;"><a style="color: white;">Opciones</a></th>
        </tr>
    </thead>
    <tbody class="table-content">

        @foreach ($troles as $item)

            <tr class="table-row">
                <td class="table-data verModalInsumoRol" data-toggle='modal' data-target='#verModalInsumoRol' id="{{ $item->PKCatRoles }}">
                    {{ $item->PKCatRoles }}
                </td>
                <td class="table-data verModalInsumoRol" data-toggle='modal' data-target='#verModalInsumoRol' id="{{ $item->PKCatRoles }}">
                    {{ $item->nombreRol }}
                </td>
                <td class="table-data verModalInsumoRol" data-toggle='modal' data-target='#verModalInsumoRol' id="{{ $item->PKCatRoles }}">
                    {{ $item->descripcionRol }}
                </td>
                <td class="table-data verModalInsumoRol" data-toggle='modal' data-target='#verModalInsumoRol' id="{{ $item->PKCatRoles }}">
                    {{ $item->fechaAlta }}
                </td>

                @if ( $item->Activo == 1)
                    <td class="table-data">
                        <a href="/inactivarRol/{{ $item->PKCatRoles }}">
                            <button class="btn btn-warning"><b>Inactivar</b></button>
                        </a>
                    </td>
                @else
                    <td class="table-data">
                        <a href="/activarRol/{{ $item->PKCatRoles }}">
                            <button class="btn btn-info"><b>Activar</b></button>
                        </a>
                    </td>
                @endif

            </tr>
        @endforeach
    </tbody>
</table>