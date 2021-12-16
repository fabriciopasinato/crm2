<?php 
if(isset($_SESSION["validarIngreso"])){
  if($_SESSION["validarIngreso"]!="ok"){
    echo '<script>window.location ="index.php?pag=editarProspecto";</script>';
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
  $usuario=ControladorFormularios::ctrSelecionarProspectoUni($item, $valor);
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
 
 
 <br>
<br><h2>Editar prospecto</h2>
<hr class="width:60% !important; container">
 <div class="container">
  <form  method="post">
    
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre:</label>
      <input type="text" class="form-control" id="inputEmail4" name="nombre" value="<?php echo $usuario['nombre']; ?>">
    </div>
    <div class="form-group col-md-6" id="sacado">
      <label for="inputPassword4">Apellido:</label>
      <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $usuario['apellido']; ?>">
    </div>
  
  <div class="form-group col-md-4">
    <label for="inputAddress2">Telefono:</label>
    <input type="number" class="form-control" id="inputAddress2" name="telefono" value="<?php echo $usuario['telefono']; ?>">
  </div>
   <div class="form-group col-md-4">
      <label for="inputCity">Email:</label>
      <input type="email" class="form-control" id="inputCity" name="mail" value="<?php echo $usuario['mail']; ?>">
    </div>
    
    <div class="form-group col-md-4">
      <label for="inputZip">Localidad:</label>
      <input type="text" class="form-control" id="inputZip" name="localidad" value="<?php echo $usuario['localidad']; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Actividad laboral:</label>
      <input type="text" class="form-control" id="inputEmail4" name="actividadlaboral" value="<?php echo $usuario['actividadlaboral']; ?>">
    </div>
        <div class="form-group col-md-6">
      <label for="inputEmail4">Persona:</label>
      <input type="text" class="form-control" id="inputEmail4" name="persona" value="<?php echo $usuario['persona']; ?>">
    </div>
    <div class="form-group col-md">
      <label for="inputPassword4">Observaciones:</label>
      <textarea type="text" class="form-control" id="inputPassword4" name="observacion" value="<?php echo $usuario['observacion']; ?>"></textarea>
    </div> 
  </div>
    <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
  <button type="submit" class="btn btn-danger">Actualizar</button>
</form>
</div>


  <?php
  $actualizar = ControladorFormularios::ctrActualizarProspecto();
  if($actualizar == "ok"){
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