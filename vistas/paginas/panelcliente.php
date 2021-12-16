<?php 
  if(isset($_SESSION["validarIngreso"])){
  if($_SESSION["validarIngreso"]!="ok"){
    echo '<script>window.location ="index.php?pag=panelcliente";</script>';
    return;
  }
  }else{
  echo '<script>window.location ="index.php?pag=login";</script>';
  return;
  }
?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
<?php include "modulosVarios/header.php"; ?>


<?php
if(isset($_GET["id"])){
  $valor=$_GET["id"];
}
  $usuarios=ControladorFormularios::ctrSelecionarCliente(null, null);
?>

<br><br>
<h1 style="text-align:center; font-size: 32px;">Panel de clientes:</h1><hr class="container">
<!-- Grilla -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <div class="container">
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
            <td><?php echo$value["fecha"]; ?></td>
            <td><?php echo$value["cuit"]; ?></td>
            <td><?php echo$value["localidad"]; ?></td>
            <td><?php echo$value["telefono"]; ?></td>
            <td><a href="index.php?pag=perfilcliente&id=<?php echo$value["id"]; ?>&as=<?php echo $valor;?>" class="btn btn-success">Perfil</</td>
              <td>
                <div class="btn-group">
                  <a href="index.php?pag=editar_cliente&id=<?php echo$value["id"]; ?>" class="btn btn-secondary">Editar</a>
                  <form method="post">
                    <input type="hidden" name="eliminarMarca" value="<?php echo$value["id"]; ?>">
                    <button type="submit" class="btn" style="background-color:#b21328; color:white; margin-left: 5px;">Eliminar</button>
                    <?php
                    $eliminar= new ControladorFormularios();
                    $eliminar->ctrEliminarCliente();
                    ?>
                  </form>
                </div>
              </td>
              <td>
                <div class="btn-group">
                  <a  href="index.php?pag=operaciones&id=<?php echo$value["id"]; ?>&as=<?php echo $valor;?>"  class="btn btn-secondary">Operaciones</a>
                  <a href="index.php?pag=historialOperaciones&id=<?php echo$value["id"]; ?>" class="btn btn-warning" style="margin-left: 5px;">Historial</a>
                </div>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
      </center>
    </div>
    </div>
    <br><br><br>
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