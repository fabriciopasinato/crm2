
<?php 
  if(isset($_SESSION["validarIngreso"])){
  if($_SESSION["validarIngreso"]!="ok"){
    echo '<script>window.location ="index.php?pag=panelclienteId";</script>';
    return;
  }
  }else{
  echo '<script>window.location ="index.php?pag=login";</script>';
  return;
  }
?>
<?php include "modulosVarios/header.php"; ?>
<?php
if(isset($_GET["id"])){
  $id_Ase=$_GET["id"];
}
  $usuarios=ControladorFormularios::ctrSelecionarCliente("id_asesor", $id_Ase);
?>

<!-- Grilla -->
<link rel="stylesheet" type="text/css" href="style/panelcliente.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <div style="margin-top:10px;">
  <center>
    <table class="table table-striped table-responsive" style="text-transform: capitalize; max-width: 1200px;" id="userTable">
      <thead>
        <tr style="background-color: #384045; color: #ffff;">
          <th>Nombre</th>
          <th>Apellido</th>
          <th>D.N.I.</th>
          <th>C.U.I.T.</th>
          <th>Localidad</th>
          <th>Telefono</th>
          <th>Mas info.</th>
          <th>Accion</th>
          <th>Transacciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($usuarios as $key => $value): ?>
          <tr>
            <td><?php echo$value["nombre"]; ?></td>
            <td><?php echo$value["apellido"]; ?></td>
            <td><?php echo$value["dni"]; ?></td>
            <td><?php echo$value["cuit"]; ?></td>
            <td><?php echo$value["localidad"]; ?></td>
            <td><?php echo$value["telefono"]; ?></td>
            <td><a href="index.php?pag=perfilcliente&id=<?php echo$value["id"]; ?>&as=<?php echo $valor;?>" class="btn btn-success">Perfil</</td>
              <td>
                <div class="btn-group">
                  <a href="index.php?pag=editar_cliente&id=<?php echo$value["id"]; ?>" class="btn btn-secondary">Editar</a>
                  <form method="post">
                    <input type="hidden" name="eliminarMarca" value="<?php echo$value["id"]; ?>">
                    <button type="submit" class="btn" style="background-color:#b21328; color:white;">Eliminar</button>
                    <?php
                    $eliminar= new ControladorFormularios();
                    $eliminar->ctrEliminarCliente();
                    ?>
                  </form>
                </div>
              </td>
              <td>
                <div class="btn-group">
                  <a href="index.php?pag=operaciones&id=<?php echo$value["id"]; ?>&as=<?php echo $valor;?>" class="btn btn-secondary">Operaciones</a>
                  <a href="index.php?pag=historialOperaciones&id=<?php echo$value["id"]; ?>" class="btn btn-warning">Historial</a>
                </div>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
      </center>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
    	$(document).ready(function() {
    		$('#userTable').DataTable();
    	});
    </script>