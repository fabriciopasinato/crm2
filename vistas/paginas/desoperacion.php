<?php 
header("Pragma: public");
header("Expires: 0");
$filename = "operaciones.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

$operaciones=ControladorFormularios::ctrSelecionarOperaciones(null, null);
?>
<table>
	<thead>
		<tr>
			<th>Cliente</th>
			<th>Unidad negocio</th>
			<th>Asesor</th>
			<th>Titulo</th>
			<th>Descripcion</th>
			<th>Fecha</th>
			<th>Comision</th>
			<th>Dinero de transaccion</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($operaciones as $key => $value): ?>
			<tr>
				<td><?php
				$client=ControladorFormularios::ctrSelecionarClientefetch("id", $value["id_cliente"]);
				 echo $client["nombre"] ." ". $client["apellido"]; 
				?></td>
				<td><?php
				$unegocio=ControladorFormularios::ctrSelecionarUnegocioUni("id", $value["id_unegocio"]);
				 echo$unegocio["nombre"]; 
				?></td>
				<td><?php
				$asesor=ControladorFormularios::ctrSelecionarAsesoruni("id", $value["id_asesor"]);
				 echo $asesor["nombre"]. $asesor["apellido"]; 
				?></td>
				<td><?php echo$value["titulo"]; ?></td>
				<td><?php echo$value["descripcion"]; ?></td>
				<td><?php echo$value["fecha"]; ?></td>
				<td><?php echo$value["comision"]; ?></td>
				<td><?php echo$value["dtransaccion"]; ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>