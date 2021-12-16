
<?php 
if(isset($_GET["id"])){
	$valor=$_GET["id"];
}
$usuarios=ControladorFormularios::ctrSelecionarAsesoruni("id", $valor);
 $novedades=ControladorFormularios::ctrSelecionarNovedades("id_asesor", $valor); 
 $carrera=ControladorFormularios::ctrSelecionarCarrera("id_asesor", $valor); 
?>



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<link rel="stylesheet" type="text/css" href="style/perfilcliente.css">
<link rel="stylesheet" type="text/css" href="style/tablas.css">
<?php include "modulosVarios/header.php";?>


 
<section class="seccion-perfil-usuario">
  <div class="perfil-usuario-header">
    <div class="perfil-usuario-portada">
      <div class="perfil-usuario-avatar">
        <img src="style/logo.png" alt="img-avatar">
      </div>
    </div>
  </div>
  <div class="perfil-usuario-body">
    <div class="perfil-usuario-bio" style="text-transform: capitalize;">
      <h3 class="titulo"><?php echo $usuarios['nombre'];?> <?php echo $usuarios['apellido'];?></h3>

    </div>
    <div class="perfil-usuario-footer" style="text-transform: capitalize;">
      <ul class="lista-datos">
        <li><i class="icono fas fa-map-signs"></i><?php echo $usuarios['domicilio'];?></li>
        <li><i class="icono fas fa-phone-alt"></i><?php echo $usuarios['telefono'];?></li>
        <li><i class="icono fas fa-briefcase"></i><?php echo $usuarios['puestolaboral'];?></li>
      </ul>
      <ul class="lista-datos">
        <li><i class="icono fa fa-map" aria-hidden="true"></i>Ciudad: <?php echo $usuarios['localidad'];?></li>
        <li><i class="icono fa fa-address-card"></i>DNI: <?php echo $usuarios['dni'];?></li>
        <li><i class="icono fa fa-id-card" aria-hidden="true"></i>CUIT: <?php echo $usuarios['cuit'];?></li>

      </ul>
    </div>
    <div class="redes-sociales">
      <a href="" target="_blank" class="boton-redes facebook fab fa-linkedin"><i class="icon-facebook"></i></a>
      <a href="" target="_blank" class="boton-redes twitter fab fa-whatsapp"><i class="icon-twitter"></i></a>
      <a href="" class="boton-redes instagram fas fa-envelope-square"><i class="icon-instagram"></i></a>
    </div>
    <div class="operaciones">
        <?php 
	   
		if(isset($_SESSION["id_asesor"])){
			$respuesta = ControladorFormularios::ctrSelecionaUsuario("id_asesor", $_SESSION["id_asesor"]);
			if($respuesta["privilegio"]==1){
				$urll ='index.php?pag=inicio';
			}else if($respuesta["privilegio"]==2){
				$urll ='index.php?pag=iniciorrhh';
			}else if($respuesta["privilegio"]==3){
				$urll ='index.php?pag=inicioempleado';
			}else if($respuesta["privilegio"]==4){
				$urll ='index.php?pag=inicioAcomercial';
			}else{
				$urll ='index.php?pag=inicioadmin';
			}
		}else{
			$urll ='index.php?pag=login';
		}
	
	?>
      <a href="<?php echo $urll;?>" class="boton-redes instagram fas fa-home"><i class="icon-instagram"></i></a>
    </div>
  </div>
    </section>
<br><br><br>


<?php 
      $ser=ControladorFormularios::ctrSelecionarServiciosxCliente("id_cliente", $valor); 
      ?>

<center>
  <div class="row justify-content-center">
    <div class="container">
      <!-- Titulo -->
      <div class="row justify-content-center" style="background-color: #171717; border-top: 6px solid #B21328; border-bottom: 3px solid #384045; color: white; justify-content: center; align-items: center; text-align: center; font-weight: bold; padding-top: 5px; padding-bottom: 5px; width: 70%;">
        Mis novedades:
    </div>
  <div class="row" style="background-color: #b21328; color:white; padding-left: 4%; padding-right: 4%; padding-top: 15px; padding-bottom: 15px; width: 70%;">
    <div class="col">Novedades</div>
    <div class="col">Fecha</div>
    <div class="col">Observacion</div>
    <div class="col">Comprobante</div>
  </div>
    <!-- Contenido -->
    <?php foreach ($novedades as $key => $values): ?>
    <div class="row list" style="background-color: white; color:black; padding-left: 4%; padding-right: 4%; padding-top: 15px; padding-bottom: 15px; width: 70%;">
    	<div class="col"><?php echo$values["titulo"]; ?> </div>
        <div class="col"><?php echo$values["fecha"]; ?> </div>
        <div class="col"><?php echo$values["observacion"]; ?></div>
        <div class="col"><a href="<?php echo$values["archivo"]; ?>">archivo</a> </div>
    </div>
    <?php endforeach ?>
  </div>
</center>
  <div style="margin:10px;"></div>
<br>
<center>
  <div class="row justify-content-center">
    <div class="container">
      <!-- Titulo -->
      <div class="row justify-content-center" style="background-color: #171717; border-top: 6px solid #B21328; border-bottom: 3px solid #384045; color: white; justify-content: center; align-items: center; text-align: center; font-weight: bold; padding-top: 5px; padding-bottom: 5px; width: 70%;">
        Mi carrera:
    </div>
  <div class="row" style="background-color: #b21328; color:white; padding-left: 4%; padding-right: 4%; padding-top: 15px; padding-bottom: 15px; width: 70%;">
    <div class="col">Cursos</div>
    <div class="col">Fecha</div>
    <div class="col">Observacion</div>
    <div class="col">Comprobante</div>
  </div>
    <!-- Contenido -->
    <?php foreach ($carrera as $key => $values): ?>
    <div class="row list" style="background-color: white; color:black; padding-left: 4%; padding-right: 4%; padding-top: 15px; padding-bottom: 15px; width: 70%;">
   		<div class="col"><?php echo$values["titulo"]; ?></div>
        <div class="col"><?php echo$values["fecha"]; ?></div>
        <div class="col"><?php echo$values["observacion"]; ?></div>
        <div class="col"><a href="<?php echo$values["archivo"]; ?>">archivo</a></div>
    </div>
    <br><br>
    <?php endforeach ?>
  </div>
</center>
    </div>

<br><br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
