function con(){
    var usuario     = $('#usuario').val();
    var contraseña  = $('#contraseña').val();
    if (usuario != "" && contraseña != "") {
        $.ajax({
            type: "POST",
            url: "./controllers/login.php",
            data: 'usuario='+usuario+'&contrasena='+contraseña,
            success:function(data){
                if (data == 'true') {
                    $("#error").text("Bienvenido "+usuario);
                    window.location.assign('inicio.php');
                }else{
                    $("#error").text("Usuario no encontrado");
                    console.log(data);
                }
            },
            error:function (){
            }
        });
    }
}