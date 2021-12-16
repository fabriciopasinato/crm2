<?php 
if(isset($_SESSION["validarIngreso"])){
  if($_SESSION["validarIngreso"]!="ok"){
    echo '<script>window.location ="index.php?pag=estadisticas";</script>';
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
  $clientes=ControladorFormularios::ctrSelecionarCliente($item, $valor);
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
<?php include "modulosVarios/header.php"; ?>


<div class="bannerPanelClientes" style="background-color:#141414; padding-top:5px; padding-bottom:5px; border-bottom: 6px solid #b21328; border-top: 5px solid #384045;">
  <h3 style="text-align: center;color: #fff;">Estadisticas Personales</h3>
</div>

<?php $operaciones=ControladorFormularios::ctrSelecionarOperaciones($item, $valor);?>
<?php $citas=ControladorFormularios::ctrSelecionarCitas($item, $valor);?>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<div id="plotlyChart"></div>
<script>
  var data = [
  {
    x: ['Clientes', 'Operaciones', 'Citas'],
    y: [<?php echo count($clientes);?>, <?php echo count($operaciones);?>, <?php echo count($citas);?>],
    type: 'bar'
  }
  ];

  Plotly.newPlot('plotlyChart', data);
</script><br>
<div class="bannerPanelClientes" style="background-color:#141414; padding-top:5px; padding-bottom:5px; border-bottom: 6px solid #b21328; border-top: 5px solid #384045;">
  <h3 style="text-align: center;color: #fff;">Estadisticas Generales</h3>
</div>
<div class="row">
  <div class="col">
    <?php $clientesall=ControladorFormularios::ctrSelecionarCliente(null, null);?>
    <h4 style="text-align: center; text-align: center; padding-bottom:3px; width:100%;">Cantidad de clientes general: <?php echo count($clientesall); ?></h4>
    <br><br><br><br><br>
    <div class="ct-chart" style="margin-top: 5%;"></div>
    <script type="text/javascript">
     var chart = new Chartist.Pie('.ct-chart', {
      series: [<?php echo count($clientesall); ?>, 100],
      labels: ['clientes', 'aspiraciones']
    }, {
      donut: true,
      showLabel: false
    });

     chart.on('draw', function(data) {
      if(data.type === 'slice') {
    // Get the total path length in order to use for dash array animation
    var pathLength = data.element._node.getTotalLength();

    // Set a dasharray that matches the path length as prerequisite to animate dashoffset
    data.element.attr({
      'stroke-dasharray': pathLength + 'px ' + pathLength + 'px'
    });

    // Create animation definition while also assigning an ID to the animation for later sync usage
    var animationDefinition = {
      'stroke-dashoffset': {
        id: 'anim' + data.index,
        dur: 1000,
        from: -pathLength + 'px',
        to:  '0px',
        easing: Chartist.Svg.Easing.easeOutQuint,
        // We need to use `fill: 'freeze'` otherwise our animation will fall back to initial (not visible)
        fill: 'freeze'
      }
    };

    // If this was not the first slice, we need to time the animation so that it uses the end sync event of the previous animation
    if(data.index !== 0) {
      animationDefinition['stroke-dashoffset'].begin = 'anim' + (data.index - 1) + '.end';
    }

    // We need to set an initial value before the animation starts as we are not in guided mode which would do that for us
    data.element.attr({
      'stroke-dashoffset': -pathLength + 'px'
    });

    // We can't use guided mode as the animations need to rely on setting begin manually
    // See http://gionkunz.github.io/chartist-js/api-documentation.html#chartistsvg-function-animate
    data.element.animate(animationDefinition, false);
  }
});

// For the sake of the example we update the chart every time it's created with a delay of 8 seconds
chart.on('created', function() {
  if(window.__anim21278907124) {
    clearTimeout(window.__anim21278907124);
    window.__anim21278907124 = null;
  }
  window.__anim21278907124 = setTimeout(chart.update.bind(chart), 10000);
});
</script>
</div>  
<div class="col">



  
  <?php $clientese=ControladorFormularios::ctrSelecionarClienteEstadisticas(null, null);?>

  <?php foreach ($clientese as $key => $valuee): ?>
   <?php foreach ($clientesall as $key => $values): ?>
    <?php if ($valuee["id"]==$values["id"]) {?>
     <p>Servicio cantidad de veces: <?php echo$valuee["id_servicio"]; ?> </p>
     <?php $servicios=ControladorFormularios::ctrSelecionarServiciosunitario("id", $values["id_servicio"]);?>
     <p>nombre: <?php echo $servicios["nombre"]; ?>  </p>
     <hr>
   <?php } ?>
 <?php endforeach ?>
<?php endforeach ?>




<h4 style="text-align: center;">Unidad de negocios con mas operaciones</h4>
<script type="text/javascript">
	const xval=[];
	const yval=[];
</script>
<?php $operaciones=ControladorFormularios::ctrSelecionarOperaciones(null, null);?>
<?php $operacionesEstadisticas=ControladorFormularios::ctrSelecionarOperacionesEstadisticas(null, null);?>
<?php foreach ($operacionesEstadisticas as $key => $valuee): ?>
	<?php foreach ($operaciones as $key => $values): ?>
		<?php if ($valuee["id"]==$values["id"]) {?>
			<?php $uneg=ControladorFormularios::ctrSelecionarUnegocioUni("id", $values["id_unegocio"]);?>
			<script type="text/javascript">
       xval.push('<?php echo $uneg["nombre"]; ?>');
       yval.push(<?php echo$valuee["id_unegocio"]; ?>);
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

</div>
</div>


