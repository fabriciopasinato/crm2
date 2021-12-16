<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
<?php 
if(isset($_SESSION["validarIngreso"])){
  if($_SESSION["validarIngreso"]!="ok"){
    echo '<script>window.location ="index.php?pag=cEstadoGasto";</script>';
    return;
  }
}else{
  echo '<script>window.location ="index.php?pag=login";</script>';
  return;
}
$unegocios=ControladorFormularios::ctrSelecionarUnegocio(null, null);

if(isset($_GET["id"])){
  $id_gasto=$_GET["id"];
  $estado=$_GET["estado"];
}
$ggenerales=ControladorFormularios::ctrSelecionarGastosUni("id", $id_gasto);
include "modulosVarios/header.php";
?>
<div class="container">
<?php
if ($estado==5) {?>
  <form method="post" enctype="multipart/form-data">
    <div class="form-group col-md-12">
      <label>Fecha compra</label>
      <input type="date" name="fechacompra" class="form-control">
    </div>
    <div class="form-group col-md-12">
        <label for="inputEmail4">Documento:</label>
        <input type="file" class="form-control" id="inputEmail4" name="documento2">
    </div>
    <button name="enviar1" class="btn btn-primary" type="submit">Confirmar</button>
  </form>
  <?php
  if(isset($_POST['enviar1'])){
      $archivo=$_FILES["documento2"]["name"];
    $ruta=$_FILES["documento2"]["tmp_name"];
    $destino="style/img/documentaciongasto/".$archivo;
    copy($ruta, $destino);
    $actualizar = ControladorFormularios::ctrTrackeoGastosDocu($id_gasto, "6", "fechaCompra", $_POST['fechacompra'], $value['fechaPago'], $destino);
    echo '<script>setTimeout(function(){window.location="./?pag=agregarGastos";},500);</script>';
  }

  //primer pasaje pame
}else if($estado==1){?>
  <form method="post">
    <div class="form-group col-md-12">
      <label>Tipo de gasto</label>
      <select name="tipogasto" class="form-control">
        <option value="Marketing y Diseño">Marketing y Diseño</option>
        <option value="Sistemas">Sistemas</option>
        <option value="Operativos">Operativos</option>
        <option value="Financieros">Financieros</option>
        <option value="Administrativos">Administrativos</option>
        <option value="Capacitación">Capacitación</option>
        <option value="Refrigerio">Refrigerio</option>
        <option value="Impositivos">Impositivos</option>
        <option value="Seguros">Seguros</option>
        <option value="Turismo">Turismo</option>
        <option value="Librería">Librería</option>
        <option value="Mantenimiento">Mantenimiento</option>
        <option value="Seguridad y Alarmas">Seguridad y Alarmas</option>
        <option value="Legales">Legales</option>
        <option value="Uniformes">Uniformes</option>
        <option value="Comerciales">Comerciales</option>
        <option value="Sueldos y Obra social">Sueldos y Obra social</option>
      </select>
    </div>
    <div class="form-group col-md-12">
      <label>Confirmacion del pago:</label>
      <select name="conpa" class="form-control" id="slect">
        <option value="2">aprobado</option>
        <option value="15">rebicion</option>
        <option value="0">denegado</option>
      </select>
    </div>
    <div class="form-group col-md-12 ocul" id="observacion">
      <label>Observacion:</label>
      <input type="text" name="observacion" class="form-control">
    </div>
    <button name="enviar3" class="btn btn-primary">Confirmar</button>
  </form>

  <?php
  if(isset($_POST['enviar3'])){
    $actualizar = ControladorFormularios::ctrTrackeoGastos($id_gasto, $_POST['conpa'],"tipoGastos", $_POST['tipogasto'],  $_POST['observacion']);
    echo '<script>setTimeout(function(){window.location="./?pag=agregarGastos";},500);</script>';
  }
  //fer
}else if($estado==2){?>
  <form method="post">
    <div class="form-group col-md-12">
      <label for="subject">Empresa que paga:</label>
      <select class="form-control" name="unidadquepaga"  required>
       <?php foreach ($unegocios as $key => $values): ?>
        <option value="<?php echo$values["id"]; ?>"><?php echo$values["nombre"]; ?></option>
      <?php endforeach ?>
    </select>
  </div>
  <div class="form-group col-md-12">
    <label>Fecha de liquidación</label>
    <input type="date" name="fechadinero" class="form-control">
  </div>
  <div class="form-group col-md-12">
    <label>Confirmacion del pago:</label>
    <select name="conpa" class="form-control" id="slect">
      <option value="3">aprobado</option>
      <option value="0">denegado</option>
    </select>
  </div>
  <div class="form-group col-md-12 ocul" id="observacion">
    <label>Observacion:</label>
    <input type="text" name="observacion" class="form-control">
  </div>
  <div class="form-group col-md-12">
    <label>Confirmacion de Pablo:</label>
    <input name="conpablo"  id="slect" type="checkbox">
  </div>
  <button name="enviar" class="btn btn-primary">Confirmar</button>
</form>

<?php
if(isset($_POST['enviar'])){
  $fe=$_POST['fechadinero'];
  $con=$_POST['conpa'];
  if(isset($_POST["conpablo"])){
    $con=4;
  }
  $actualizar = ControladorFormularios::ctrTrackeoGastos2($id_gasto, $con,"u_negocioPaga", $_POST['unidadquepaga'],"fechaPago", $fe, $_POST['observacion']);
  if($con==3 or $con==4){
    $ccGasto=ControladorFormularios::ctrCCgasto($fe, $ggenerales["titulo"], $ggenerales["precio"], $ggenerales["u_negocioGastadora"]);
  }
  echo '<script>setTimeout(function(){window.location="./?pag=agregarGastos";},500);</script>';
}
    //pablo
}else if($estado==3){?>
  <form method="post">
    <div class="form-group col-md-12">
      <label>Confirmacion del pago:</label>
      <select name="conpa" class="form-control" id="slect">
        <option value="4">aprobado</option>
        <option value="0">denegado</option>
      </select>
    </div>
    <div class="form-group col-md-12 ocul" id="observacion">
      <label>Observacion:</label>
      <input type="text" name="observacion" class="form-control">
    </div>
    <button name="enviarrr" class="btn btn-primary">Confirmar</button>
  </form>
  <?php
  if(isset($_POST["enviarrr"])){
    $actualizar = ControladorFormularios::ctrTrackeoGastos($id_gasto, $_POST['conpa'],"fechaPago", $ggenerales['fechaPago'], $_POST['observacion']);
    echo '<script>setTimeout(function(){window.location="./?pag=agregarGastos";},500);</script>';
  }
  //entrega la plata
}else if($estado==4){?>
 <form method="post">
  <div class="form-group col-md-12">
    <label>Confirmacion del pago:</label>
    <select name="conpa" class="form-control" id="slect">
      <option value="5">aprobado</option>
      <option value="0">denegado</option>
    </select>
  </div>
  <div class="form-group col-md-12 ocul" id="observacion">
    <label>Observacion:</label>
    <input type="text" name="observacion" class="form-control">
  </div>
  <button name="enviar40" class="btn btn-primary">Confirmar</button>
</form>
<?php
if(isset($_POST["enviar40"])){
  $actualizar = ControladorFormularios::ctrTrackeoGastos($id_gasto, $_POST['conpa'],"fechaPago", $ggenerales['fechaPago'], $_POST['observacion']);
  echo '<script>setTimeout(function(){window.location="./?pag=agregarGastos";},500);</script>';
}
}
?>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $("#slect").on("change", function() {
      var valor = $("#slect").val();
      if (valor !== "0" ) {
        
         $("#observacion").addClass("ocul");
        
      } else {
                  // deshabilitamos
                 $("#observacion").removeClass("ocul");
                }
              });
  });
</script>
<style type="text/css">
  h2{
    text-align: center;
  }
  .ocul{
    display: none;
  }
</style>
