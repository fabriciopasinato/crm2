<?php 
if(isset($_SESSION["validarIngreso"])){
  if($_SESSION["validarIngreso"]!="ok"){
    echo '<script>window.location ="index.php?pag=faq";</script>';
    return;
  }
}else{
  echo '<script>window.location ="index.php?pag=login";</script>';
  return;
}
?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
include "modulosVarios/header.php";
?>
	

		<!-- Theme CSS -->
		<link rel="stylesheet" href="temaAgro/theme.css">
		<link rel="stylesheet" href="temaAgro/theme-elements.css">
	
	

		

		<!-- Skin CSS -->
		<link rel="stylesheet" href="temaAgro/default.css">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="temaAgro/custom.css">

		

		<div class="body">
			<div role="main" class="main">

				<section class="page-header">
					<div class="container">
<!--
						<div class="row">
							<div class="col-md-12">
								<ul class="breadcrumb">
									<li><a href="#">Home</a></li>
									<li class="active">Pages</li>
								</ul>
							</div>
						</div>
-->
						<div class="row">
							<div class="col-md-12">
								<h1><strong>Preguntas</strong> Frecuentes (F.A.Q.)</h1>
							</div>
						</div>
					</div>
				</section>

				<div class="container">

<!--
					<div class="row">
						<div class="col-md-12">
							<p class="lead">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla non pulvinar. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut eu risus enim, ut pulvinar lectus. Sed hendrerit nibh metus.
							</p>
						</div>
					</div>
-->

					<div class="row">
						<div class="col-md-12">

							<div class="toggle toggle-primary" data-plugin-toggle>
								<section class="toggle active">
									<label>Qu&eacute; entendemos por innovaci&oacute;n agropecuaria?</label>
									<p>Creemos en la ciencia como el gran motor de transformaci&#243;n de nuestra era y en la implementaci&#243;n tecnol&#243;gica como el medio para garantizar una mejor calidad de vida. Creemos que la transformaci&#243;n digital va a generar infinitas oportunidades para nuestro sector. Creemos en la inteligencia colectiva, en la colaboraci&#243;n y en la innovaci&#243;n abierta como estrategia de creaci&#243;n de valor.</p>
								</section>

								<section class="toggle active">
									<label>Para qu&eacute; innovar en el agro?</label>
									<p>Los  productores agropecuarios tenemos el enorme desaf&#237;o de satisfacer la demanda alimentaria mundial que superara los 9 billones de habitantes para el 2050. A su vez esa necesidad de crecimiento de la producci&#243;n se da en un escenario de escases de nuevas tierras, limitaciones en el agua disponible y nuevos riesgos productivos generados por el cambio clim&#225;tico. En este escenario, est&#225; claro que la mayor&#237;a del crecimiento deber&#225; provenir de una mayor eficiencia productiva y de mejoras en la cadena de valor.  </p>
								</section>

								<section class="toggle active">
									<label>Qu&eacute; es la agricultura de decisi&oacute;n?</label>
									<p>Hist&#243;ricamente en cada campa&#241;a agr&#237;cola se generan por hect&#225;rea una enorme cantidad de datos y variables que hist&#243;ricamente no fueron medidos ni utilizados por la complejidad que implicaba su obtenci&#243;n y procesamiento.
Las nuevas tecnolog&#237;as de comunicaci&#243;n e informaci&#243;n como nano sat&#233;lites, drones y sensores sumados a sistemas de informaci&#243;n geogr&#225;ficos y el incremento de la capacidad de computo que hoy permite la nube incrementa la capacidad cognitiva del productor permiti&#233;ndole tomar decisiones mas inteligentes con mejor informaci&#243;n.
</p>
								</section>

								<section class="toggle active">
									<label>C&oacute;mo implemento innovaci&oacute;n en la producci&oacute;n agropecuaria?</label>
									<p>La capacitaci&#243;n en nuevas tecnol&#243;gicas y la forma en la que podemos aplicarlas en nuestra actividad es la condici&#243;n previa a una implementaci&#243;n efectiva. </p>
								</section>

								<section class="toggle active">
									<label>C&oacute;mo se aplican las im&aacute;genes satelitales a la producci&oacute;n agropecuaria?</label>
									<p>Las im&#225;genes satelitales son representaciones visuales de la informaci&#243;n que capturan los sensores montados en un sat&#233;lite artificial y que recogen la se&#241;al el&#233;ctrica que genera el reflejo de la radiaci&#243;n solar desde   la superficie de la Tierra, la amplifican, la registran y la reenv&#237;an para su procesamiento. Posteriormente esta informaci&#243;n digital que contiene las caracter&#237;sticas de la zona representada se puede utilizar en una amplia variedad de aplicaciones con el objeto de optimizar la eficiencia en cada etapa productiva. </p>
								</section>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>
					<hr>
	
<style>
    .scroll-to-top{
        opacity:0 !important;
    }
</style>
	

		
		<!-- Theme Base, Components and Settings -->
		<script src="temaAgro/theme.js"></script>
	
		
	
		<!-- Theme Initialization Files -->
		<script src="temaAgro/theme.init.js"></script>
		
<!-- Estilos Css -->
<style type="text/css">
  body{
    background-image: url(style/img/hexagono.png);
  }
</style>
