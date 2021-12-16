<?php 
if(isset($_SESSION["validarIngreso"])){
  if($_SESSION["validarIngreso"]!="ok"){
    echo '<script>window.location ="index.php?pag=editar_cliente";</script>';
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

  $usuario=ControladorFormularios::ctrSelecionarGastosUni($item, $valor);
  }
  $unegocios=ControladorFormularios::ctrSelecionarUnegocio(null, null);
  
  if(isset($_GET["ess"])){
    $estadoo=$_GET["ess"];
  }else{
    $estadoo=1;
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
 if($usuario['estado']==15){?>
<br><br><h2>Revicion de Gasto:</h2><hr class="container">

<?php      
 }else{
 ?>
 <br><br><h2>Editar Gastos:</h2><hr class="container">
 <?php      
 }
 ?>
<div class="container">
  <form enctype="multipart/form-data" method="post">
    <input type="hidden" name="persona"  id="personax">  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Titulo:</label>
      <input type="text" class="form-control" id="inputEmail4" name="titulo" value="<?php echo $usuario['titulo']; ?>">
    </div>
    <div class="form-group col-md-6" id="sacado">
      <label for="inputPassword4">Descripcion:</label>
      <input type="text" class="form-control" id="apellido" name="descripcion" value="<?php echo $usuario['descripcion']; ?>">
    </div>
  
  <div class="form-group col-md-4" id="sacado2">
    <label for="inputAddress">Precio:</label>
    <input type="number" class="form-control" id="dni" name="precio" value="<?php echo $usuario['precio']; ?>">
  </div>
  <div class="form-group col-md-4" id="sacado2">
    <label for="inputAddress">Unidad Gastadora:</label>
     <select class="form-control" name="u_negocioGastadora"  required>
         <option value="<?php echo $usuario['u_negocioGastadora']; ?>">
             <?php $uneg=ControladorFormularios::ctrSelecionarUnegocioUni("id", $usuario['u_negocioGastadora']);
             echo $uneg["nombre"];
             ?>
             </option>
                   <?php foreach ($unegocios as $key => $value): ?>
                    <option value="<?php echo$value["id"]; ?>"><?php echo$value["nombre"]; ?></option>
                  <?php endforeach ?>
                  <option>AV/AA</option>
                   <option>Empleados GA</option>
                </select>
  </div>
  <div class="form-group col-md-4" id="sacado2">
    <label for="inputAddress">Forma de pago:</label>
    <select class="form-control"  name="forma_de_pago">
        <option value="<?php echo $usuario['forma_de_pago']; ?>"><?php echo $usuario['forma_de_pago']; ?></option>
        <option value="Efectivo">Efectivo</option>
        <option value="Transferencia">Transferencia</option>
        <option value="Débito automático">Débito automático</option>
        <option value="TC corporativa">TC corporativa</option>
        <option value="E-cheq">E-cheq</option>
    </select>
  </div>
  
    <div class="form-group col-md-12">
      <label for="inputCity">Observacion:</label>
      <input type="text" class="form-control" id="inputCity" name="observacioncompra" value="<?php echo $usuario['observacioncompra']; ?>">
    </div>

    
<input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
<input type="hidden" name="estado" value="<?php echo $estadoo; ?>">
  </div>
    
  <button type="submit" class="btn btn-danger">Actualizar</button>
</form>
</div>

  <?php
 
  $actualizar = ControladorFormularios::ctrActualizarGastos();
  if($actualizar == "ok"){
       echo '<div class="alert alert-success">Gasto actualizado</div> <script>setTimeout(function(){window.location="index.php?pag=agregarGastos";},1000);</script>';
    
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