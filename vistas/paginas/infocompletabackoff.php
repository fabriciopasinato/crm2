<?php 
if(isset($_SESSION["validarIngreso"])){
  if($_SESSION["validarIngreso"]!="ok"){
    echo '<script>window.location ="index.php?pag=infocompletabackoff";</script>';
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
  $cliente=ControladorFormularios::ctrSelecionarRegistrobackofTurismofetch($item, $valor);
  }
 ?>
<?php 
		if(isset($_SESSION["id_asesor"])){
			$respuesta = ControladorFormularios::ctrSelecionaUsuario("id", $_SESSION["id_asesor"]);
			if($respuesta["privturismo"]==1){
				echo '<script>window.history.back();</script>';
			}
		}else{
			echo '<script>window.location ="index.php?pag=login";</script>';
		}

	?>
<?php 
include "modulosVarios/header.php";

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://kit.fontawesome.com/b6b59e7f17.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<br><br><br>
<div class="container">
    <a href="index.php?pag=perfilcliente&id=<?php echo $cliente['id_cliente']; ?>" class="btn btn-danger" style="margin-top:1%;">Perfil</a>
<form enctype="multipart/form-data" >
  <div class="form-row">
      <div class="form-group col-md-4">
      <label for="inputEmail4">Propuesta:</label>
      <input type="text" class="form-control" id="inputEmail4" name="propuesta" value="<?php echo $cliente['propuesta']; ?>" readonly="readonly">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Destino:</label>
      <input type="text" class="form-control" id="inputEmail4" name="destino" value="<?php echo $cliente['destino']; ?>" readonly="readonly">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Operador:</label>
      <input type="text" class="form-control" id="inputEmail4" name="destino" value="<?php echo $cliente['operador']; ?>" readonly="readonly">
    </div>
    <div class="form-group col-md-3">
      <label for="inputEmail4">Referencia:</label>
      <input type="text" class="form-control" id="inputEmail4" name="referencia" value="<?php echo $cliente['referencia']; ?>" readonly="readonly">
    </div>
    <div class="form-group col-md-3" id="sacado">
      <label for="inputPassword4">Forma de pago:</label>
        <input type="text" class="form-control" id="inputAddress2" name="mefectivo" value="<?php echo $cliente['formadepago']; ?>" readonly="readonly">
    </div>
    
    <div class="form-group col-md-3" id="sacado">
      <label for="inputPassword4">Fecha compra:</label>
        <input type="text" class="form-control" id="inputAddress2" name="mefectivo" value="<?php echo $cliente['fechacompra']; ?>" readonly="readonly">
    </div>
    <div class="form-group col-md-3" id="sacado">
      <label for="inputPassword4">Fecha viaje:</label>
        <input type="text" class="form-control" id="inputAddress2" name="mefectivo" value="<?php echo $cliente['fechaviaje']; ?>" readonly="readonly">
    </div>
  
  
  <div class="form-group col-md-3">
    <label for="inputAddress2">Monto efectivo:</label>
    <input type="number" class="form-control" id="inputAddress2" name="mefectivo" value="<?php echo $cliente['mtefectivo']; ?>" readonly="readonly">
  </div>
  <div class="form-group col-md-3">
    <label for="inputAddress2">Monto transferencia:</label>
    <input type="number" class="form-control" id="inputAddress2" name="mtransferencia" value="<?php echo $cliente['mttransferencia']; ?>" readonly="readonly">
  </div>
  <div class="form-group col-md-3">
    <label for="inputAddress2">Monto de checke :</label>
    <input type="number" class="form-control" id="inputAddress2" name="mchecke" value="<?php echo $cliente['mtchecke']; ?>" readonly="readonly">
  </div>
  <div class="form-group col-md-3">
    <label for="inputAddress2">Monto t.credito:</label>
    <input type="number" class="form-control" id="inputAddress2" name="mtcredito" value="<?php echo $cliente['mttcredito']; ?>" readonly="readonly">
  </div>
  <div class="form-group col-md-3">
    <label for="inputAddress2">Monto d.bancario:</label>
    <input type="number" class="form-control" id="inputAddress2" name="mdbancario" value="<?php echo $cliente['mtdbancario']; ?>" readonly="readonly">
  </div>
  <div class="form-group col-md-3">
    <label for="inputAddress2">Monto f. agencia:</label>
    <input type="number" class="form-control" id="inputAddress2" name="mfagencia" value="<?php echo $cliente['mtfagencia']; ?>" readonly="readonly">
  </div>
  <div class="form-group col-md-3">
    <label for="inputAddress2">Monto f. operador:</label>
    <input type="number" class="form-control" id="inputAddress2" name="mfoperador" value="<?php echo $cliente['mtfoperador']; ?>" readonly="readonly">
  </div>

  
  <div class="form-group col-md-3">
    <label for="inputAddress2">Monto final:</label>
    <input type="number" class="form-control" id="inputAddress2" name="montofinal" value="<?php echo $cliente['montofinal']; ?>" readonly="readonly">
  </div>
   <div class="form-group col-md-4">
      <label for="inputCity">Cuota:</label>
      <input type="number" class="form-control" id="inputCity" name="cuota" value="<?php echo $cliente['cuota']; ?>" readonly="readonly">
    </div>
  
    <div class="form-group col-md-4">
      <label for="inputCity">Seña proveedor:</label>
      <input type="text" class="form-control" id="inputCity" name="señaproveedor" value="<?php echo $cliente['senaproveedor']; ?>" readonly="readonly">
    </div>
    <div class="form-group col-md-4">
      <label for="inputCity">Total proveedor:</label>
      <input type="text" class="form-control" id="inputCity" name="totalproveedor" value="<?php echo $cliente['totalproveedor']; ?>" readonly="readonly">
    </div>
    <div class="form-group col-md-12">
      <label for="inputCity">Datos extra:</label>
      <input type="text" class="form-control" id="inputCity" name="datosacompanante" value="<?php echo $cliente['datosacompanante']; ?>" readonly="readonly">
    </div>
   
  </div>
    <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">

</form>

</div>
<style type="text/css">
  body{
    background-image: url(style/img/hexagono.png);
  }
</style>
