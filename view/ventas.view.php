<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ventas</title>
  <link rel="stylesheet" href="../css/index.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
              <th>Comida</th>
              <th>Precio</th>
              <th>Mesa</th>
              <th>Cantidad</th>
              <th>Total</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>    
  
  <script>
    document.addEventListener("DOMContentLoaded", ()=>{
        
      const CuerpoTabla = document.querySelector("#tabla-ventas tbody");

      function ListarVentas(){

        const parametros = new URLSearchParams();
        parametros.append("operacion","listarVenta");

        fetch('../controller/Ventas.controller.php',{
          method: 'POST',
          body: parametros
        })
        .then(respuesta => respuesta.json())
        .then(datos => {
          console.log(datos);
          CuerpoTabla.innerHTML = ``;
          datos.forEach(element => {
            const venta = `
              <tr>
                <td>${element.idventa}</td>  
                <td>${element.turno}</td>  
                <td>${element.tipo}</td>  
                <td>${element.comidas}</td> 
                <td>${element.PrecioUni}</td>  
                <td>${element.NumMesa}</td>  
                <td>${element.cantidad}</td>  
                <td>${element.totalPagar}</td>  
              <tr>
            `;
            CuerpoTabla.innerHTML += venta;
          });
        });
      }

      ListarVentas();
    });
  </script>
</body>
</html>