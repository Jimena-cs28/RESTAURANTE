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
<body class="bg-secondary d-flex justify-content-center align-items-center vh-100">
  <div class="bg-white p-5 rounded-5 text-secondary" style="width:25rem">
    <div class="d-flex justify-content-center">
      <img src="img/logo.PNG" alt="logo-principal" style="height: 7rem">
    </div>
    <div class="text-center fs-1 fw-bold">Inicie Sesion</div>
    <div class="input-group mt-3 ">
      <div class="input-group-text bg-secondary">
        <img src="img/usuario.png" alt="logo2" style="height: 1rem">
      </div>
      <input class="form-control" type="text" id="email" placeholer="Username">
    </div>
    <div class="input-group mt-2">
      <div class="input-group-text bg-secondary">
        <img src="img/contraseña.png" alt="logo2" style="height: 1rem">
      </div>
      <input class="form-control" type="password" id="password"  placeholer="password">
    </div>
    <div class="btn btn-success text-white w-100 mt-5" id="iniciar" >Login</div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
        function login(){
          const datos = {
            "operacion"   : "iniciarSesion",
            "email"       : $("#email").val(),
            "password"    : $("#password").val()
          };

          $.ajax({
            url: './controller/usuario.php',
            type: 'GET',
            data: datos,
            dataType: 'JSON',
            success: function (result){
              console.log(result);
              if (result.login){
                alert(`Bienvenido`);
                window.location.href = `view/ventas.view.php`;
              }else{
                alert(result.mensaje);
              }
            }
          });
        }

        $("#iniciar").click(login);
      
        $("#password").keypress(function (evt) {
          if (evt.keyCode == 13){
            login();
          }
        });
      })
    </script>
</body>
</html>