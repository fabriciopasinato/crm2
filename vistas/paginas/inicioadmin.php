<?php 
if(isset($_SESSION["validarIngreso"])){
  if($_SESSION["validarIngreso"]!="perfil2"  ){
    echo '<script>window.location ="index.php?pag=inicioadmin";</script>';
    return;
  }
}else{
  echo '<script>window.location ="index.php?pag=login";</script>';
  return;
}
?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
<?php 
include "modulosVarios/headeradmin.php";
?>

<?php 
$usua=ControladorFormularios::ctrSelecionarUnegocio(null, null);
?>
<div class="row">
  <div class="col"> 
    <h3>Unidad de negocios</h3>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Id</th>
          <th>nombre</th>
          <th>descripcion</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($usua as $key => $value): ?>
          <tr>
            <td><?php echo$value["id"]; ?></td>
            <td><?php echo$value["nombre"]; ?></td>
            <td><?php echo$value["descripcion"]; ?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
  <?php 
  $us=ControladorFormularios::ctrSelecionarServicios(null, null);
  ?>
  <hr style="object-fit: cover; object-position: center center;">
  <div class="col">
    <h3>Servicios</h3>
    <table class="table table-hover" id="userTable">
      <thead>
          <th>Nombre</th>
          <th>Descipcion</th>

        
      </thead>
      <tbody>
        <?php foreach ($us as $key => $value): ?>
          <tr>
            <td><?php echo$value["nombre"]; ?></td>
            <td><?php echo$value["descripcion"]; ?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>
<?php 
$usuarios=ControladorFormularios::ctrSelecionarAsesor(null, null);
?>
<hr>
<div class="container">
  <h3>Listado de asesores</h3>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>nombre</th>
        <th>apellido</th>
        <th>dni</th>
        <th>cuit</th>
        <th>domicilio</th>
        <th>localidad</th>
        <th>telefono</th>
        <th>mail</th>
        <th>P Laboral</th>
        <th>IdUNeg</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($usuarios as $key => $value): ?>
        <tr>
          <td><?php echo$value["id"]; ?></td>
          <td><?php echo$value["nombre"]; ?></td>
          <td><?php echo$value["apellido"]; ?></td>
          <td><?php echo$value["dni"]; ?></td>
          <td><?php echo$value["cuit"]; ?></td>
          <td><?php echo$value["domicilio"]; ?></td>
          <td><?php echo$value["localidad"]; ?></td>
          <td><?php echo$value["telefono"]; ?></td>
          <td><?php echo$value["correo"]; ?></td>
          <td><?php echo$value["puestolaboral"]; ?></td> 
          <td><?php echo$value["id_u_negocio"]; ?></td> 
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#userTable').DataTable();
      });
    </script>

