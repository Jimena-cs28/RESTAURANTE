<?php
session_start();
if (!isset($_SESSION['iniciarSesion']) || !$_SESSION['iniciarSesion']['status']){
}
?>

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
    
  <script>
      document.addEventListener("DOMContentLoaded",() => {
        const btIniciar = document.querySelector("#entrar");
        const txtcontra = document.querySelector("#contraseña");

        function iniciarsesion(){
          const usuario = document.querySelector("#usuario");
          const claveacceso = document.querySelector("#contraseña");

          const parametros = new URLSearchParams();
          parametros.append("operacion", "iniciarSesion")
          parametros.append("usuario", usuario.value)
          parametros.append("clave", claveacceso.value)

          fetch(`./controller/usuario.php`, {
            method: 'POST',
            body: parametros
          })
            .then(respuesta => respuesta.json())
            .then(datos => {
              if (!datos.status){
                alert(datos.mensaje);
                usuario.focus();
              }else{
                window.location.href = './view/index.html';
              }
            })
            .catch(error => {
            });
        }

        txtcontra.addEventListener("keypress", (evt) => {
          if (evt.charCode == 13) iniciarsesion();
        });

        btIniciar.addEventListener("click", iniciarsesion);
      });
  </script>

</body>
</html>