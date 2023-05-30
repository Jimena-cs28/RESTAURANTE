<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ventas</title>
  <link rel="stylesheet" href="../css/index.css">
    <!-- Estilos Bootstrap 5.2 -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- DataTable -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">

</head>
<body>
  <nav>
    <a href="../login.php"><img src="../img/logo.PNG" alt="logo"></a>
    <h2>Listado de las ventas</h2>
    <a class="btn btn-outline-dark" href="./index.html">Home</a>
  </nav>
  <div class="container">
    <div class="row">

      <table class="table table-md table-striped mt-4" id="tabla-ventas">
        <thead>
          <tr>
              <th>#</th>
              <th>Turno</th>
              <th>Tipo de Plato</th>
              <th>Nombres</th>
              <th>Precio</th>
              <th>Plato</th>
              <th>Cantidad</th>
              <th>Total</th>
              <th>Tipopago</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>
  
  <!-- AJAX = JavaScript asincrónico-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  
  <!--Js Bootstrap 5.2-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
  <!-- Fontawesome -->
  <script src="https://kit.fontawesome.com/2927838564.js" crossorigin="anonymous"></script>

  <!-- DataTable -->
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
  
  <!-- Opcional -->
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>

  <script>
    $(document).ready(function(){

      function listaVentas(){
        $.ajax({
          url: '../controller/Ventas.controller.php',
          type: 'GET',
          data: {'operacion': 'listarVenta'},
          success: function (result){
            var tabla = $("#tabla-ventas").DataTable();
            //Destruirlo
            tabla.destroy();

            //Poblar el cuerpo de la tabla
            $("#tabla-ventas tbody").html(result);

            //Reconstruimos la tabla
            $("#tabla-ventas").DataTable({
                // dom: 'Bfrtip',
                // buttons: [
                //     {  
                //         extend: 'print',
                //         exportOptions: { columns: [0,1,2,3,4] }
                //     }
                // ]
                // language: {
                //     url: 'js/Spanish.json'
                // }
            });

          }
        });
      }

      listaVentas();
    });
  </script>
</body>
</html>