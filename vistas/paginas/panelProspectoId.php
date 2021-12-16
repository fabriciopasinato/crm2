<?php 
  if(isset($_SESSION["validarIngreso"])){
  if($_SESSION["validarIngreso"]!="ok"){
    echo '<script>window.location ="index.php?pag=panelProspecto";</script>';
    return;
  }
  }else{
  echo '<script>window.location ="index.php?pag=login";</script>';
  return;
  }
?>


  <?php 
  if(isset($_GET["id"])){
    $item="id_asesor";
    $valor=$_GET["id"];
  }
  ?>


<?php 
include "modulosVarios/header.php";
  $usuarios=ControladorFormularios::ctrSelecionarProspecto($item, $valor);
?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
<!-- Grilla -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <center>
      <br><br>
      <div class="container">
  <h2>Prospectos de clientes:</h2>
  <hr class="width: 60% !important;">
  </div>
  </center>
  <div style="margin-top:10px;" class="container">
  <center>
    <table class="table table-striped table-responsive display"  id="userTable">
      <thead>
        <tr style="background-color: #384045; color: #ffff;">
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Localidad</th>
          <th>Telefono</th>
          <th>Email</th>
          <th>Persona</th>    
          <th>Act. laboral</th>
          <th>Accion</th>
          <th>Accion</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($usuarios as $key => $value): ?>
          <tr style="text-transform: capitalize;">
            <td><?php echo$value["nombre"]; ?></td>
            <td><?php echo$value["apellido"]; ?></td>
            <td><?php echo$value["localidad"]; ?></td>
            <td><?php echo$value["telefono"]; ?></td>
            <td style="text-transform: lowercase;"><?php echo$value["mail"]; ?></td>
            <td><?php echo$value["persona"]; ?></td>
            <td><?php echo$value["actividadlaboral"]; ?></td>
            <td style="display:flex;"><a href="index.php?pag=perfilProspecto&id=<?php echo$value["id"]; ?>&as=<?php echo $valor;?>" class="btn btn-success">Perfil</a>
              <a href="index.php?pag=pasajeAcliente&id=<?php echo$value["id"]; ?>&as=<?php echo $valor;?>" class="btn btn-warning" style="margin-left: 1%;">Alta</a></td>
              <td>
                <div class="btn-group">
                  <a href="index.php?pag=editarProspecto&id=<?php echo$value["id"]; ?>" class="btn btn-secondary">Editar</a>
                  <form method="post">
                    <input type="hidden" name="eliminarMarca" value="<?php echo$value["id"]; ?>">
                    <button type="submit" class="btn" style="background-color:#b21328; color:white; margin-left: 2px;">Eliminar</button>
                    <?php
                    $eliminar= new ControladorFormularios();
                    $eliminar->ctrEliminarProspecto();
                    ?>
                  </form>
                </div>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
      </center>
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
    
    <!-- Estilos Css -->
<style type="text/css">
  body{
    background-image: url(style/img/hexagono.png);
  }
  .seccion-perfil-usuario .perfil-usuario-portada{
      background-image: url(style/img/portada.png) !important;
  }
  .list:hover{
      background-color: #384045 !important;
      color: white !important;
  }
</style>