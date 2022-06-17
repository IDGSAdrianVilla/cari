<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <title>CARI</title>

    <style>

        @import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");

        html, body{
            font-family: "Poppins", sans-serif !important;
        }

        .login {
            min-height: 100vh;
        }

        .bg-image {
            background-image: url('{{ asset("images/portada1.jpg") }}');
            background-size: cover;
            background-position: center;
        }

        .login-heading {
            font-weight: 300;
        }

        .btn-login {
            font-size: 0.9rem;
            letter-spacing: 0.05rem;
            padding: 0.75rem 1rem;
            background: gray;
            color: white;
        }

    </style>

    <link rel="icon" type="image/png" href="{{ asset('images/icono.png') }}" />
</head>
<body>
    <div class="container-fluid ps-md-0">
        <div class="row g-0">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h2 class="login-heading mb-4"><b style="color: gray;">Bienvenido</b></h2>
                                <form action="{{ route('login') }}" method="post" onsubmit="return miFuncion()">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="correo" name="correo" autocomplete="off" placeholder="correo">
                                        <label for="correo">Correo electrónico</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="contrasenia" name="contrasenia" autocomplete="off" placeholder="contrasenia">
                                        <label for="contrasenia">Contraseña</label>
                                    </div>

                                    <center>
                                        <div class="g-recaptcha" data-sitekey="{{env('KEY_RECAPTCHA')}}"></div>
                                        <br>
                                    </center>

                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                                        <label class="form-check-label" for="rememberPasswordCheck">
                                            Recordar contraseña
                                        </label>
                                    </div>

                                    <center><b id="texto" style="color: red;">@if($errors->any()) {{$errors->first()}} @endif</b></center>
                                    <br>
                                    <div class="d-grid">
                                        <button class="btn btn-lg btn-login text-uppercase fw-bold mb-2" type="submit">Entrar</button>
                                        <div class="text-center">
                                            <a class="small" href="javascript:void(0);">¿Olvidaste tu contraseña?</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @routes
    <script>
        function miFuncion() {
            var response = grecaptcha.getResponse();
            let correo = $('#correo').val();
            let contrasenia = $('#contrasenia').val();

            if( correo.length == 0 || contrasenia.length == 0 ){
                $('#texto').text('Aún hay campos vacios').css('color', 'red');
                
                return false;
            } else if ( response.length == 0 ) {
                $('#texto').text('Aún no se ha verificado el recaptcha').css('color', 'red');

                return false;
            } else { return true; }
        }
    </script>
</body>
</html>