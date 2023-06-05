<div class="nav">
  <img class="img" src="../img/logo.PNG" alt="logo">
  <h1 class="text-md text-center">Reporte General de Ventas</h1>
</div>

<table class="table table-border mt-3">
  <colgroup>
    <col style='width: 10%'>
    <col style='width: 20%'>
    <col style='width: 15%'>
    <col style='width: 10%'>
    <col style='width: 20%'>
    <col style='width: 20%'>
  </colgroup>
  <thead>
    <tr>
      <th>Id</th>
      <th>turno</th>
      <th>usuario</th>
      <th>Mesa</th>
      <th>Categoria</th>
      <th>Menu</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($datos as $registro): ?>
        <tr>
          <td><?=$registro['idventa']?></td>
          <td><?=$registro['turno']?></td>
          <td><?=$registro['nombreusu']?></td>
          <td><?=$registro['numMesa']?></td>
          <td><?=$registro['tipo']?></td>
          <td><?=$registro['plato']?></td>
        </tr>
    <?php endforeach?>
  </tbody>
</table>