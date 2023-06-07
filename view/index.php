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

  <div class="container mt-3">
    <div class="row">
      <h1 class="text-center">Ventas</h1>
    </div>
    <div class="row">
      <div class="col-md-3">
        <button class="btn btn-dark" type="button">Registrar Venta</button>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 mb-5 mt-3 text-center">
        <table id="tabla-venta"class="table table-striped table-info table-bordered table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>usuario</th>
              <th>turno</th>
              <th>Mesa</th>
              <th>tipo de pago</th>
              <th>comprobante</th>
              <th>fecha de venta</th>
              <th>total</th>
              <th>Estado</th>
              <th>editar</th>
            </tr>
          </thead>
          <tbody>
    
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-md-10">
        <canvas id="grafico2"></canvas>
      </div>
    </div>
  </div>
  <div class="mt-3">
    <div class="row">
      <div class="col-md-6">
        <canvas id="grafico1"></canvas>
      </div>
      
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://kit.fontawesome.com/2652b6cfc8.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
   
  <!-- Modal Body -->
  <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
  <div class="modal fade" id="modal-actualizar-venta" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitleId">Terminar Venta: </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="" autocomplete="off" id="formulario-Venta">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <label for="admi" class="form-label ">Mesa</label>
                <input type="text" name="" id="md-mesa" disabled>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 mt-4" >
                <label for="tipoP" class="form-label">Cliente</label>
                <select name="" id="cliente" class="form-select">
                </select>
              </div>             
            </div>
            <div class="row">
              <div class="col-md-6 mt-4">
                <label for="tipo" class="form-label ">Tipo De Pago</label>
                <select name="tipo" id="md-tipo"  class="form-select">
                  <option value="">Seleccione</option>
                  <option value="Tarjeta de credito">Tarjeta de credito</option>
                  <option value="Efectivo">Efectivo</option>
                  <option value="Yape">Yape</option>
                  <option value="Plin">Plin</option>
                </select>
              </div>
              <div class="col-md-6 mt-4">
                <label for="admi" class="form-label ">comprobante</label>
                <select name="" id="md-comprobante" class="form-select">
                  <option value="">Seleccione</option>
                  <option value="Boleta">Boleta</option>
                  <option value="Factura">Factura</option>
                </select>
              </div>
            </div>
            <table class="table table-info mt-4" id="resumenventa">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Cantidad</th>
                  <th>Menú</th>
                  <th>total</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>

            <div class="row">
              <div class="col-md-6 mt-4">
                <label for="mesa" class="form-label ">Total</label>
                <input type="text" id="md-total"class="form-control" >
              </div>
            </div>
            <div class="row">
            <button type="button" class="btn btn-primary" id="t-venta">Guardar</button>
            </div>
          </div>
        </form> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
         
        </div>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="modal-registrar-venta" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitleId">Registrar Venta: </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="" autocomplete="off" id="formulario-Venta">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <label for="r-mesa" class="form-label ">Mesa</label>
                <select name=""class="form-control" id="r-mesa">
                  <option value=""></option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
              </div>
            </div>
            <div class="row">
            <button type="button" class="btn btn-primary" id="r-venta">Guardar</button>
            </div>
          </div>
        </form> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
         
        </div>
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
      const modal = new bootstrap.Modal(document.querySelector("#modal-actualizar-venta"));
      const modalRegistrarVenta = new bootstrap.Modal(document.querySelector("#modal-registrar-venta"));
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
      const table2 = document.querySelector("#resumenventa");
      const cuerpoD = table2.querySelector("tbody");
      const table = document.querySelector("#tabla-venta");
      const cuerpo = table.querySelector("tbody");
      const lienzo1 = document.querySelector("#grafico1");
      const lienzo2 = document.querySelector("#grafico2");
      const btregistrar = document.querySelector("#registrar1");
      const selectmesa = document.querySelector("#md-mesa");
      const plato = document.querySelector("#plato");
      const btAcualizar2 = document.querySelector("#actualizarG2");
      const t_venta = document.querySelector("#t-venta");
      const r_venta = document.querySelector("#r-venta");

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
          etiquetas.push(element.categoria);
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

          fetch("../controller/detalleV.controller.php",{
            method: 'POST',
            body: parametros
          })
            .then(response => response.json())
            .then(datos => {
              selectmesa.value = datos.numMesa;
              listardeVentas();
              t_venta.addEventListener("click", updates);
              modal.toggle();
            })

            
          
        }

      });

      function updates(){
        if(confirm("Estas seguero de actualizar")){
          const parametros = new URLSearchParams();
          parametros.append("operacion","actualizar");

          parametros.append("idventa", idventa);
          parametros.append("idcliente", document.querySelector("#cliente").value);
          parametros.append("tipopago", document.querySelector("#md-tipo").value);
          parametros.append("comprobante", document.querySelector("#md-comprobante").value);
          parametros.append("totalpagar", document.querySelector("#md-total").value);

          fetch("../controller/detalleV.controller.php", {
            method: 'POST',
            body: parametros
          })
          .then(response => response.json())
          .then(datos => {
            if(datos.status){
              listarVentas();
              alert("Venta terminada")
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
              <option value='${element.idpersona}'>${element.nombres}  ${element.apellidos}</option> 
            `;
            selectcliente.innerHTML += opcion3;
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
                <td>${element.nombreusuario}</td>
                <td>${element.turno}</td>
                <td>${element.numMesa}</td>
                <td>${element.tipopago}</td>
                <td>${element.comprobante}</td>
                <td>${element.fechaventa}</td>
                <td>${element.totalpagar}</td>
                <td>${element.estadomesa}</td>
                <td>
                  <a href='#' class='eliminar' data-idventa='${element.idventa}'>Quitar</a>
                  <a href='#' type='button' class='editar' data-idventa='${element.idventa}'>editar</a>  
                </td>
              </tr>`
              ;
            cuerpo.innerHTML +=Vopcion1;
          });
        });
      }

      function listardeVentas(){
        const parametros = new URLSearchParams();
          parametros.append("operacion", "listarDeVenta");
          parametros.append("idventa", idventa);
        fetch("../controller/detalleV.controller.php", {
          method : 'POST',
          body:parametros
        })
        .then(response => response.json())
        .then(datos => {
          cuerpoD.innerHTML = ``;
          datos.forEach(element => {
            const Vopcion1 = `
              <tr>
                <td>${element.iddetalleventa}</td>
                <td>${element.cantidad}</td>
                <td>${element.menu}</td>
                <td>${element.total}</td>
              </tr>`
              ;
              cuerpoD.innerHTML +=Vopcion1;
          });
        });
      }

      //reportes
      // function PDF(){
      // const parametros = new URLSearchParams();
      // parametros.append("operacion", "listarVenta");
      // window.open(`../reports/ventas.report.php?${parametros}`,'_blank');
      // }

      //eventos
      // btA.addEventListener("click", updates);
      // btAcualizar2.addEventListener("click", loadData);
      // btregistrar.addEventListener("click", registrarV);
      // btRegistrarD.addEventListener("click", registrarDetalle);

      // Exportar.addEventListener("click", PDF);

      listarVentas();
      listardeVentas();
      listarCliente();
    });
  </script>
  
</body>
</html>