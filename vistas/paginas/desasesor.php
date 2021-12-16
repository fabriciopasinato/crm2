<?php 
header("Pragma: public");
header("Expires: 0");
$filename = "asesores.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
$asesor=ControladorFormularios::ctrSelecionarAsesor(null, null);
?>
<table>
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Dni</th>
			<th>Correo</th>
			<th>Telefono</th>
			<th>Puesto Laboral</th>
			<th>Domicilio</th>
			<th>Localidad</th>
			<th>Cuit</th>
			<th>Id unidad de negocio</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($asesor as $key => $value): ?>
			<tr>
				<td><?php echo$value["nombre"]; ?></td>
				<td><?php echo$value["apellido"]; ?></td>
				<td><?php echo$value["dni"]; ?></td>
				<td><?php echo$value["correo"]; ?></td>
				<td><?php echo$value["telefono"]; ?></td>
				<td><?php echo$value["puestolaboral"]; ?></td>
				<td><?php echo$value["domicilio"]; ?></td>
				<td><?php echo$value["localidad"]; ?></td>
				<td><?php echo$value["cuit"]; ?></td>
				<td><?php
				$unegocio=ControladorFormularios::ctrSelecionarUnegocioUni("id", $value["id_u_negocio"]);
				 echo$unegocio["nombre"]; 
				?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>