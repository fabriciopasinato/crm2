<?php 
if(isset($_SESSION["validarIngreso"])){
  if($_SESSION["validarIngreso"]!="perfil2"){
    echo '<script>window.location ="index.php?pag=agregarAsesor";</script>';
    return;
  }
}else{
  echo '<script>window.location ="index.php?pag=login";</script>';
  return;
}
 ?>
<?php  
  $usuarios=ControladorFormularios::ctrSelecionarUnegocio(null, null);
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
 include "modulosVarios/headeradmin.php";
 ?>
 <h2>Registro de empleado</h2>
<div class="container">
  <form action="#" method="post" id="contact_form">
    <div class="form-row">
    <div class="form-group col-md-4">
      <label for="name">Nombre:</label>
      <input type="text" placeholder="Mi nombre " name="nombre" id="name_input" required class="form-control">
    </div>
    <div class="form-group col-md-4">
      <label for="text">Apellido:</label>
      <input type="text" placeholder="Mi apellido" name="apellido" id="email_input" required class="form-control">
    </div>
    <div class="form-group col-md-4">
      <label for="name">Dni:</label>
      <input type="text" placeholder="Mi dni" name="dni" id="name_input" required class="form-control">
    </div>
    <div class="form-group col-md-3">
      <label for="text">Cuit:</label>
      <input type="text" placeholder="Mi cuit" name="cuil" id="email_input" required class="form-control">
    </div>
    <div class="form-group col-md-3">
      <label for="name">Domicilio:</label>
      <input type="text" placeholder="Mi domicilio" name="domicilio" id="name_input" required class="form-control">
    </div>
    <div class="form-group col-md-3">
      <label for="text">Localidad:</label>
      <input type="text" placeholder="Mi localidad" name="localidad" id="email_input" required class="form-control">
    </div>
    <div class="form-group col-md-3">
      <label for="name">Telefono:</label>
      <input type="text" placeholder="Mi telefono" name="atelefono" id="name_input" required class="form-control">
    </div>
    <div class="form-group col-md-4">
      <label for="email">Email:</label>
      <input type="email" placeholder="Mi e-mail" name="mail" id="email_input" required class="form-control">
    </div>
    <div class="form-group col-md-4">
      <label for="name">Puesto laboral:</label>
      <input type="text" placeholder="Puesto laboral" name="puestolaboral" id="telephone_input" required class="form-control">
    </div>
    <div class="form-group col-md-4">
      <label for="subject">Unidad de negocio:</label>
      <select placeholder="Subject line" name="unidaddenegocio" id="subject_input" required class="form-control">
       <?php foreach ($usuarios as $key => $value): ?>
        <option value="<?php echo$value["id"]; ?>"><?php echo$value["nombre"]; ?></option>
      <?php endforeach ?>
    </select>
    </div>
    <div class="submit">
      <input type="submit" value="Registrar" id="form_button" class="btn btn-danger"/>
    </div>
    </div>
  </form>
  </div>
  <?php 
  $registro=ControladorFormularios::ctrRegistroAsesor();
  if ($registro=="ok") {
    echo '<script>
      if(window.history.replaceState){
        window.history.replaceState(null, null, window.location.href);
      }
      </script>';
      echo '<div class="alert alert-success">Registro correcto</div>';
      echo '<script>setTimeout(function(){window.location="index.php?pag=inicioadmin";},500);</script>';
    }
 ?>
</div>

<style type="text/css">
 h2{
      text-align: center;
    }
  body{
    background-image: url(style/img/hexagono.png) !important;
  }
</style>