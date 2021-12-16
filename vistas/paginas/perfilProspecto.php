<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<link rel="stylesheet" type="text/css" href="style/perfilcliente.css">
<link rel="stylesheet" type="text/css" href="style/tablas.css">

<?php 
if(isset($_SESSION["validarIngreso"])){
  if($_SESSION["validarIngreso"]!="ok"){
    echo '<script>window.location ="index.php?pag=perfilProspecto";</script>';
    return;
  }
}else{
  echo '<script>window.location ="index.php?pag=login";</script>';
  return;
}
?>
<?php 
if(isset($_GET["id"])){
  $item="id";
  $valor=$_GET["id"];
  $idas=$_GET["as"];
  $usuarios=ControladorFormularios::ctrSelecionarProspectoUni($item, $valor);
}

include "modulosVarios/header.php";
?>
 
<section class="seccion-perfil-usuario">
  <div class="perfil-usuario-header">
    <div class="perfil-usuario-portada">
      <div class="perfil-usuario-avatar">
        <img src="style/logo.png" alt="img-avatar">
      </div>
    </div>
  </div>
  <div class="perfil-usuario-body">
    <div class="perfil-usuario-bio">
      <h3 class="titulo" style="text-transform: capitalize !important;"><?php echo $usuarios['nombre'];?> <?php echo $usuarios['apellido'];?></h3>
      <p class="texto"><?php echo $usuarios['observacion'];?>.</p>
    </div>
    <div class="perfil-usuario-footer" style="text-transform: capitalize !important;">
      <ul class="lista-datos">
        <li><i class="icono fas fa-phone-alt"></i><?php echo $usuarios['telefono'];?></li>
        <li><i class="icono fas fa-briefcase"></i><?php echo $usuarios['actividadlaboral'];?></li>
        <li><i class="icono fas fa-building"></i><?php echo $usuarios['persona'];?></li>
      </ul>
      <ul class="lista-datos">
        <li><i class="icono fa fa-map" aria-hidden="true"></i>Ciudad: <?php echo $usuarios['localidad'];?></li>
      </ul>
    </div>
    <div class="redes-sociales">
      <a href="tel:<?php echo $usuarios['telefono'];?>" class="boton-redes facebook fab "><i class="fas fa-phone-square-alt"></i></a>
      <a target="_blank" href="https://wa.me/<?php echo $usuarios['telefono'];?>" class="boton-redes twitter fab fa-whatsapp"><i class="icon-twitter"></i></a>
      <a href="mailto:<?php echo $usuarios['mail'];?>" class="boton-redes instagram fas fa-envelope-square"><i class="icon-instagram"></i></a>
    </div>
   
  </div>
    </section>
<br><br><br>
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
