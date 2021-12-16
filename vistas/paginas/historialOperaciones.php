<?php 
if(isset($_SESSION["validarIngreso"])){
  if($_SESSION["validarIngreso"]!="ok"){
    echo '<script>window.location ="index.php?pag=historialOperaciones";</script>';
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
  $usuarios=ControladorFormularios::ctrSelecionarOperaciones($item, $valor);
}
?>
<script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://kit.fontawesome.com/b6b59e7f17.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php
include "modulosVarios/header.php";
?>
<br><br>
<div class="container">
    <?php 
    $comi=0;
    $dt=0;
    foreach ($usuarios as $key => $valuee):
    $comi=$comi+$valuee["comision"]; 
    $dt=$dt+$valuee["dtransaccion"];
    ?> 
    <?php endforeach ?>
<h5>Comision: $<?php echo $comi; ?>.        Total transaccion: $<?php echo $dt; ?>.</h5>
  <table class="table table-hover">
    <thead>
      <tr class="titulo">
        <th>Titulo</th>
        <th>Descipcion</th>
        <th>Fecha</th>
        <th>Comision</th>
        <th>Dinero de transaccion</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($usuarios as $key => $value): ?>
        <tr>
          <td style="text-transform: capitalize;"><?php echo$value["titulo"]; ?></td>
          <td><?php echo$value["descripcion"]; ?></td>
          <td><?php echo$value["fecha"]; ?></td>
          <td><?php echo$value["comision"]; ?></td>
          <td><?php echo$value["dtransaccion"]; ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
<style>
  body{
    background-image: url(style/img/hexagono.png);
    
  }
  .titulo{
      background-color: #b21328;
      color: white;
  }
  h5{
      text-align:center;
  }
</style>