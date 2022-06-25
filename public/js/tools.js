function validarActiazacionUsuario() {
    let correo = $('#correoInput').val();
    return validateEmail(correo) ? true : false;
}

const validateEmail = (email) => {
    return email.match(
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
};

const validate = () => {
    const $result = $('.resultInput');
    const email = $('#correoInput').val();
    $result.text('');

    if (validateEmail(email)) {
        $result.text('Correo válido');
        $result.css('color', 'green');
    } else {
        $result.text('Correo inválido');
        $result.css('color', 'red');
    }
    return false;
}

const validateEmailC = (email) => {
    return email.match(
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
};

const validateC = () => {
    const $result = $('.resultInput2');
    const email = $('#correoInput2').val();
    $result.text('');

    if (validateEmailC(email)) {
        $result.text('Correo válido');
        $result.css('color', 'green');
    } else {
        $result.text('Correo inválido');
        $result.css('color', 'red');
    }
    return false;
}

function validarActiazacionUsuarioC2() {
    let correo = $('#correoInput3').val();
    console.log(correo);
    return validateEmailC2(correo) ? true : false;
}

const validateEmailC2 = (email) => {
    return email.match(
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
};

const validateC2 = () => {
    const $result = $('.resultInput3');
    const email = $('#correoInput3').val();
    $result.text('');

    if (validateEmailC2(email)) {
        $result.text('Correo válido');
        $result.css('color', 'green');
    } else {
        $result.text('Correo inválido');
        $result.css('color', 'red');
    }
    return false;
}

$(document).ready(function(){
    $('#correoInput').on('input', validate);
    $('#correoInput2').on('input', validateC);
    $('#correoInput3').on('input', validateC2);
    
    $(".verModalReporte").click( function(){

        let id = $(this).attr("id");

        $(".asd").css('filter','grayscale(0.1) blur(10px)');
        $.ajax({
            url: route('detalleReporte', {id}),
            type:'get',
            success:  function (detalleReporte) {
                mapToForm(detalleReporte);
                $(".asd").css('filter','');
            },
            statusCode: {
               404: function() {
                  alert('web not found');
               }
            },
            error:function(x,xs,xt){
               window.open(JSON.stringify(x));
            }
         });
    });
    
    function mapToForm ( r ) {
        if ( r[0].empleadoAtendiendo != "" && r[0].empleadoAtendiendo != null ) {
            
            let html = '<p style="color: #DC5700;">Atendiendo:<b> '+r[0].empleadoAtendiendo+' - </b> '+r[0].fechaAtendiendo+' <b style="color: black;">|</b> '+r[0].horaAtendiendo;
            $(".colorFondoTitulo").css('background','#FFEDE2');
            $("#atendiendo").empty().html(html);
        } else {
            $(".colorFondoTitulo").css('background','');
            $("#atendiendo").empty();
        }

        $(".tituloPrincipalModal").text(r[0].nombreCliente+' '+r[0].apellidoPaterno+' '+r[0].apellidoMaterno);

        if ( r[0].telefonoOpcional != "" && r[0].telefonoOpcional != null ) {
            let fragmento = `
            <div class="form-group tel2">
                <label class="control-label col-sm-3">Teléfono Opcional:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control parametrotelefonoOpcional" id="telefono23" placeholder="`+r[0].telefonoOpcional+`" value="`+r[0].telefonoOpcional+`" onkeypress="return soloNumeros(event);" maxlength="10" name="telefonoOpcional" readonly style="background: white;">
                </div>
            </div>
            `;
            $(".telefonoOcional").empty().html(fragmento);
        }

        $(".poblacionParametro").val(r[0].PKCatPoblaciones).text(r[0].nombrePoblacion);
        $(".problemaParametro").val(r[0].PKCatProblemas).text(r[0].nombreProblema);

        let exepciones = [
            'direccion',
            'referencias',
            'descripcionProblema',
            'parametroobservaciones',
            'diagnostico',
            'solucion'
        ];

        Object.keys(r[0]).forEach(function(key) {
            $.inArray(key, exepciones) != -1 ? $(".parametro"+key).attr('placeholder', r[0][key] != null ? r[0][key] : 'Sin información').text(r[0][key]) : $(".parametro"+key).attr('placeholder', r[0][key]).val(r[0][key]) ;
        })

        $(".empleadoRecibio").empty().append(r[0].empleadoRecibio);
        
        if ( r[0].empleadoActualizo != "" && r[0].empleadoActualizo != null ) {
            $(".apartadoActualizo").show().css('visibility','visible');
            $(".empleadoActualizo").empty().append(r[0].empleadoActualizo);
        } else {
            $(".apartadoActualizo").hide().css('visibility','hidden');
        }

        if ( r[0].empleadoRealizo != "" && r[0].empleadoRealizo != null ) {
            $(".apartadoAtendido").show().css('visibility','visible');
            $(".empleadoRealizo").empty().append(r[0].empleadoRealizo);
        } else {
            $(".apartadoAtendido").hide().css('visibility','hidden');
        }
        
        let PKTblEmpleado = $('#PKTblEmpleado').val();
        
        let insert = "";
        const img = 'https://cari.villasoftsolutions.com/project/public/images/proceso.png';
        $(".apartadoBotones").empty();

        let id = r[0].folio;

        if ( r[0].status == 'Atendido') {
            insert += `
                <div class="col-sm-5">
                    <button class="btn form-control" style="margin-top: 15px; background: #FFA26D; font-weight: bold; color: white;">Actualizar</button>
                </div>
                <div class="col-sm-4">
                    <a href="`+route('retomar', {id})+`">
                        <input class="btn form-control" style="margin-top: 15px; background: mediumaquamarine; font-weight: bold; color: white;" value="Retomar">
                    </a>
                </div>
                <div class="col-sm-3">
                    <button data-dismiss="modal" class="btn form-control" style="margin-top: 15px; background: #FF6A6A; font-weight: bold; color: white;"><b>X</b></button>
                </div>
            `;
        } else if ( r[0].diagnostico != "" && r[0].diagnostico != null && r[0].solucion != "" && r[0].solucion != null ) {
            insert += `
                <div class="col-sm-4">
                    <button class="btn form-control" style="margin-top: 15px; background: #FFA26D; font-weight: bold; color: white;">Actualizar</button>
                </div>
                            
                <div class="col-sm-4">
                    <a href="`+route('atender', {id})+`" class="btn form-control" style="margin-top: 15px; background: mediumaquamarine; font-weight: bold; color: white;">Atender</a>
                </div>
            `;
            if ( r[0].empleadoAtendiendo == "" || r[0].empleadoAtendiendo == null ) {
                insert += `
                    <div class="col-sm-2">
                    <a href="`+route('atendiendo', {id})+`" class="btn btn-primary form-control" style="margin-top: 15px;"><img src="`+img+`" alt="" width="22px"></a>
                    </div>
                `;
            } else if ( r[0].PKTblEmpleadosAtediendo == PKTblEmpleado ) {
                insert += `
                    <div class="col-sm-2">
                        <a href="`+route('desatendiendo', {id})+`" class="btn btn-danger form-control" style="margin-top: 15px;"><img src="`+img+`" alt="" width="22px"></a>
                    </div>
                `;
            } else {
                insert += `
                    <div class="col-sm-2">
                        <a class="btn btn-danger form-control" style="margin-top: 15px;"><img src="`+img+`" alt="" width="22px"></a>
                    </div>
                `;
            }
            insert += `
                <div class="col-sm-2">
                    <button data-dismiss="modal" class="btn form-control" style="margin-top: 15px; background: #FF6A6A; font-weight: bold; color: white;"><b>X</b></button>
                </div>
            `;
        } else {
            insert += `
                <div class="col-sm-8">
                    <button class="btn form-control" style="margin-top: 15px; background: #FFA26D; font-weight: bold; color: white;">Actualizar</button>
                </div>
            `;
            if ( r[0].empleadoAtendiendo == "" || r[0].empleadoAtendiendo == null ) {
                insert += `
                    <div class="col-sm-2">
                    <a href="`+route('atendiendo', {id})+`" class="btn btn-primary form-control" style="margin-top: 15px;"><img src="`+img+`" alt="" width="22px"></a>
                    </div>
                `;
            } else if ( r[0].PKTblEmpleadosAtediendo == PKTblEmpleado ) {
                insert += `
                    <div class="col-sm-2">
                        <a href="`+route('desatendiendo', {id})+`" class="btn btn-danger form-control" style="margin-top: 15px;"><img src="`+img+`" alt="" width="22px"></a>
                    </div>
                `;
            } else {
                insert += `
                    <div class="col-sm-2">
                        <a class="btn btn-danger form-control" style="margin-top: 15px;"><img src="`+img+`" alt="" width="22px"></a>
                    </div>
                `;
            }
            insert += `
                <div class="col-sm-2">
                    <button data-dismiss="modal" class="btn form-control" style="margin-top: 15px; background: #FF6A6A; font-weight: bold; color: white;"><b>X</b></button>
                </div>
            `;
        }

        $(".apartadoBotones").append(insert);
    }

    $(".verModalCliente").click( function(){

        let id = $(this).attr("id");

        $(".asd").css('filter','grayscale(0.1) blur(10px)');
        $.ajax({
            url: route('detalleCliente', {id}),
            type:'get',
            success:  function (detalleCliente) {
                mapToFormCliente(detalleCliente);
                $(".asd").css('filter','');
            },
            statusCode: {
               404: function() {
                  alert('web not found');
               }
            },
            error:function(x,xs,xt){
               window.open(JSON.stringify(x));
            }
         });
    });

    function mapToFormCliente ( c ) {

        $(".tituloPrincipalModal").text(c[0].nombreCliente+' '+c[0].apellidoPaterno+' '+c[0].apellidoMaterno);

        $(".parametroPKCliente").val(c[0].PKTblClientes);
        $(".parametroPKDireccion").val(c[0].PKTblDirecciones);
        $(".parametronombreCliente2").val(c[0].nombreCliente);
        $(".parametroapellidoPaterno2").val(c[0].apellidoPaterno);
        $(".parametroapellidoMaterno2").val(c[0].apellidoMaterno);
        $(".parametrotelefono2").val(c[0].telefono);
        if ( c[0].telefonoOpcional != null ) {
            $("#t4").show();
            $("#t4").css('visibility', 'visible');
            $("#mas2").hide();
            $("#menos2").show();
            $(".parametrotelefonoOpcional2").val(c[0].telefonoOpcional);
        }
        $(".parametropoblacion2").val(c[0].PKCatPoblaciones);
        $(".parametropoblacion2").text(c[0].nombrePoblacion);
        $(".parametrocoordenadas2").val(c[0].coordenadas);
        $(".parametrodireccion2").val(c[0].direccion);
        $(".parametroreferencias2").val(c[0].referencias);
        let id = c[0].PKCatPoblaciones;
        if (c[0].Activo == 1) {
            html = '<a style="width: 100%;" class="btn form-conrtol btn-warning" href="'+route("inactivarCliente", {id})+'"><b style="color:white;">Inactivar</b></a>';
            $(".btnAccionClientes").empty().html(html);
        } else {
            html = '<a style="width: 100%;" class="btn form-conrtol btn-info" href="'+route("activarCliente", {id})+'"><b style="color:white;">Activar</b></a>';
            $(".btnAccionClientes").empty().html(html);
        }
    }

    $(".verModalInsumoPoblacion").click( function(){
        
        let id = $(this).attr("id");
        console.log(id);

        $(".asd").css('filter','grayscale(0.1) blur(10px)');
        $.ajax({
            url: route('detallePoblacion', {id}),
            type:'get',
            success:  function (detallePoblacion) {
                mapToFormInsumoPoblacion(detallePoblacion);
                $(".asd").css('filter','');
            },
            statusCode: {
               404: function() {
                  alert('web not found');
               }
            },
            error:function(x,xs,xt){
               window.open(JSON.stringify(x));
               //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
            }
         });
    });

    function mapToFormInsumoPoblacion ( pob ) {
        $("#PKCatPoblaciones").val(pob[0].PKCatPoblaciones);
        $(".parametroNombrePoblacion").val(pob[0].nombrePoblacion);
        $(".parametroCP").val(pob[0].codigoPostal);

        let id = pob[0].PKCatPoblaciones;

        if (pob[0].Activo == 1) {
            html = '<a style="width: 100%;" class="btn form-conrtol btn-warning" href="'+route('inactivarPoblacion', {id})+'"><b style="color:white;">Inactivar</b></a>';
            $(".btnAccion").empty().html(html);
        } else {
            html = '<a style="width: 100%;" class="btn form-conrtol btn-info" href="'+route('activarPoblacion', {id})+'"><b style="color:white;">Activar</b></a>';
            $(".btnAccion").empty().html(html);
        }
    }

    $(".verModalInsumoProblema").click( function(){

        let id = $(this).attr("id");

        $(".asd").css('filter','grayscale(0.1) blur(10px)');
        $.ajax({
            url: route('detalleProblema', {id}),
            type:'get',
            success:  function (detalleProblema) {
                mapToFormInsumoProblema(detalleProblema);
                $(".asd").css('filter','');
            },
            statusCode: {
               404: function() {
                  alert('web not found');
               }
            },
            error:function(x,xs,xt){
               window.open(JSON.stringify(x));
               //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
            }
         });
    });

    function mapToFormInsumoProblema ( pro ) {
        $("#PKCatProblemas").val(pro[0].PKCatProblemas);
        $(".parametroNombreProblema").val(pro[0].nombreProblema);
        $(".parametroDescripcion").val(pro[0].descripcionProblema);

        let id = pro[0].PKCatProblemas;

        if (pro[0].Activo == 1) {
            html = '<a style="width: 100%;" class="btn form-conrtol btn-warning" href="'+route('inactivarProblema', {id})+'"><b style="color:white;">Inactivar</b></a>';
            $(".btnAccion").empty().html(html);
        } else {
            html = '<a style="width: 100%;" class="btn form-conrtol btn-info" href="'+route('activarProblema', {id})+'"><b style="color:white;">Activar</b></a>';
            $(".btnAccion").empty().html(html);
        }
    }

    $(".verModalInsumoRol").click( function(){

        let id = $(this).attr("id");

        $(".asd").css('filter','grayscale(0.1) blur(10px)');
        $.ajax({
            url: route('detalleRol', {id}),
            type:'get',
            success:  function (detalleRol) {
                mapToFormInsumoRol(detalleRol);
                $(".asd").css('filter','');
            },
            statusCode: {
               404: function() {
                  alert('web not found');
               }
            },
            error:function(x,xs,xt){
               window.open(JSON.stringify(x));
               //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
            }
         });
    });

    function mapToFormInsumoRol ( rol ) {
        $("#PKCatRoles").val(rol[0].PKCatRoles);
        $(".parametroNombreRol").val(rol[0].nombreRol);
        $(".parametroDescripcion").val(rol[0].descripcionRol);

        let id = rol[0].PKCatRoles;

        if (rol[0].Activo == 1) {
            html = '<a style="width: 100%;" class="btn form-conrtol btn-warning" href="'+route('inactivarRol', {id})+'"><b style="color:white;">Inactivar</b></a>';
            $(".btnAccion").empty().html(html);
        } else {
            html = '<a style="width: 100%;" class="btn form-conrtol btn-info" href="'+route('activarRol', {id})+'"><b style="color:white;">Activar</b></a>';
            $(".btnAccion").empty().html(html);
        }
    }

    $(".verModalDetalleUsuario").click( function(){

        let id = $(this).attr("id");

        $(".asd").css('filter','grayscale(0.1) blur(10px)');
        $.ajax({
            url: route('detalleUsuario', {id}),
            type:'get',
            success:  function (detalleUsuario) {
                mapToFormInsumoUsuario(detalleUsuario);
                $(".asd").css('filter','');
            },
            statusCode: {
               404: function() {
                  alert('web not found');
               }
            },
            error:function(x,xs,xt){
               window.open(JSON.stringify(x));
               //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
            }
         });
    });

    function mapToFormInsumoUsuario ( usu ) {
        $("#PKTblEmpleados").val(usu[0].PKTblEmpleados);
        $(".parametroNombreEmpleado").val(usu[0].nombreEmpleado);
        $(".parametroAPaterno").val(usu[0].apellidoPaterno);
        $(".parametroAMaterno").val(usu[0].apellidoMaterno);
        $(".rolParametro").text(usu[0].nombreRol);
        $(".rolParametro").attr('value', usu[0].FKCatRoles);
        $(".parametroCorreo").val(usu[0].correo);
        $(".parametroCorreo").val(usu[0].correo);
    }

    $(".verModalInstalacion").click( function(){
        $(".seccionModalInstalacion").empty();
        
        var id = $(this).attr('id');

        $.ajax({
            url: 'layouts/modalConsultaInstalacion.php',
            type: 'POST',
            dataType: 'html',
            data: {id_instalacion: id},
        })
        .done(function(resultado){
            $(".seccionModalInstalacion").html(resultado);
        })
    });

    var properties = ["cliente", "qwe", "ert", "bnm", "clas"];

    $.each(properties, function (i, val) {
        var orderClass = "";

        $("#" + val).click(function (e) {
            e.preventDefault();
            $(".filter__link.filter__link--active")
                .not(this)
                .removeClass("filter__link--active");
            $(this).toggleClass("filter__link--active");
            $(".filter__link").removeClass("asc desc");

            if (orderClass == "desc" || orderClass == "") {
                $(this).addClass("asc");
                orderClass = "asc";
            } else {
                $(this).addClass("desc");
                orderClass = "desc";
            }

            var parent = $(this).closest(".header__item");
            var index = $(".header__item").index(parent);
            var $table = $(".table-content");
            var rows = $table.find(".table-row").get();
            var isSelected = $(this).hasClass("filter__link--active");
            var isNumber = $(this).hasClass("filter__link--number");

            rows.sort(function (a, b) {
                var x = $(a).find(".table-data").eq(index).text();
                var y = $(b).find(".table-data").eq(index).text();

                if (isNumber == true) {
                    if (isSelected) {
                        return x - y;
                    } else {
                        return y - x;
                    }
                } else {
                    if (isSelected) {
                        if (x < y) return -1;
                        if (x > y) return 1;
                        return 0;
                    } else {
                        if (x > y) return -1;
                        if (x < y) return 1;
                        return 0;
                    }
                }
            });

            $.each(rows, function (index, row) {
                $table.append(row);
            });

            return false;
        });
    });



    var contadorAfk = 1;

    //Cada minuto se lanza la función ctrlTiempo
    var contadorAfk = setInterval(ctrlTiempo, 60000); 

    //Si el usuario mueve el cursor cambiamos la variable a 0.
    $(this).mousemove(function (e) {
        contadorAfk = 0;
    });
    //Si el usuario presiona alguna tecla cambiamos la variable a 0.
    $(this).keypress(function (e) {
        contadorAfk = 0;
    });
    $("#contrasena").keyup(function(){
        var contrasenaac  = $(this).val();
        var contrasenaac1 = "<?php echo $usuario['contrasena'];?>";
        if (contrasenaac == contrasenaac1) {
            $(".contrasenan").show();
            $("#contrasenan").attr('required','required');
            $(".contrasenaac").hide();
        }
    });

    function ctrlTiempo() {
        //Se aumenta en 1 la variable.
        contadorAfk++;
        //Se comprueba si ha pasado del tiempo que designemos.
        if (contadorAfk > 20) { // Más de 20 minutos, lo detectamos como ausente o inactivo.
            var r = confirm("¿Desea continuar en esta sesión?");
            if (r == false) {
                window.location.assign(route('logout'));
            }else{
                contadorAfk = 0;
            }
        }
    }
});

function mas() {
    $(".tel2").show().css('visibility', 'visible');
    $("#mas3").hide();
    $("#menos3").show();
}

function menos() {
    $(".tel2").hide().css('visibility', 'hidden');
    $("#telefono23").val('');
    $("#mas3").show();
    $("#menos3").hide();
}