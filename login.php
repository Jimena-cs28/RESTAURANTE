<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login']['status']){
  header('Location:./view/');
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
      document.addEventListener("DOMContentLoaded", () => {
        const email = document.querySelector("#usuario");
        const clave = document.querySelector("#contraseña");
        const btnLogin = document.querySelector("#entrar");

        function login(){
          const parametros = new URLSearchParams();
          parametros.append("operacion", "iniciarSesion");
          parametros.append("nombreusu", email.value);
          parametros.append("claveacceso", clave.value);

          fetch('./controller/usuario.php', {
            method: 'POST',
            body: parametros
          })
          .then(respuesta => respuesta.json())
          .then(datos => {
            console.log(datos);
            if (datos.status) {
              alert(` Bienvenido: ${datos.apellidos} ${datos.nombres}`)
              window.location.href = './view/index.php';
            }else {
              console.error();
              alert(datos.mensaje)
            }
          })
        }

        btnLogin.addEventListener("click", login);
      })
  </script>

</body>
</html>