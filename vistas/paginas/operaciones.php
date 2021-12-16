<?php 
if(isset($_SESSION["validarIngreso"])){
  if($_SESSION["validarIngreso"]!="ok"){
    echo '<script>window.location ="index.php?pag=operaciones";</script>';
    return;
  }
}else{
  echo '<script>window.location ="index.php?pag=login";</script>';
  return;
}
 ?>
 <?php 
if(isset($_GET["id"])){
  $item="id";
  $valor=$_GET["id"];
  $usuario=ControladorFormularios::ctrSelecionarClientefetch($item, $valor);
  $id_asesor=$_GET["as"];
  $asesor=ControladorFormularios::ctrSelecionarAsesor(null, null);
  }
 ?>
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php 
 include "modulosVarios/header.php";
 
 ?>

  <div class="container">
  <form  method="post">
    <input type="hidden" name="persona"  id="personax">  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Titulo:</label>
      <input type="text" class="form-control" id="inputEmail4" name="titulo">
    </div>
    <div class="form-group col-md-6" id="sacado">
      <label for="inputPassword4">Descripcion:</label>
      <input type="text" class="form-control" id="apellido" name="descripcion">
    </div>
  
  <div class="form-group col-md-3" id="sacado2">
    <label for="inputAddress">Fecha:</label>
    <input type="date" class="form-control" id="dni" name="fecha">
  </div>
  <div class="form-group col-md-3 container">
   <label for="inputState">Seleccione empleado:</label>
   <select  name="id_asesor" id="id_asesor" class="form-control">
    <option value="<?php echo $id_asesor; ?>">Yo</option>
        <?php foreach ($asesor as $key => $value): ?>
        <option value='<?php echo$value["id"]; ?>'>
          <?php $nombre=ControladorFormularios::ctrSelecionarAsesoruni("id", $value["id"]); ?>
          <?php echo $nombre["nombre"]." ".$nombre["apellido"]; ?>
        </option>
        <?php endforeach ?>
 </select>
</div>
<input type="hidden" name="id_unegocio" value="<?php echo $usuario['unidadnegocio']; ?>">
<div class="form-group col-md-3 container">
   <label for="inputState">Unidad de negocio:</label>
   <select  name="id_unegocio" id="lista1" class="form-control">
    <?php $ser=ControladorFormularios::ctrSelecionarServiciosxCliente("id_cliente", $usuario['id']); ?>
        <?php foreach ($ser as $key => $value): ?>
        <option value='<?php echo$value["id_unegocio"]; ?>'>
          <?php $uninegocio=ControladorFormularios::ctrSelecionarUnegocioUni("id", $value["id_unegocio"]); ?>
          <?php echo$uninegocio["nombre"]; ?>
        </option>
        <?php endforeach ?>
 </select>
</div>
<div class="form-group col-md-3 container" id="select2lista">
  
</div>

<div class="form-group col-md-6">
      <label for="inputEmail4">Dinero de transaccion:</label>
      <input type="number" class="form-control" id="inputEmail4" name="dinerotransaccion">
    </div>
    <div class="form-group col-md-6" id="sacado">
      <label for="inputPassword4">Comision:</label>
      <input type="number" class="form-control" id="apellido" name="comision">
    </div>
     <div class="form-group col-md-2" id="sacado">
      <label for="inputPassword4">Operacion finalizada:</label>
      <input type="checkbox"  id="apellido" name="finalizacion" value="1">
    </div>
  <input type="hidden" name="id_cliente" value="<?php echo $valor; ?>">
  <button type="submit" class="btn btn-primary">Registrar</button>
</form>
</div>
  <?php
  if (isset($_POST["finalizacion"]) and $_POST["finalizacion"]==1) {
   $mensajee="Operacion realizada";
} else {
   $mensajee="Operacion a realizar";
}
/*envio de correo*/
require "PHPMailer/Exception.php";
require "PHPMailer/PHPMailer.php";
require "PHPMailer/SMTP.php";
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
if(isset($_POST["id_asesor"])){
$assuni=ControladorFormularios::ctrSelecionarAsesoruni("id", $_POST["id_asesor"]);

        $asunto="Operacion a realizar";
		$mensaje="operacion a realizar desde el crm";
        $oMail= new PHPMailer();
        $oMail->isSMTP();
        $oMail->Host="smtp.flockmail.com";
        $oMail->Port=465;
        $oMail->SMTPSecure="ssl";
        $oMail->SMTPAuth=true;
        $oMail->Username="admin@grupo-america.com";
        $oMail->Password="GA-admin2021";
        $oMail->setFrom("admin@grupo-america.com","desde crm");
        $oMail->addAddress($assuni["correo"],"desde crm tareas");
        $oMail->Subject=$asunto;
        $oMail->msgHTML($mensaje);

        if($oMail->send()){
            echo '<div class="alert alert-success">Mensaje Enviado</div>';
        }else{
            echo '<div class="alert alert-danger">Mensaje No enviado</div>';
        }
}
/* fin envio de correo*/
  if($_POST["id_asesor"]){
      $idd=$_POST["id_asesor"];
      
      
  }
  $registro=ControladorFormularios::ctrRegistroOperacion();
  if ($registro=="ok") {
      
    $notificaciones=ControladorFormularios::ctrRegistroNotificaciones($mensajee, $idd);
    if($notificaciones=="ok"){
        if(isset($_SESSION["id_asesor"])){
      $respuesta = ControladorFormularios::ctrSelecionaUsuario("id_asesor", $_SESSION["id_asesor"]);
      if($respuesta["privilegio"]==1){
        echo '<div class="alert alert-success">Cliente actualizado</div> <script>setTimeout(function(){window.location="index.php?pag=inicio";},1000);</script>';
      }else if($respuesta["privilegio"]==2){
        echo '<div class="alert alert-success">Cliente actualizado</div> <script>setTimeout(function(){window.location="index.php?pag=iniciorrhh";},1000);</script>';
      }else if($respuesta["privilegio"]==3){
        echo '<div class="alert alert-success">Cliente actualizado</div> <script>setTimeout(function(){window.location="index.php?pag=inicioempleado";},1000);</script>';
      }else if($respuesta["privilegio"]==4){
        echo '<div class="alert alert-success">Cliente actualizado</div> <script>setTimeout(function(){window.location="index.php?pag=inicioAcomercial";},1000);</script>';
      }else{
        echo '<div class="alert alert-success">Cliente actualizado</div> <script>setTimeout(function(){window.location="index.php?pag=inicioadmin";},1000);</script>';
      }
    }else{
      echo '<script>window.location ="index.php?pag=login";</script>';
    }
    }
    
    }
 ?>
</div>


<style type="text/css">
  body{
    background-image: url(style/img/hexagono.png);
  }
</style>
<script type="text/javascript">
	$(document).ready(function(){
		$('#lista1').val(1);
		recargarLista();

		$('#lista1').change(function(){
			recargarLista();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"modulosVarios/llenadorSelect.php",
			data:"continente=" + $('#lista1').val(),
			success:function(r){
				$('#select2lista').html(r);
			}
		});
	}
</script>