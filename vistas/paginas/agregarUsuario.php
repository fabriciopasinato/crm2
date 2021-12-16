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
  $usuarios=ControladorFormularios::ctrSelecionarAsesor(null, null);
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
 <h2>Agregar Usuario</h2>
 <div class="container">
  <form action="#" method="post" id="contact_form">
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">Usuario:</label>
      <input type="text" placeholder="Usuario" name="usuario" id="telephone_input" required class="form-control">
    </div>
    <div class="form-group col-md-6">
      <label for="name">Contraseña:</label>
      <input type="text" placeholder="Contraseña" name="contrasena" id="telephone_input" required class="form-control">
    </div>
    <div class="form-group col-md-6">
      <label for="subject">Privilegio:</label>
      <select placeholder="Subject line" name="privilegio" id="subject_input" required class="form-control">
        <option>Privilegio</option>
        <option value="1">ACE</option>
        <option value="2">RRHH</option>
        <option value="3">valores,ampm, agro</option>
        <option value="0">Superadmin</option>
      </select>
   </div>
   <div class="form-group col-md-6">
    <label for="subject">Asesor:</label>
    <select placeholder="Subject line" name="id_asesor" id="subject_input" required class="form-control">
      <option>Asesor</option>
     <option value="0">Admin</option>
     <?php foreach ($usuarios as $key => $value): ?>
      <option value="<?php echo$value["id"]; ?>"><?php echo$value["nombre"]." ".$value["apellido"] ; ?></option>
    <?php endforeach ?>
  </select>
</div>
<div class="form-group col-md-6">
      <label for="subject">Privilegio administrativo:</label>
      <select placeholder="Subject line" name="privadmin" id="subject_input" required class="form-control">
        <option value="0">normal</option>
        <option value="1">delegada area</option>
        <option value="2">administracion (fer)</option>
        <option value="3">dueño (pablo)</option>
        <option value="4">liquidador de area </option>
      </select>
   </div>
   <div class="form-group col-md-6">
    <label for="subject">Back office turismo:</label>
    <select placeholder="Subject line" name="backturismo" id="subject_input" required class="form-control">
     <option value="0">No</option>
     <option value="1">Si</option>

  </select>
</div>
<div class="submit">
  <input type="submit" value="Registrar" id="form_button" class="btn btn-danger"/>
</div>
</div>
</form>
</div>
<?php 
  $registro=ControladorFormularios::ctrRegistroUsuario();
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