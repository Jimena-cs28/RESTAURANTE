<?php
session_start();
if (!isset($_SESSION['login']) || !$_SESSION['login']['status']){
  header("Location:../");
  
}
$datoID = json_encode($_SESSION['login']);
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
        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modal-registrar-venta" type="button">Registrar Venta</button>
        <button class="btn btn-dark" id="actualizar">Actualizar grafico</button>
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
        <canvas id="grafico2">rrrrrrrr</canvas>
      </div>
    </div>
  </div>
  <div class="mt-3">
    <div class="row">
      <div class="col-md-6">
        <canvas id="grafico1">hhhh</canvas>
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
        <form action="" autocomplete="off" id="formulario-Venta-registro">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <label for="r-mesa" class="form-label ">Mesa</label>
                <select name="r-mesa"class="form-control" id="r-mesa">
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

  <!-- registrar de venta -->
  <div class="modal fade" id="modal-registrar-deventa" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitleId">Registrar Detalle venta: </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="" autocomplete="off" id="formulario-Venta-detalle">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <label for="d-mesa" class="form-label ">Mesa</label>
                <input type="text" name="" id="d-mesa" disabled>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="d-categoria" class="form-label">Categoria</label>
                <select name="" id="d-catego" class="form-select">
                  
                </select>
              </div>
              <div class="col-md-6">
                <label for="d-mesa" class="form-label">Menu</label>
                <select name="d-menu"class="form-select" id="d-menu">
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="d-preciouni" class="form-label">Precio unitario</label>
                <input type="text" id="d-preciouni" class="form-control" disabled>
              </div>
              <div class="col-md-6">
                <label for="d-cantidad" class="form-label">Cantidad</label>
                <input type="text" id="d-cantidad" class="form-control">
              </div>              
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="d-total" class="form-label">total</label>
                <input type="number" id="d-total" class="form-control">
              </div>
            </div>
            <div class="row">
            <button type="button" class="btn btn-primary mt-3" id="d-venta">Guardar</button>
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

    document.addEventListener("DOMContentLoaded", () =>{
      let idventa = '';
      const modal = new bootstrap.Modal(document.querySelector("#modal-actualizar-venta"));
      const modal2 = new bootstrap.Modal(document.querySelector("#modal-registrar-deventa"));

      
      const lienzo = document.getElementById("grafico2");
      const btActualizar = document.querySelector("#actualizar")
      const selectcliente = document.querySelector("#cliente");
      const selectCategor = document.querySelector("#d-catego");
      const selectMenu = document.querySelector("#d-menu");
      const precio = document.querySelector("#d-preciouni");
      const cantidad = document.querySelector("#d-cantidad");
      const total = document.querySelector("#d-total");

      const table2 = document.querySelector("#resumenventa");
      const cuerpoD = table2.querySelector("tbody");
      const table = document.querySelector("#tabla-venta");
      const cuerpo = table.querySelector("tbody");

      const selectmesa = document.querySelector("#md-mesa");
      const d_mesa = document.querySelector("#d-mesa");
      const t_venta = document.querySelector("#t-venta");
      const r_venta = document.querySelector("#r-venta");
      const d_venta = document.querySelector("#d-venta");

      const graficoBarras = new Chart(lienzo, {
        type: 'pie',
        data: {
          label: [],
          datasets: [
            {
              label: 'Tipo de platos',
              backgroundColor: ['#FF5733','#ED92F4','#92E6F4'],
              data: []
            }
          ]
        }
      });

      function renderGrafico(coleccion=[]){
        let etiqueta = [];
        let datos = [];
        coleccion.forEach(element => {
          etiqueta.push(element.categoria);
          datos.push(element.Total);
        });
        graficoBarras.data.labels = etiqueta;
        graficoBarras.data.datasets[0].data = datos;
        graficoBarras.update();
      }

      function loadGrafico(){
        const parametros = new URLSearchParams();
        parametros.append("operacion","grafico1");

        fetch(`../controller/grafico.controller.php`,{
          method: 'POST',
          body: parametros
        })
        .then(respuesta => respuesta.json())
        .then(datos => {
          renderGrafico(datos);
        })
      }


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

      cuerpo.addEventListener("click", (event) => {
        if(event.target.classList[0] === 'registrar'){
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
              d_mesa.value = datos.numMesa;
              
              d_venta.addEventListener("click", registrarDetalle);
              modal2.toggle();
            })  
        }
      })

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
        const respuesta = <?php echo $datoID;?>;
        const idusuario = respuesta.idusuario;
        if(confirm("esta seguro de guardar")){
          const parametros = new URLSearchParams();
          parametros.append("operacion", "registrarV");
          parametros.append("idusuario", parseInt(idusuario));
          parametros.append("numMesa", document.querySelector("#r-mesa").value);

          fetch("../controller/Ventas.controller.php" ,{
            method: 'POST',
            body: parametros
          })
          .then(response => response.json())
          .then(datos => {
            if(datos.status){
              listarVentas();
              document.querySelector("#formulario-Venta-registro").reset();
            }
          })
        }
      }

      function registrarDetalle(){
        if(confirm("estas seguro de guardar?")){
          const parametros = new URLSearchParams();
          parametros.append("operacion","registrarDE");
          parametros.append("idventa", idventa);
          parametros.append("cantidad", cantidad.value);
          parametros.append("idmenu", selectMenu.value);
          parametros.append("total", total.value);

          fetch("../controller/detalleV.controller.php" ,{
            method:'POST',
            body: parametros
          })
          .then(respuesta => respuesta.json())
          .then(datos => {
            console.log(datos);
            if(datos.status){
              alert("Datos guardados correctamente")
              document.querySelector("#formulario-Venta-detalle").reset();
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

      function listarCate(){
        const parametros = new URLSearchParams();
        parametros.append("operacion","listarCate");

        fetch("../controller/Ventas.controller.php", {
          method: 'POST',
          body: parametros
        })
        .then(response => response.json())
        .then(datos => {
          selectCategor.innerHTML = "<option value=''>Seleccione</option>";
          datos.forEach(element => {
            let copcion3 = `
              <option value='${element.idcategoria}'>${element.categoria}</option> 
            `;
            selectCategor.innerHTML += copcion3;
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
          console.log(datos);
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
                  <a href='#' type='button' class='registrar' data-idventa='${element.idventa}'>Registrar</a>
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
          if(datos){
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
          }else{
            table2.reset();
          }
          
        });
      }

      function listarMenu(){
        const parametros = new URLSearchParams();
        parametros.append("operacion", "listarMenu");
        parametros.append("idcat", selectCategor.value);
        fetch("../controller/Ventas.controller.php", {
          method : 'POST',
          body:parametros
        })
        .then(response => response.json())
        .then(datos => {
          selectMenu.innerHTML = "<option value=''>Seleccione</option>"
          datos.forEach(element => {
            let copcion4 = `
              <option value='${element.idmenu}'>${element.menu}</option> 
            `;
            selectMenu.innerHTML += copcion4;  
          });
           
        });
      }
      
      function datosmenu(){
        const parametros = new URLSearchParams();
        parametros.append("operacion", "datosmenu");
        parametros.append("idmenu", selectMenu.value);
        fetch("../controller/Ventas.controller.php", {
          method : 'POST',
          body:parametros
        })
        .then(response => response.json())
        .then(datos => {
          console.log(datos);
          datos.forEach(element => {
            precio.value = element.precio; 
          });
        });
      }

      listarVentas();
      listardeVentas();
      listarCliente();
      listarCate();
      btActualizar.addEventListener("click",loadGrafico);
      r_venta.addEventListener("click", registrarV);
      selectCategor.addEventListener("change", listarMenu);
      selectMenu.addEventListener("change", datosmenu);
    });
  </script>
  
</body>
</html>