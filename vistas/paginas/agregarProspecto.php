<?php 
if(isset($_SESSION["validarIngreso"])){
  if($_SESSION["validarIngreso"]!="ok"){
    echo '<script>window.location ="index.php?pag=agregarProspecto";</script>';
    return;
  }
}else{
  echo '<script>window.location ="index.php?pag=login";</script>';
  return;
}
 ?>
 <?php 
if(isset($_GET["id"])){
  $valor=$_GET["id"];
  }
 ?>
 <?php  
  $usuarios=ControladorFormularios::ctrSelecionarUnegocio(null, null);
  $servicios=ControladorFormularios::ctrSelecionarServicios(null, null);
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
 
 ?><br>
 <br><h2>Añadir nuevo prospecto de cliente</h2><hr class="container">
 <div class="form-group col-md-4 container">
   <label for="inputState">Persona:</label>
   <select  name="persona" id="slect" class="form-control">
    <option value="fisica">Fisica</option>
    <option value="juridica">Juridica</option>
 </select>

</div>
 <script type="text/javascript">
  $(document).ready(function() {
    $("#slect").on("change", function() {
      var valor = $("#slect").val();
      if (valor === "fisica" ) {
        $('#sacado').removeClass("ocul");
        $('#sacado2').removeClass("ocul");
        document.getElementById("personax").value = "fisica";
          document.getElementById("apellido").value = "";
      } else {
                  // deshabilitamos
                  $('#sacado2').addClass("ocul");
          $('#sacado').addClass("ocul");
          document.getElementById("personax").value = "juridica";
          document.getElementById("apellido").value = "-";
                }
              });
  });
</script>
    
    <style type="text/css">
      .ocul{
        display: none;
      }
    </style>
 <div class="container">
  <form enctype="multipart/form-data" method="post">
    <input type="hidden" name="persona"  id="personax" value="fisica">  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre:</label>
      <input type="text" class="form-control" id="inputEmail4" name="nombre">
    </div>
    <div class="form-group col-md-6" id="sacado">
      <label for="inputPassword4">Apellido:</label>
      <input type="text" class="form-control" id="apellido" name="apellido">
    </div>
  
  <div class="form-group col-md-2">
    <label for="inputAddress2">Telefono:</label>
    <input type="number" class="form-control" id="inputAddress2" name="telefono">
  </div>
   <div class="form-group col-md-4">
      <label for="inputCity">Email:</label>
      <input type="email" class="form-control" id="inputCity" name="mail">
    </div>
    
    <div class="form-group col-md-6">
      <label for="inputZip">Localidad:</label>
      <input type="text" class="form-control" id="inputZip" name="localidad">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Actividad laboral:</label>
      <input type="text" class="form-control" id="inputEmail4" name="actividadlaboral">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Observaciones:</label>
      <textarea type="text" class="form-control" id="inputPassword4" name="observacion"></textarea>
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">Fecha del proximo contacto:</label>
      <input type="date" class="form-control" id="inputPassword4" name="datecontacto">
    </div> 
  </div>
    <input type="hidden" name="id_asesor" value="<?php echo $valor; ?>">
  <button type="submit" class="btn btn-danger">Registrar</button>
</form>
</div>
  <?php
  
 	$registro=ControladorFormularios::ctrRegistroProspecto();
    $registro=ControladorFormularios::ctrRegistroCitaProspecto();
 	if ($registro=="ok") {
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
 ?>
</div>
<style type="text/css">
 h2{
      text-align: center;
    }
  body{
    background-image: url(style/img/hexagono.png)!important;
  }
</style>
