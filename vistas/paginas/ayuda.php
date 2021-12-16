<?php 
if(isset($_SESSION["validarIngreso"])){
  if($_SESSION["validarIngreso"]!="ok"  ){
    echo '<script>window.location ="index.php?pag=ayuda";</script>';
    return;
  }
}else{
  echo '<script>window.location ="index.php?pag=login";</script>';
  return;
}
 ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php 
 include "modulosVarios/header.php";
 
 ?>
 <br>
 <br><center>
     <a target="_blank" href="http://208.113.128.115/index.php?r=space%2Fspace&cguid=93b21092-6a9e-496a-9674-3056eb56c737">
     <img src="style/img/am.png" style="width: 50vh;" alt="Logo AmericaManagemen">
     </a>
 </center>
 <hr style="width: 60%;">
 <div class="container">
  <form method="post">
    <input type="hidden" name="persona"  id="personax">  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre:</label>
      <input type="text" class="form-control" id="inputEmail4" name="nombre">
    </div>
    <div class="form-group col-md-6" id="sacado">
      <label for="inputPassword4">Apellido:</label>
      <input type="text" class="form-control" id="apellido" name="apellido">
    </div>
   <div class="form-group col-md-4">
      <label for="inputCity">Email:</label>
      <input type="email" class="form-control" id="inputCity" name="mail">
    </div>

    <div class="form-group col-md-4">
      <label for="inputEmail4">Asunto de solicitud:</label>
      <input type="text" class="form-control" id="inputEmail4" name="asunto">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Receptor:</label>
      <select class="form-control"  name="receptor">
          <option value="direccion@grupo-america.com">direccion@grupo-america.com</option>
          <option value="sistemas@grupo-america.com">sistemas@grupo-america.com</option>
          <option value="comunicacion@grupo-america.com">comunicacion@grupo-america.com</option>
          <option value="legales@grupo-america.com">legales@grupo-america.com</option>
          <option value="capitalhumano@grupo-america.com">capitalhumano@grupo-america.com</option>
          <option value="procesos@grupo-america.com">procesos@grupo-america.com</option>
          <option value="deptoGrafico@grupo-america.com">deptoGrafico@grupo-america.com</option>
      </select>
    </div>
    <div class="form-group col-md-12">
      <label for="inputPassword4">Mensaje:</label>
      <textarea type="text" class="form-control" id="inputPassword4" name="mensaje" rows="3"></textarea>
    </div>
  <button type="submit" class="btn btn-danger" name="enviar">Enviar</button>
</form>
</div>
<hr>
<div class="container context"><center>
    Utiliza este formulario para realizar una solicitud y contactar a las diferentes areas de America Management.<br>
    Para tener un orden en las solicitudes, <b>por favor evitemos el uso de otro medio NO oficial.</b></center>
</div>
 <?php 
require "PHPMailer/Exception.php";
require "PHPMailer/PHPMailer.php";
require "PHPMailer/SMTP.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if (isset($_POST['enviar'])) {

        $asunto=$_POST['asunto'];
		$mensaje=$_POST['mensaje'];
		$email=$_POST['mail'];
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$telefono=$_POST['telefono'];
		$receptor=$_POST['receptor'];
        $oMail= new PHPMailer();
        $oMail->isSMTP();
        $oMail->Host="smtp.flockmail.com";
        $oMail->Port=465;
        $oMail->SMTPSecure="ssl";
        $oMail->SMTPAuth=true;
        $oMail->Username="admin@grupo-america.com";
        $oMail->Password="GA-admin2021";
        $oMail->setFrom("admin@grupo-america.com","desde crm");
        $oMail->addAddress($receptor,"desde crm");
        $oMail->Subject=$asunto;
        $oMail->msgHTML("Mensaje: ".$mensaje." email:".$email. " nombre: ".$nombre." ". $apellido. " telefono: ". $telefono);

        if($oMail->send()){
            echo '<div class="alert alert-success">Mensaje Enviado</div>';
        }else{
            echo '<div class="alert alert-danger">Mensaje No enviado</div>';
        }
    
}
?>   



<style type="text/css">
 h2{
      text-align: center;
    }
  body{
    background-image: url(style/img/hexagono.png)!important;
  }
  .context{
      background-color: rgb(178,19,40, 0.5);
      border-radius: 5px;
      color:white;
  }
</style>