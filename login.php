<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/login.css">
  <!-- boststrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
</head>
<body>
  <div class="contenedor-formulario contenedor">
    <div class="imagen-formulario">
            
    </div>

    <form class="formulario">
      <div class="texto-formulario">
        <h2>Bienvenido de nuevo</h2>
        <p>Inicia sesión con tu cuenta</p>
      </div>
      <div class="input">
        <label for="usuario">Usuario</label>
        <input placeholder="Ingresa tu nombre" type="text" id="usuario">
      </div>
      <div class="input">
        <label for="contraseña">Contraseña</label>
        <input placeholder="Ingresa tu contraseña" type="password" id="contraseña">
      </div>
      <div class="input">
        <input type="submit" value="Entrar" id="entrar">
      </div>
    </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
    
  <script>
      $(document).ready(function(){
        function login(){
          const datos = {
            "operacion"   : "iniciarSesion",
            "email"       : $("#usuario").val(),
            "password"    : $("#contraseña").val()
          };

          $.ajax({
            url: './controller/usuario.php',
            type: 'GET',
            data: datos,
            dataType: 'JSON',
            success: function (result){
              console.log(result);
              if (result.login){
                alert(`Bienvenido: ${result.email}`);
                window.location.href = `view/ventas.view.php`;
              }else{
                alert(result.mensaje);
              }
            }
          });
        }

        $("#entrar").click(login);
      
        $("#contraseña").keypress(function (evt) {
          if (evt.keyCode == 13){
            login();
          }
        });
      });
    </script>

</body>
</html>