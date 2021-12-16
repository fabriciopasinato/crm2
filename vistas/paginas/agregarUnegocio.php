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
 <h2>Agregar Unidad de negocio</h2>
 <div class="container">
  <form action="#" method="post" id="contact_form">
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">Nombre:</label>
      <input type="text" placeholder="Nombre" name="nombre" id="name_input" required class="form-control">
    </div>
    <div class="form-group col-md-6">
      <label for="text">Descripcion:</label>
      <input type="text" placeholder="Descripcion" name="descripcion" id="email_input" required class="form-control">
    </div>
    <div class="submit">
      <input type="submit" value="Registrar" id="form_button" class="btn btn-danger"/>
    </div>
    </div>
  </form>
  </div>
  <?php 
  $registro=ControladorFormularios::ctrRegistroUnegocio();
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


<style type="text/css">
 h2{
      text-align: center;
    }
  body{
    background-image: url(style/img/hexagono.png)!important;
  }
</style>