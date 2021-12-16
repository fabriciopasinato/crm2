<?php 
header("Pragma: public");
header("Expires: 0");
$filename = "clientes.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
$cliente=ControladorFormularios::ctrSelecionarCliente(null, null);
?>
<table>
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Dni</th>
      <th>Cuit</th>
      <th>Domicilio</th>
      <th>Localidad</th>
      <th>Telefono</th>
      <th>Email</th>
      <th>Actividad laboral</th>
      <th>Persona</th>
      <th>Observacion</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($cliente as $key => $value): ?>
      <tr>
        <td><?php echo$value["nombre"]; ?></td>
        <td><?php echo$value["apellido"]; ?></td>
        <td><?php echo$value["dni"]; ?></td>
        <td><?php echo$value["cuit"]; ?></td>
        <td><?php echo$value["domicilio"]; ?></td>
        <td><?php echo$value["localidad"]; ?></td>
        <td><?php echo$value["telefono"]; ?></td>
        <td><?php echo$value["mail"]; ?></td>
        <td><?php echo$value["actividadlaboral"]; ?></td>
        <td><?php echo$value["persona"]; ?></td>
        <td><?php echo$value["observacion"]; ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>