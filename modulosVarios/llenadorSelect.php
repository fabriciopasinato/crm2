<?php 
$conexion=mysqli_connect('localhost','crm','Dep-sistemas2021','root');
$continente=$_POST['continente'];

	$sql="SELECT id,
			 nombre
		from servicio 
		where id_unidadnegocio='$continente'";

	$result=mysqli_query($conexion,$sql);

	$cadena="<label>Servicio:</label> 
			<select id='lista2' name='id_servicio' id='id_servicio' class='form-control'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
	}

	echo  $cadena."</select>";
	

?>