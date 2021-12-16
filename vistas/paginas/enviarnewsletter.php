
<?php 
if(isset($_SESSION["validarIngreso"])){
  if($_SESSION["validarIngreso"]!="ok"){
    echo '<script>window.location ="index.php?pag=enviarnewsletter";</script>';
    return;
  }
}else{
  echo '<script>window.location ="index.php?pag=login";</script>';
  return;
}
?>
<?php 
if(isset($_GET["user"])){
  $item="id";
  $valor=$_GET["user"];
  if ($valor==0) {
    $usuarios=ControladorFormularios::ctrSelecionarNewsletter(null, null);
    $mail="mail";
  }elseif ($valor==1) {
    $usuarios=ControladorFormularios::ctrSelecionarCliente(null, null);
    $mail="mail";
  }elseif ($valor==2) {
    $usuarios=ControladorFormularios::ctrSelecionarAsesor(null, null);
    $mail="correo";
  }else{
    echo "<h1>Error variable get, Comunicate con soporte</h1>";
  }
  
}
?>

<script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://kit.fontawesome.com/b6b59e7f17.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
include "modulosVarios/header.php";
?>
<div class="container-fluid">
  <div class="container py-5">
    <div class="d-flex justify-content-center">
      <form class="p-5 " method="post" >
        <div class="form-group">
          <label for="text">Asunto:</label>
          <input type="text" class="form-control" placeholder="Asunto" id="iasunto" name="asunto" required="">
        </div>
        <div class="form-group">
          <label for="comment">Mensaje:</label>
          <textarea type="text" name="mytextarea" id="txtDescripcion"></textarea> 

        </div>
        <button type="submit" name="enviar" style="margin-left: 15%; width: 70%; border-radius:10px; background-color:#141414; color:#fff;">Enviar</button>
      </form>
    </div>
  </div>
</div>
<script>
  ClassicEditor
  .create( document.querySelector( '#txtDescripcion' ) )
  .catch( error => {
    console.error( error );
  } );
</script>
<?php 
require "PHPMailer/Exception.php";
require "PHPMailer/PHPMailer.php";
require "PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if (isset($_POST['enviar'])) {
  if(!empty($_POST['asunto']) && !empty($_POST['mytextarea'])){
    $asunto=$_POST['asunto'];
    $mensaje=$_POST['mytextarea'];

    foreach ($usuarios as $key => $value): 
      $oMail= new PHPMailer();
      $oMail->isSMTP();
      $oMail->Host="smtp.flockmail.com";
      $oMail->Port=465;
      $oMail->SMTPSecure="ssl";
      $oMail->SMTPAuth=true;
      $oMail->Username="admin@grupo-america.com";
      $oMail->Password="GA-admin2021";
      $oMail->setFrom("admin@grupo-america.com","Grupo America");
      $oMail->addAddress($value[$mail],$value['nombre']);
      $oMail->Subject=$asunto;
      $oMail->msgHTML($mensaje);

      if($oMail->send()){
        echo '<div class="alert alert-success">Mensaje Enviado</div>';
        echo '<div class="alert alert-success">Accion realizada</div> <script>setTimeout(function(){window.location="index.php?pag=inicio";},500);</script>';
      }else{
        echo '<div class="alert alert-danger">Mensaje No enviado</div>';
      }
      $oMail->clearAddresses();
      $oMail->clearAttachments();
    endforeach;
  }
}
?>
<style type="text/css">
  body{
    background-image: url(style/img/hexagono.png);
  }
</style>