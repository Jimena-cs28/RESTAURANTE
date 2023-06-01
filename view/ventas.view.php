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
              <th>Mesa</th>
              <th>Tipo de plato</th>
              <th>nombres</th>
              <th>apellidos</th>
              <th>Precio</th>
              <th>Plato</th>
              <th>cantidad</th>
              <th>precioTotal</th>
              <th>Tipo de Pago</th>
              <th>Comprobante</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>
  
  <script>
    document.addEventListener("DOMContentLoaded", () =>{
      const tabla =document.querySelector("#tabla-ventas");
      const cuerpo = document.querySelector("tbody");

      function listarDeVentas(){
        const parametros = new URLSearchParams();
        parametros.append("operacion", "listarDeVenta")

        fetch("../controller/Ventas.controller.php", {
          method : "POST",
          body:parametros
        })
        .then(response => response.json())
        .then(datos => {
          console.log(datos);
          let num = 1;
          cuerpo.innerHTML = ``;
          datos.forEach(element => {
            const opcion = `
              <tr>
                <td>${element.iddeventa}</td>
                <td>${element.turno}</td>
                <td>${element.Mesa}</td>
                <td>${element.tipo}</td>
                <td>${element.nombres}</td>
                <td>${element.apellidos}</td>
                <td>${element.PrecioUni}</td>
                <td>${element.plato}</td>
                <td>${element.cantidad}</td>
                <td>${element.precioTotal}</td>
                <td>${element.Tipopago}</td>
                <td>${element.comprobante}</td>
              </tr>
            `;
            cuerpo.innerHTML +=opcion;
            num++;
          });
        });
      }


      listarDeVentas();
    });
  </script>
</body>
</html>