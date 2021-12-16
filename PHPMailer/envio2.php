<?php

$Nombre = $_POST['nombre'].$_POST['apellidos'];
$Email = $_POST['correo'];
$Mensaje = $_POST['comentario'];
$pr1=$_POST['pr1'];
$pr2=$_POST['pr2'];
$archivo = $_FILES['archivo'];

require "Exception.php";
require "PHPMailer.php";
require "SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer();
$mail->From     = $Email;
$mail->FromName = $Nombre;
$mail->AddAddress("hola@hola.com");
$mail->WordWrap = 50; 
$mail->IsHTML(true);     
$mail->Subject  =  "Contacto";
$mail->Body     =  "Nombre: $Nombre \n<br />".    
"Email: $Email \n<br />".    
"Mensaje: $Mensaje \n<br />".
"pr1: $pr1 \n<br />".
"pr2: $pr2 \n<br />";
$mail->AddAttachment($archivo['tmp_name'], $archivo['name']);
$mail->IsSMTP(); 
$mail->Host = "ssl://c1740415.ferozo.com:465"; //Servidor de Salida.
$mail->SMTPAuth = true; 
$mail->Username = "hola@hola.com"; //Correo Electrónico
$mail->Password = "dfgdfgd"; //Contraseña
if ($mail->Send())
   echo '<div class="alert alert-success">Accion realizada</div> <script>setTimeout(function(){window.location="../index.php?pag=inicio";},50);</script>';
else
   echo '<div class="alert alert-success">Accion realizada</div> <script>setTimeout(function(){window.location="../index.php?pag=inicio";},50);</script>';
?>