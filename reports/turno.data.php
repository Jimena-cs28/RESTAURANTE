
<div class="nav">
  <img class="img" src="../img/logo.PNG" alt="logo">
  <h1 class="text-md text-center">Reporte de Turnos</h1>
</div>

<table class="table table-border mt-3">
  <colgroup>
    <col style='width: 10%'>
    <col style='width: 20%'>
    <col style='width: 20%'>
    <col style='width: 15%'>
    <col style='width: 20%'>
    <col style='width: 20%'>
  </colgroup>
  <thead>
    <tr>
      <th>Id</th>
      <th>usuario</th>
      <th>tipo de pago</th>
      <th>comprobante</th>
      <th>total</th>
      <th>Mesa</th>
      <th>fecha</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($datos as $registro): ?>
        <tr>
          <td><?=$registro['idventa']?></td>
          <td><?=$registro['nombreusuario']?></td>
          <td><?=$registro['tipopago']?></td>
          <td><?=$registro['comprobante']?></td>
          <td><?=$registro['totalpagar']?></td>
          <td><?=$registro['numMesa']?></td>
          <td><?=$registro['fechaventa']?></td>
        </tr>
    <?php endforeach;?>
  </tbody>
</table>