<?php 
header("Pragma: public");
header("Expires: 0");
$filename = "serviciosxclientes.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
$serxcliente=ControladorFormularios::ctrSelecionarServiciosxCliente(null, null);
?>
<table>
	<thead>
		<tr>
			<th>Cliente</th>
			<th>Servicio</th>
			<th>Unidad de negocio</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($serxcliente as $key => $value): ?>
			<tr>
				<td><?php
				$client=ControladorFormularios::ctrSelecionarClientefetch("id", $value["id_cliente"]);
				 echo $client["nombre"] ." ". $client["apellido"]; 
				?></td>
				<td><?php
				$servicio=ControladorFormularios::ctrSelecionarServiciosunitario("id", $value["id_servicio"]);
				 echo$servicio["nombre"]; 
				?></td>
				<td><?php
				$unegocio=ControladorFormularios::ctrSelecionarUnegocioUni("id", $value["id_unegocio"]);
				 echo$unegocio["nombre"]; 
				?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>