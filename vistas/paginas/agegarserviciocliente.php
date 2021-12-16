<?php 
if(isset($_SESSION["validarIngreso"])){
  if($_SESSION["validarIngreso"]!="ok"){
    echo '<script>window.location ="index.php?pag=agegarserviciocliente";</script>';
    return;
  }
}else{
  echo '<script>window.location ="index.php?pag=login";</script>';
  return;
}
 ?>
 <?php  
  $usuarios=ControladorFormularios::ctrSelecionarUnegocio(null, null);
  $servicios=ControladorFormularios::ctrSelecionarServicios(null, null);
?>
<?php 
if(isset($_GET["id"])){
  $item="id_cliente";
  $valor=$_GET["id"];
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
 <br><br>
 <h2>Agregar unidad de negocio a cliente:</h2><hr class="container">
<div id="container" class="container">
  <form method="post">
      <div class="form-row">
    <div class="form-group col-md-12">
      <label for="subject">Unidad de negocio:</label>
      <select placeholder="Subject line" name="id_unegocio" id="subject_input" class="form-control" required>
        <?php foreach ($usuarios as $key => $value): ?>
          <option  value="<?php echo$value["id"]; ?>"><?php echo$value["nombre"]; ?></option>
        <?php endforeach ?>
      </select>
    </div>

    </div>
    <input type="hidden" name="id_cliente" value="<?php echo $valor; ?>">
    <div class="submit ">
      <input type="submit" value="Registrar" id="form_button" class="btn btn-danger" />
    </div>
    
  </form>
  </div>
  <?php 
  $registro=ControladorFormularios::ctrRegistroServicioCliente();
  if ($registro=="ok") {
    echo '<script>
      if(window.history.replaceState){
        window.history.replaceState(null, null, window.location.href);
      }
      </script>';
      echo '<div class="alert alert-success">Registro correcto</div>';
      echo '<script>setTimeout(function(){history.go(-2);},500);</script>';
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
