<?php 
if(isset($_SESSION["validarIngreso"])){
  if($_SESSION["validarIngreso"]!="ok"){
    echo '<script>window.location ="index.php?pag=backoficeturismo";</script>';
    return;
  }
}else{
  echo '<script>window.location ="index.php?pag=login";</script>';
  return;
}
?>
 <?php 
if(isset($_GET["id"])){
  $item="id_cliente";
  $valor=$_GET["id"];
  $cliente=ControladorFormularios::ctrSelecionarRegistrobackofTurismo($item, $valor);
  }
 ?>
<?php 
		if(isset($_SESSION["id_asesor"])){
			$respuesta = ControladorFormularios::ctrSelecionaUsuario("id", $_SESSION["id_asesor"]);
			if($respuesta["privturismo"]==1){
				echo '<script>setTimeout(function(){window.location="index.php?pag=login";},500);</script>';
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
<div class="container" style="margin-top:1%;">
<!-- Button to Open the Modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
  Cargar Viaje
</button>
</div>
<div class="container">
  <div style="margin-top:10px;">
  <center>
    <table class="table table-striped table-responsive display" style="text-transform: capitalize; max-width: 1200px;" id="userTable">
      <thead>
        <tr style="background-color: #384045; color: #ffff;">
            <th>Destino</th>
          <th>Monto capital</th>
          <th>Monto final</th>
          <th>Dinero a cobrar</th>
          <th>Cuota</th>
          <th>Seña proveedor</th>
          <th>Total proveedor</th>
          <th>Total a pagar</th>
          <th>Fecha compra</th>
          <th>Fecha del viaje</th>
            <th>Actualizar</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($cliente as $key => $value):  ?>
          <tr>
        
            <td><?php echo $value["destino"]; ?></td>
            <td><?php  $totentrega=$value["mtefectivo"]+$value["mttransferencia"]+$value["mtchecke"]+$value["mttcredito"]+$value["mtdbancario"]+$value["mtfoperador"]+$value["mtfagencia"]; 
            echo $totentrega;?></td>
            <td><?php echo $value["montofinal"]; ?></td>
            <td><?php echo $value["montofinal"]-$totentrega; ?></td>
            <td><?php echo $value["cuota"]; ?></td>
            <td><?php echo $value["senaproveedor"]; ?></td>
            <td><?php echo $value["totalproveedor"]; ?></td>
            <td><?php echo $value["totalproveedor"]-$value["senaproveedor"]; ?></td>
            <td><?php echo $value["fechaviaje"]; ?></td>
            <td><?php echo $value["fechacompra"]; ?></td>
           
              <td>
                <div class="btn-group">
                  <a  href="index.php?pag=actualizarbackoffice&id=<?php echo $value["id"]; ?>"  class="btn btn-secondary">Actualizar</a>
                  <a  href="index.php?pag=infocompletabackoff&id=<?php echo $value["id"]; ?>"  class="btn btn-danger">Info</a>
                </div>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
      </center>
    </div>
    </div>
    
<style type="text/css">
  body{
    background-image: url(style/img/hexagono.png);
  }
</style>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#userTable').DataTable();
      });
    </script>
    
    <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Agregar viaje</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form enctype="multipart/form-data" method="post">
  <div class="form-row">
      <div class="form-group col-md-6">
      <label for="inputEmail4">Propuesta:</label>
      <input type="text" class="form-control" id="inputEmail4" name="propuesta">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Destino:</label>
      <input type="text" class="form-control" id="inputEmail4" name="destino">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Referencia:</label>
      <input type="text" class="form-control" id="inputEmail4" name="referencia">
    </div>
    <div class="form-group col-md-4" id="sacado">
      <label for="inputPassword4">Forma de pago:</label>
      <select class="form-control"  name="formadepago">
            <option value="efectivo">Efectivo</option>
            <option value="transferencia">Transferencia</option>
            <option value="depositobancario">Deposito bancario</option>
            <option value="tarjetadecrédito">Tarjeta de crédito</option>
            <option value="tcfinanciamientooperador">Tc/financiamiento operador</option>
            <option value="tcfinanciamientoagencia">Tc/financiamiento agencia</option>
            <option value="checke">Checke</option>
        </select>
    </div>
  
  <div class="form-group col-md-4" id="sacado2">
    <label for="inputAddress">Operador:</label>
    <select class="form-control"  name="operador">
       <option value="ola">ola</option>
       <option value="toselli">toselli</option> 
       <option value="rosarigasino">rosarigasino</option> 
       <option value="marittima">marittima</option> 
       <option value="abanico">abanico</option> 
       <option value="be the world">be the world</option> 
       <option value="freeway">freeway</option> 
       <option value="delfos">delfos</option> 
       <option value="low cost">low cost</option> 
       <option value="viajando">viajando</option> 
       <option value="rapel">rapel</option> 
       <option value="julia">julia</option> 
       <option value="logan">logan</option> 
       <option value="contrastes">contrastes</option> 
       <option value="assist card">assist card</option> 
       <option value="intermac">intermac</option> 
       <option value="piamonte">piamonte</option> 
       <option value="turisteca">turisteca</option> 
       <option value="kmb">kmb</option> 
    </select>
  </div>
  <div class="form-group col-md-3">
    <label for="inputAddress2">Monto efectivo:</label>
    <input type="number" class="form-control" id="inputAddress2" name="mefectivo">
  </div>
  <div class="form-group col-md-3">
    <label for="inputAddress2">Monto transferencia:</label>
    <input type="number" class="form-control" id="inputAddress2" name="mtransferencia">
  </div>
  <div class="form-group col-md-3">
    <label for="inputAddress2">Monto de checke :</label>
    <input type="number" class="form-control" id="inputAddress2" name="mchecke">
  </div>
  <div class="form-group col-md-3">
    <label for="inputAddress2">Monto t.credito:</label>
    <input type="number" class="form-control" id="inputAddress2" name="mtcredito">
  </div>
  <div class="form-group col-md-3">
    <label for="inputAddress2">Monto d.bancario:</label>
    <input type="number" class="form-control" id="inputAddress2" name="mdbancario">
  </div>
  <div class="form-group col-md-3">
    <label for="inputAddress2">Monto f. agencia:</label>
    <input type="number" class="form-control" id="inputAddress2" name="mfagencia">
  </div>
  <div class="form-group col-md-3">
    <label for="inputAddress2">Monto f. operador:</label>
    <input type="number" class="form-control" id="inputAddress2" name="mfoperador">
  </div>
  <div class="form-group col-md-3">
    <label for="inputAddress2">Monto final/total:</label>
    <input type="number" class="form-control" id="inputAddress2" name="montofinal">
  </div>
   <div class="form-group col-md-4">
      <label for="inputCity">Cuota:</label>
      <input type="number" class="form-control" id="inputCity" name="cuota">
    </div>
  
    <div class="form-group col-md-4">
      <label for="inputCity">Seña proveedor:</label>
      <input type="text" class="form-control" id="inputCity" name="señaproveedor">
    </div>
    <div class="form-group col-md-4">
      <label for="inputCity">Total proveedor:</label>
      <input type="text" class="form-control" id="inputCity" name="totalproveedor">
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">Fecha compra:</label>
      <input type="date" class="form-control" id="inputCity" name="fechacompra">
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">Fecha viaje:</label>
      <input type="date" class="form-control" id="inputCity" name="fechaviaje">
    </div>
   <div class="form-group col-md-12">
      <label for="inputCity">Datos pasajeros:</label>
      <input type="text" class="form-control" id="inputCity" name="datospasajeros">
    </div>
  </div>
    <input type="hidden" name="id_cliente" value="<?php echo $valor; ?>">
  <button type="submit" class="btn btn-primary">Registrar</button>
</form>
<?php
 	$registro=ControladorFormularios::ctrRegistroBackofficeturismo();
 	if ($registro=="ok") {echo '<div class="alert alert-success">Viaje cargado</div> <script>setTimeout(function(){window.location="index.php?pag=panelturismo";},500);</script>';}
 	    
 	    ?>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>