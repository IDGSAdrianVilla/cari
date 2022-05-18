<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>M-net</title>

	<link rel="icon" type="image/png" href="images/icono.png" />
   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   	<link rel="stylesheet" href="css/estiloIndex.css">
</head>
<body>
	
	<div class="form-structor">
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="signup">
                <h2 class="form-title" id="signup"><span>O</span>Entrar</h2>

                <div class="form-holder">
                    <input name="usuario" id="usuario" type="text" class="input" placeholder="Usuario" onkeyup="con();" autocomplete="off" required/>
                    <input name="contrasenia" id="contraseña" type="password" class="input" placeholder="Contraseña" onkeyup="con();" required/>
                </div>

                <br><br>
                <button class="submit-btn"><b>Entrar</b></button>

                <p style="color: white; text-align: center;"><b id="error"></b></p>

                </div>
                <div class="login slide-up">
                <div class="center">

                    <h2 class="form-title" id="login"><b style="color: gray;">E</b>menet</h2>
                    
                </div>
            </div>
        </form>
    </div>
</body>
</html>