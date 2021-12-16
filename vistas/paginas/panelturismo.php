<?php 
if(isset($_SESSION["validarIngreso"])){
  if($_SESSION["validarIngreso"]!="ok"){
    echo '<script>window.location ="index.php?pag=panelturismo";</script>';
    return;
  }
}else{
  echo '<script>window.location ="index.php?pag=login";</script>';
  return;
}
?>
<?php 
		if(isset($_SESSION["id_asesor"])){
			$respuesta = ControladorFormularios::ctrSelecionaUsuario("id_asesor", $_SESSION["id_asesor"]);
			if($respuesta["privturismo"]==0){
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
<br><br>
<center><a href="https://ampm.com.ar/#/" target="_black"><img style="width: 360px;" src="style/img/logoAMPMh.png" alt="Logo AMPM"></a></center>
<hr class="container"><br>
<?php $operaciones=ControladorFormularios::ctrSelecionarServiciosxCliente("id_unegocio", 14);?>

  <div style="margin-top:10px;">
      <center>
    <table class="table table-striped table-responsive display" style="text-transform: capitalize; max-width: 1200px;" id="userTable">
      <thead>
        <tr style="background-color: #384045; color: #ffff;">
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Fecha</th>
          <th>C.U.I.T.</th>
          <th>Localidad</th>
          <th>Telefono</th>
          <th>Email</th>
          <th>Mas info.</th>
          <th>Accion</th>
          <th>Transacciones</th>

        </tr>
      </thead>
      <tbody>
        <?php foreach ($operaciones as $key => $value): 
        $cliente=ControladorFormularios::ctrSelecionarClientefetch("id", $value["id_cliente"]);
        ?>
          <tr>
            <td><?php echo $cliente["nombre"]; ?></td>
            <td><?php echo $cliente["apellido"]; ?></td>
            <td><?php echo $cliente["fecha"]; ?></td>
            <td><?php echo $cliente["cuit"]; ?></td>
            <td><?php echo $cliente["localidad"]; ?></td>
            <td><?php echo $cliente["telefono"]; ?></td>
            <td><?php echo $cliente["mail"]; ?></td>
            <td><a href="index.php?pag=perfilcliente&id=<?php echo $cliente["id"]; ?>&as=<?php echo $valor;?>" class="btn btn-success">Perfil</</td>
              <td>
            <a  href="index.php?pag=backoficeturismo&id=<?php echo $cliente["id"]; ?>"  class="btn btn-secondary">Cuenta</a>
              </td>
              <td>
                <div class="btn-group">
                  <a target="_blank" href="index.php?pag=operaciones&id=<?php echo $cliente["id"]; ?>&as=<?php echo $valor;?>"  class="btn btn-secondary">Operaciones</a>
                  <a href="index.php?pag=historialOperaciones&id=<?php echo $cliente["id"]; ?>" class="btn btn-warning" style="margin-left: 5px;">Historial</a>
                </div>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
    </center>
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