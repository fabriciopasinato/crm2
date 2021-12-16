<?php 
if(isset($_SESSION["validarIngreso"])){
  if($_SESSION["validarIngreso"]!="ok"){
    echo '<script>window.location ="index.php?pag=publicidad";</script>';
    return;
  }
}else{
  echo '<script>window.location ="index.php?pag=login";</script>';
  return;
}
?>
<?php 
$usuarios=ControladorFormularios::ctrSelecionarNewsletter(null, null);
include "modulosVarios/header.php";
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://kit.fontawesome.com/b6b59e7f17.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="bannerPanelClientes" style="background-color:#141414; padding-top:5px; padding-bottom:5px; border-bottom: 6px solid #b21328; border-top: 5px solid #384045;">
  <!-- Buscador + iconos -->
  <center>

    <label style="color:#fff;">Por empresa: </label>
    <select name="tipo" id="tipo" >
      <option value="0">Suscriptores</option>
      <option value="1">Clientes generales</option>
      <option value="2">Asesores</option>
    </select>
    
    <label style="color:#fff;">Destinatarios: </label>
    <select name="tipo" id="tipo" >
      <option value="0">Suscriptores</option>
      <option value="1">Clientes generales</option>
      <option value="2">Asesores</option>
    </select>
    
    
    <button onclick="enviar()" style="border-radius:10px; background-color:#fff;"><i class="far fa-share-square"></i></button>
    <label style="margin-left:0%; color:#fff;">Por unidad de negocio: </label>
    <?php $unegocio=ControladorFormularios::ctrSelecionarUnegocio(null, null);?>
    <select name="uneg" id="uneg" >
      <?php foreach ($unegocio as $key => $value): ?>
        <option value="<?php echo$value["id"]; ?>"><?php echo$value["nombre"]; ?></option>
      <?php endforeach ?>
    </select>
    <button onclick="enviaruneg()" style="border-radius:10px; background-color:#fff;"><i class="far fa-share-square"></i></button>
  </center>
</div>

  <script type="text/javascript">
    function enviar(){
      res=document.getElementById('tipo').value;
      window.location="index.php?pag=enviarnewsletter&user="+res;
    }
    function enviaruneg(){
      res=document.getElementById('uneg').value;
      window.location="index.php?pag=enviarnewsletteruneg&user="+res;
    }
  </script>


<div class="container"><br>
  <center><h3>Campañas Publicitarias</h3></center><hr class="container">
  <table class="table table-hover">
    <thead>
      <tr class="navB">
        <th>Empresa</th>
        <th>Campaña</th>
        <th>Servicio</th>
        <th>Inicio</th>
        <th>Fin</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($usuarios as $key => $value): ?>
        <tr>
          <td><?php echo$value["nombre"]; ?></td>
          <td><?php echo$value["nombre"]; ?></td>
          <td><?php echo$value["nombre"]; ?></td>
          <td><?php echo$value["mail"]; ?></td>
          <td><?php echo$value["fecha"]; ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div><br><br>
<style type="text/css">
  body{
    background-image: url(style/img/hexagono.png);
  }
  .navB{
      background-color: #b21328;
      color: white;
  }
</style>
