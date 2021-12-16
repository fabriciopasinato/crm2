<?php
session_start();
$conn = new mysqli("localhost","crm","Dep-sistemas2021","root");
$idd=$_SESSION["id_asesor"];
$sql = "UPDATE notificaciones SET estado = 1 WHERE estado = 0 and id_asesor = $idd";	
$result = mysqli_query($conn, $sql);

$sql = "SELECT * FROM notificaciones WHERE id_asesor = $idd ORDER BY id DESC limit 5";
$result = mysqli_query($conn, $sql);

$response='';

while($row=mysqli_fetch_array($result)) {

	/* Formate fecha */
	$fechaOriginal = $row["fecha"];
	$fechaFormateada = date("d-m-Y", strtotime($fechaOriginal));

	$response = $response . "<div class='notification-item'>" .
	"<div class='notification-subject'>". $row["autor"] . " - <span>". $fechaFormateada . "</span> </div>" . 
	"<div class='notification-comment'>" . $row["mensaje"]  . "</div>" .
	"</div>";
}
if(!empty($response)) {
	print $response;
}


?>