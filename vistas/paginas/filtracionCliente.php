<?php 
  if(isset($_SESSION["validarIngreso"])){
  if($_SESSION["validarIngreso"]!="ok"){
    echo '<script>window.location ="index.php?pag=filtracionCliente";</script>';
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
<center><h2>Buscar en clientes y prospectos</h2></center>
<hr class="container">

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
            <th>C. operaciones</th>
            <th>Comision</th>
            <th>D. operacion</th>
            <th>Vehiculo</th>
            <th>Propiedad</th>
            <th>Hijos</th>
            <th>Viaja</th>
            <th>Casado</th>
            <th>Campo</th>
            <th>Empresa</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($usuarios as $key => $value): ?>
          <tr>
            <td><a href="index.php?pag=perfilcliente&id=<?php echo$value["id"]; ?>&as=<?php echo $valor;?>"><?php echo$value["nombre"]; ?></</td>
            <td><?php echo$value["apellido"]; ?></td>
            <td><?php echo$value["fecha"]; ?></td>
            <td><?php echo$value["cuit"]; ?></td>
            <td><?php echo$value["localidad"]; ?></td>
            <td><?php echo$value["telefono"]; ?></td>
            <td>
                <?php  $opereta=ControladorFormularios::ctrSelecionarOperaciones("id_cliente", $value["id"]); 
                echo count($opereta);
                ?>
            </td>
            <td><?php
            $contcomi=0;
            $contdt=0;
            foreach ($opereta as $key => $valuess) {
                $contcomi=$contcomi+$valuess["comision"];
                $contdt=$contdt+$valuess["dtransaccion"];
            }
            echo $contcomi;
            ?></td>
            <td><?php echo $contdt;?></td>
            <?php $infoex=ControladorFormularios::ctrSelecionarInfoExtra("id_cliente", $value["id"]);
            if($infoex==null){
            ?>
            <td>No</td>
            <td>No</td>
            <td>No</td>
            <td>No</td>
            <td>No</td>
            <td>No</td>
            <td>No</td>
            <?php }else{?>
                <td><?php  if($infoex["vehiculo"]==1){echo "Si";}else{echo "No";}?></td>
                <td><?php  if($infoex["propiedad"]==1){echo "Si"; }else{echo "No";};?></td>
                <td><?php  if($infoex["hijos"]==1){echo "Si"; }else{echo "No";};?></td>
                <td><?php  if($infoex["viaja"]==1){echo "Si"; }else{echo "No";};?></td>
                <td><?php  if($infoex["casado"]==1){echo "Si"; }else{echo "No";};?></td>
                <td><?php  if($infoex["campo"]==1){echo "Si"; }else{echo "No";};?></td>
                <td><?php  if($infoex["empresa"]==1){echo "Si"; }else{echo "No";};?></td>
            <?php }?>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
      </center>
    </div>
    </div>
    <br><br>
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