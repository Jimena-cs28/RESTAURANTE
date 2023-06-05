<?php
session_start();
if (!isset($_SESSION['login']) || !$_SESSION['login']['status']){
  header("Location:../");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link rel="stylesheet" href="../css/index.css">
  <!-- Estilos Bootstrap 5.2 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light align-items-center justify-content-space-around" style="background-color:rgb(8, 235, 220);">
    <div class="container-fluid">
      <img src="../img/logo.PNG" alt="logo">
      <h2>Bienvenido Realice su consulta aqui</h2>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class=" btn btn-outline-dark" href="reporte.html">Reportes</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-dark" href="ventas.view.html">Listas de venta</a>
          </li>
          <li class="nav-item">
            
          </li>
          <li class="nav-item">
            <a class=" btn btn-outline-dark" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-dark" href="../controller/usuario.php?operacion=destroy">Cerrar Sesion</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="mt-3">
    <div class="row">
      <div class="col-md-6">
        <!-- formulario -->
        <form action="" autocomplete="off" id="formulario-Venta">
          <div class="card-body">
            <div class="row">
              <div class="col-md-4 mt-4" >
                <label for="turno" class="form-label ">Turno</label>
                <select name="" id="turno" class="form-select">

                </select>
              </div>
              <div class="col-md-4 mt-4">
                <label for="admi" class="form-label ">Administrador</label>
                <select name="" id="admi" class="form-select">

                </select>
              </div>
              <div class="col-md-4 mt-4">
                <label for="mesa" class="form-label ">Mesa</label>
                <input type="text" id="mesa" class="form-control">
              </div>
            </div>
  
            <div class="row">
              <div class="col-md-4 mt-4" >
                <label for="tipoP" class="form-label">Tipo de Plato</label>
                <select name="" id="tipoP" class="form-select">

                </select>
              </div>
              <div class="col-md-4 mt-4">
                <label for="plato" class="form-label">Plato</label>  
                <input type="text" id="plato" class="form-control">
              </div>
              <div class="col-md-4 mt-5">
                <button class="btn btn-outline-info" id="registrar1">Registrar</button>
                <button class="btn btn-outline-secondary" id="detalleVenta" data-bs-toggle="modal" data-bs-target="#modal-Dventa">Registrar venta</button>
              </div>
            </div>
          </div>
          
        </form> 
        <div class="col-md-10">
          <canvas id="grafico1"></canvas>
        </div>
      </div>
      <div class="container col-md-6 mb-5 text-center">
        <table id="tabla-venta"class="table table-striped table-bordered table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Turno</th>
              <th>Admi</th>
              <th>Mesa</th>
              <th>Menu</th>
              <th>Plato</th>
              <th>Operacion</th>
            </tr>
          </thead>
          <tbody>
    
          </tbody>
        </table>
      </div>
    </div>
    <button class="btn btn-outline-dark" id="actualizarG2">Actualizar Graficos</button>
    <button class="btn btn-outline-dark" id="exportar">Generar Reporte de Ventas</button>
    <div class="row">
      <div class="col-md-4">
        <canvas id="grafico2"></canvas>
      </div>
    </div>
  </div>
  <div class="mt-3">
    <div class="row">
      <div class="col-md-5">
        <canvas id="grafico1"></canvas>
      </div>
      
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    

  <!-- modal acualizar -->
  <div class="modal fade" id="modal-actualizar" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
          <form action="" autocomplete="off" id="formulario-Venta">
            <div class="card">
            <div class="card-header text-black">
              Actualize su venta aqui
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6 mt-4" >
                  <label for="turno" class="form-label ">Turno</label>
                  <select name="" id="md-turno" class="form-select">
                  </select>
                </div>
                <div class="col-md-6 mt-4">
                  <label for="mesa" class="form-label ">Mesa</label>
                  <input type="text" id="md-mesa" class="form-control">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mt-4" >
                  <label for="tipoP" class="form-label">Tipo de Plato</label>
                  <select name="" class="form-select" id="md-tipoP">

                  </select>
                </div>
                <div class="col-md-6 mt-4">
                  <label for="plato" class="form-label">Plato</label>  
                  <input type="text" class="form-control" id="md-plato">
                </div>
              </div>
  
              <div class="row">
                <div class="md-3 mt-4">
                  <button class="btn btn-outline-info" id="actualizar">Actualizar</button>
                  <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Close</button>
                </div>
                <div class="col-md-6">
                </div>
              </div>
            </div>
          </div>
          </form> 
        </div>
    </div>
  </div>

  <!-- modal RegistrarVenta -->
  <div class="modal fade" id="modal-Dventa" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
          <form action="" autocomplete="off" id="formulario-Dventa" class="ml-3">
            <div class="card">
              <div class="card-header bg-secondary text-black">
                  Registro de Detalle de Venta
              </div>
              <div class="card-body">

              <div class="row">
                <div class="col-md-3 mt-4" >
                  <label for="venta" class="form-label ">Venta</label>
                  <input type="number" class="form-control" id="venta">
                </div>
                <div class="col-md-3 mt-4">
                  <label for="precioT" class="form-label "> Precio </label>
                  <input type="number" class="form-control" step="0.001" id="precio" oninput="calcular()">
                </div>
                <div class="col-md-3 mt-4" >
                  <label for="cantidad" class="form-label ">Cantidad</label>
                  <input type="number" class="form-control" step="0.001"  id="cantidad" oninput="calcular()">
                </div>
                <div class="col-md-3 mt-4">
                  <label for="precioT" class="form-label "> Total</label>
                  <input type="number" class="form-control" step="0.001"  id="total">
                </div>
              </div>
              <div class="row mt-4">
                  <div class="col-md-12 " >
                    <label for="plato" class="form-label">Cliente</label>  
                      <select name="" id="cliente" class="form-select">
                      </select>
                  </div>
              </div>
              <div class="row mt-5">
                <div class="col-md-6 ">
                  <label for="tipo" class="form-label ">Tipo De Pago</label>
                  <select name="tipo" id="tipo"  class="form-select">

                  </select>
                </div>
                <div class="col-md-6">
                  <label for="compro" class="form-label ">Comprobante</label>
                  <select name="" id="comprobante" class="form-select">

                  </select>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 mt-4">
                  <button class="btn btn-outline-info" id="registrarDeV">Registrar</button>
                </div>
              </div>
            </div>
          </div>
        </form> 
      </div>
    </div>
  </div>

  <script>
    function calcular(){
      try{
        var precio = parseFloat(document.querySelector("#precio").value) || 0,
        cantidad = parseFloat(document.querySelector("#cantidad").value) || 0;

        document.querySelector("#total").value = precio * cantidad;
      }catch(e){
      }
    }

    document.addEventListener("DOMContentLoaded", () =>{
      let idventa = '';
      const modal = new bootstrap.Modal(document.querySelector("#modal-actualizar"));
      const btA = document.querySelector("#actualizar");
      const btRegistrarD = document.querySelector("#registrarDeV");
      const selecttipo = document.querySelector("#tipo");
      const selectcompro = document.querySelector("#comprobante");
      const selectcliente = document.querySelector("#cliente");
      const Exportar = document.querySelector("#exportar");
      // modal
      const mdturno = document.querySelector("#md-turno");
      const mdTplato  = document.querySelector("#md-tipoP");
      //select
      const selectPlatp = document.querySelector("#tipoP");
      const table = document.querySelector("#tabla-venta");
      const cuerpo = table.querySelector("tbody");
      const lienzo1 = document.querySelector("#grafico1");
      const lienzo2 = document.querySelector("#grafico2");
      const btregistrar = document.querySelector("#registrar1");
      const selecturno = document.querySelector("#turno");
      const selectadmi = document.querySelector("#admi");
      const plato = document.querySelector("#plato");
      const btAcualizar2 = document.querySelector("#actualizarG2");

      // graficos
      const graficoBarras = new Chart(lienzo1, {
        type: 'bar',
        data: {
          labels: [],
          datasets: [
            {
              backgroundColor: ['#F0DA97','#9DEDDF','#A69DED','#9DEDDF'],
              label: 'Tipo de platos',
              data: [],
            }
          ]
        }
      });

      function renderGrafico(coleccion = []){
        let etiquetas = [];
        let datos = [];

        coleccion.forEach(element => {
          etiquetas.push(element.tipo);
          datos.push(element.Total);

          const tagL = document.createElement("li");
          tagL.innerHTML = `${element.tipo}: <strong>${element.Total}</strong>`;
          
        });

        graficoBarras.data.labels = etiquetas;
        graficoBarras.data.datasets[0].data = datos;
        graficoBarras.update();
      }

      function loadData(){
        const parametros = new URLSearchParams();
        parametros.append("operacion", "grafico1");

        fetch(`../controller/grafico.controller.php`,{
          method: 'POST',
          body: parametros
        })
        .then(respuesta => respuesta.json())
        .then(datos => {
          renderGrafico(datos);
        });
      }

      const graficoDona = new Chart(lienzo2, {
        type: 'pie',
        data: {
          labels: [],
          datasets: [
            {
              backgroundColor: ['#2E86C1','#A69DED'],
              label: 'Turnos',
              data: [],
            }
          ]
        }
      });
    
      function renderGrafico2 (coleccio=[]){
        let etiqueta = [];
        let dato = [];
        coleccio.forEach(element => {
          etiqueta.push(element.turno);
          dato.push(element.Total);

          const tagLI = document.createElement("li");
          tagLI.innerHTML = `${element.turno}: <strong>${element.Total}</strong>`;
          
        });

        graficoDona.data.labels = etiqueta;
        graficoDona.data.datasets[0].data = dato;
        graficoDona.update();
      }

      function loadData1(){
        const parametros = new URLSearchParams();
        parametros.append("operacion", "Grafico2");

        fetch(`../controller/grafico.controller.php`,{
          method: 'POST',
          body: parametros
        })
        .then(respuesta => respuesta.json())
        .then(datos => {
          renderGrafico2(datos);
        });
      }
      // crud de ventas
      cuerpo.addEventListener("click", (event) => {
        if(event.target.classList[0] === 'eliminar'){
          if(confirm("estas seguro de eliminar")){
            idventa = parseInt(event.target.dataset.idventa);

            const parametros = new URLSearchParams();
            parametros.append("operacion","eliminar");
            parametros.append("idventa", idventa);

            fetch("../controller/detalleV.controller.php",{
              method: 'POST',
              body: parametros
            })
            .then(response => response.json())
            .then(datos => {
              if(datos.status){
                listarVentas();
              }else{
                alert(datos.message);
              }
            });

          }
        }
      });

      cuerpo.addEventListener("click", (event) => {
        if(event.target.classList[0] === 'editar'){
          idventa = parseInt(event.target.dataset.idventa);

          const parametros = new URLSearchParams();
          parametros.append("operacion","obtener");
          parametros.append("idventa", idventa);

          fetch("../controller/detalleV.controller.php", {
            method: 'POST',
            body: parametros
          })
          .then(response => response.json())
          .then(datos => {
            document.querySelector("#md-turno").value = datos.idturno;
            document.querySelector("#md-mesa").value = datos.numMesa;
            document.querySelector("#md-tipoP").value = datos.idTplato;
            document.querySelector("#md-plato").value = datos.plato;
            modal.toggle();
          });
        }

      });

      function updates(){
        if(confirm("Estas seguero de actualizar")){
          const parametros = new URLSearchParams();
          parametros.append("operacion","actualizar");

          parametros.append("idventa", idventa);
          parametros.append("idturno", document.querySelector("#md-turno").value);
          parametros.append("idTplato", document.querySelector("#md-tipoP").value);
          parametros.append("numMesa", document.querySelector("#md-mesa").value);
          parametros.append("plato", document.querySelector("#md-plato").value);

          fetch("../controller/detalleV.controller.php", {
            method: 'POST',
            body: parametros
          })
          .then(response => response.json())
          .then(datos => {
            if(datos.status){
              listarVentas();
              modal.toggle();
            }else{
              alert(datos.message);
            }
          });
        }
      }
      
      function registrarV(){
        if(confirm("esta seguro de guardar")){
          const parametros = new URLSearchParams();
          parametros.append("operacion", "registrarV");

          parametros.append("idturno", document.querySelector("#turno").value);
          parametros.append("idadmi", document.querySelector("#admi").value);
          parametros.append("numMesa", document.querySelector("#mesa").value);
          parametros.append("idTplato", document.querySelector("#tipoP").value);
          parametros.append("plato", document.querySelector("#plato").value);

          fetch("../controller/Ventas.controller.php" ,{
            method: 'POST',
            body: parametros
          })
          .then(response => response.json())
          .then(datos => {
            if(datos.status){
              listarVentas();
              document.querySelector("#formulario-Venta").reset();
              document.querySelector("#turno").focus();
            }else{
              alert(datos.message);
            }
          })
        }
      }

      function registrarDetalle(){
        if(confirm("estas seguro de guardar?")){
          const parametros = new URLSearchParams();
          parametros.append("operacion","registrarDE");

          parametros.append("idventa", document.querySelector("#venta").value);
          parametros.append("idclientes", document.querySelector("#cliente").value);
          parametros.append("PrecioUni", document.querySelector("#precio").value);
          parametros.append("cantidad", document.querySelector("#cantidad").value);
          parametros.append("precioTotal", document.querySelector("#total").value);
          parametros.append("idtipopago", document.querySelector("#tipo").value);
          parametros.append("idcomprobante", document.querySelector("#comprobante").value);

          fetch("../controller/detalleV.controller.php" ,{
            method:'POST',
            body: parametros
          })
          .then(respuesta => respuesta.json())
          .then(datos => {
            console.log(datos);
            if(datos.status){
              document.querySelector("#formulario-Dventa").reset();
              document.querySelector("#venta").focus();
            }
          })
        }
      }

      function listarTurno (){
        const parametros = new URLSearchParams();
        parametros.append("operacion","listarturno");

        fetch("../controller/Ventas.controller.php", {
          method: 'POST',
          body: parametros
        })
        .then(response => response.json())
        .then(datos => {
          selecturno.innerHTML = "<option value=''>Seleccione</option>";
          datos.forEach(element => {
            let opcion = `
              <option value='${element.idturno}'>${element.turno}</option> 
            `;
            selecturno.innerHTML += opcion;
          });
        });
      }
      
      function listarMdTurno (){
        const parametros = new URLSearchParams();
        parametros.append("operacion","listarturno");

        fetch("../controller/Ventas.controller.php", {
          method: 'POST',
          body: parametros
        })
        .then(response => response.json())
        .then(datos => {
          mdturno.innerHTML = "<option value=''>Seleccione</option>";
          datos.forEach(element => {
            let opcion = `
              <option value='${element.idturno}'>${element.turno}</option> 
            `;
            mdturno.innerHTML += opcion;
          });
        });
      }
      
      function listarMdPlato(){
        const parametros = new URLSearchParams();
        parametros.append("operacion","listarPlato");

        fetch("../controller/Ventas.controller.php", {
          method: 'POST',
          body: parametros
        })
        .then(response => response.json())
        .then(datos => {
          mdTplato.innerHTML = "<option value=''>Seleccione</option>";
          datos.forEach(element => {
            let platos = `
              <option value='${element.idTplato}'>${element.tipo}</option> 
            `;
            mdTplato.innerHTML += platos;
          });
        });
      }

      function listarAdmi (){
        const parametros = new URLSearchParams();
        parametros.append("operacion","listarAdmi");

        fetch("../controller/Ventas.controller.php", {
          method: 'POST',
          body: parametros
        })
        .then(response => response.json())
        .then(datos => {
          selectadmi.innerHTML = "<option value=''>Seleccione</option>";
          datos.forEach(element => {
            let admi = `
              <option value='${element.idadmi}'>${element.nombreusu}</option> 
            `;
            selectadmi.innerHTML += admi;
          });
        });
      }
      
      function listarPlato (){
        const parametros = new URLSearchParams();
        parametros.append("operacion","listarPlato");

        fetch("../controller/Ventas.controller.php", {
          method: 'POST',
          body: parametros
        })
        .then(response => response.json())
        .then(datos => {
          selectPlatp.innerHTML = "<option value=''>Seleccione</option>";
          datos.forEach(element => {
            let platos = `
              <option value='${element.idTplato}'>${element.tipo}</option> 
            `;
            selectPlatp.innerHTML += platos;
          });
        });
      }

      function listarCliente (){
        const parametros = new URLSearchParams();
        parametros.append("operacion","listarCliente");

        fetch("../controller/Ventas.controller.php", {
          method: 'POST',
          body: parametros
        })
        .then(response => response.json())
        .then(datos => {
          selectcliente.innerHTML = "<option value=''>Seleccione</option>";
          datos.forEach(element => {
            let opcion3 = `
              <option value='${element.idclientes}'>${element.nombres}${element.apellidos}</option> 
            `;
            selectcliente.innerHTML += opcion3;
          });
        });
      }

      function listarclientemd(){
        const parametros = new URLSearchParams();
        parametros.append("operacion","listarCliente");

        fetch("../controller/Ventas.controller.php", {
          method: 'POST',
          body: parametros
        })
        .then(response => response.json())
        .then(datos => {
          selectcliente.innerHTML = "<option value=''>Seleccione</option>";
          datos.forEach(element => {
            let opcion3 = `
              <option value='${element.idclientes}'>${element.nombres}${element.apellidos}</option> 
            `;
            selectcliente.innerHTML += opcion3;
          });
        });
      }

      function listarPago(){
        const parametros = new URLSearchParams();
        parametros.append("operacion","listarPago");

        fetch("../controller/Ventas.controller.php", {
          method: 'POST',
          body: parametros
        })
        .then(response => response.json())
        .then(datos => {
          selecttipo.innerHTML = "<option value=''>Seleccione</option>";
          datos.forEach(element => {
            let pago = `
              <option value='${element.idtipopago}'>${element.Tipopago}</option> 
            `;
            selecttipo.innerHTML += pago;
          });
        });
      }

      function listarCompro (){
        const parametros = new URLSearchParams();
        parametros.append("operacion","listarCompro");

        fetch("../controller/Ventas.controller.php", {
          method: 'POST',
          body: parametros
        })
        .then(response => response.json())
        .then(datos => {
          selectcompro.innerHTML = "<option value=''>Seleccione</option>";
          datos.forEach(element => {
            let compro = `
              <option value='${element.idcomprobante}'>${element.comprobante}</option> 
            `;
            selectcompro.innerHTML += compro;
          });
        });
      }
      
      function listarVentas(){
        const parametros = new URLSearchParams();
        parametros.append("operacion", "listarVenta")

        fetch("../controller/Ventas.controller.php", {
          method : "POST",
          body:parametros
        })
        .then(response => response.json())
        .then(datos => {
          cuerpo.innerHTML = ``;
          datos.forEach(element => {
            const Vopcion1 = `
              <tr>
                <td>${element.idventa}</td>
                <td>${element.turno}</td>
                <td>${element.nombreusu}</td>
                <td>${element.numMesa}</td>
                <td>${element.tipo}</td>
                <td>${element.plato}</td>
                <td>
                  <a href='#' class='eliminar' data-idventa='${element.idventa}'>Quitar</a>
                  <a href='#' class='editar' data-idventa='${element.idventa}'>Editar</a>  
                </td>
              </tr>`
              ;
            cuerpo.innerHTML +=Vopcion1;
          });
        });
      }
      //reportes
      function PDF(){
        const parametros = new URLSearchParams();
        parametros.append("operacion", "listarVenta");
        window.open(`../reports/ventas.report.php?${parametros}`,'_blank');
      }

      //eventos
      btA.addEventListener("click", updates);
      btAcualizar2.addEventListener("click", loadData1);
      btAcualizar2.addEventListener("click", loadData);
      btregistrar.addEventListener("click", registrarV);
      btRegistrarD.addEventListener("click", registrarDetalle);

      Exportar.addEventListener("click", PDF);

      listarMdTurno();
      listarMdPlato();
      listarVentas();
      listarPlato();
      listarCliente();
      listarCompro();
      listarPago();
      listarAdmi();
      listarTurno();
    });
  </script>
  
</body>
</html>