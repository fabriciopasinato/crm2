<?php 
if(isset($_SESSION["validarIngreso"])){
  if($_SESSION["validarIngreso"]!="perfil2"  ){
    echo '<script>window.location ="index.php?pag=estadisticasadmin";</script>';
    return;
  }
}else{
  echo '<script>window.location ="index.php?pag=login";</script>';
  return;
}
?>
<link rel="stylesheet" type="text/css" href="chartist/chartist.css">
<script type="text/javascript" src="chartist/chartist.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://kit.fontawesome.com/b6b59e7f17.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
    $vall=$_SESSION["id_asesor"];
    $asesor=ControladorFormularios::ctrSelecionarAsesoruni("id", $vall);
?>

<?php 
 include "modulosVarios/headeradmin.php";
 ?>
 <h2 style="text-align:center;">Estadisticas generales</h2>

    <?php $clientesall=ControladorFormularios::ctrSelecionarCliente(null, null);?>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <div id="plotlyChart"></div>
    <script>
      var data = [
      {
        x: ['Clientes'],
        y: [<?php echo count($clientesall);?>],
        type: 'bar'
      }
      ];
      Plotly.newPlot('plotlyChart', data);
    </script>

      <div class="bannerPanelClientes" style="background-color:#141414; padding-top:5px; padding-bottom:5px; border-bottom: 6px solid #b21328; border-top: 5px solid #384045;">
  <h4 style="text-align: center;color: #fff;">Top de servicios</h4>
  </div>

    <?php $clientese=ControladorFormularios::ctrSelecionarClienteEstadisticas(null, null);?>
    <script type="text/javascript">
     const xval=[];
     const yval=[];
   </script>

   <?php foreach ($clientese as $key => $valuee): ?>
     <?php foreach ($clientesall as $key => $values): ?>
      <?php if ($valuee["id"]==$values["id"]) {?>
       <?php $servicios=ControladorFormularios::ctrSelecionarServiciosunitario("id", $values["id_servicio"]);?>
       <script type="text/javascript">
         xval.push('<?php echo $servicios["nombre"]; ?> ');
         yval.push(<?php echo$valuee["id_servicio"]; ?>);
       </script>
     <?php } ?>
   <?php endforeach ?>
 <?php endforeach ?>
 <div id="divv"></div>
 <script>
  var data = [
  {
    x: xval,
    y: yval,
    type: 'bar'
  }
  ];
  Plotly.newPlot('divv', data);
</script>

    <div class="bannerPanelClientes" style="background-color:#141414; padding-top:5px; padding-bottom:5px; border-bottom: 6px solid #b21328; border-top: 5px solid #384045;">
  <h4 style="text-align: center;color: #fff;">Unidad de negocios con mas operaciones</h4>
  </div>

  <script type="text/javascript">
   const xval2=[];
   const yval2=[];
 </script>
 <?php $operaciones=ControladorFormularios::ctrSelecionarOperaciones(null, null);?>
 <?php $operacionesEstadisticas=ControladorFormularios::ctrSelecionarOperacionesEstadisticas(null, null);?>
 <?php foreach ($operacionesEstadisticas as $key => $valuee): ?>
   <?php foreach ($operaciones as $key => $values): ?>
    <?php if ($valuee["id"]==$values["id"]) {?>
     <?php $uneg=ControladorFormularios::ctrSelecionarUnegocioUni("id", $values["id_unegocio"]);?>
     <script type="text/javascript">
       xval2.push('<?php echo $uneg["nombre"]; ?> ');
       yval2.push(<?php echo$valuee["id_unegocio"]; ?>);
     </script>
   <?php } ?>
 <?php endforeach ?>
<?php endforeach ?>
<div id="divvf"></div>
<script>
  var datad = [
  {
    x: xval2,
    y: yval2,
    type: 'bar'
  }
  ];
  Plotly.newPlot('divvf', datad);
</script>






