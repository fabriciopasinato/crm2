<?php 
if(isset($_SESSION["validarIngreso"])){
	if($_SESSION["validarIngreso"]!="ok"){
		echo '<script>window.location ="index.php?pag=tareas";</script>';
		return;
	}
}else{
	echo '<script>window.location ="index.php?pag=login";</script>';
	return;
}
?>
<?php 
if(isset($_GET["id"])){
	$valor=$_GET["id"];
}
$usuarios=ControladorFormularios::ctrSelecionarOperaciones("id_asesor", $valor);
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://kit.fontawesome.com/b6b59e7f17.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php include "modulosVarios/header.php"; ?>
<br><br>
<h1 style="text-align:center; font-size: 32px;">Panel de operaciones:</h1><hr class="container">
<br>
<div class="container" >
<div class="row">
	<div class="col" style="border:3px solid #b2132b; border-radius: 5px;">
		<h4>Operaciones pendientes:</h4>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Titulo</th>
					<th>Fecha</th>
					<th>Dinero</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($usuarios as $key => $value): ?>
					<?php if ($value["estado"]==0) {?>
						<tr>
							<td><?php echo$value["titulo"]; ?></td>
							<td><?php echo$value["fecha"]; ?></td>
							<td>$<?php echo$value["dtransaccion"]; ?></td>
							<td><form method="post">
								<input type="hidden" name="idoperacion" value="<?php echo$value["id"]; ?>">
								<button type="submit" class="btn btn-danger" name="proc">Proceso</button>
							</form></td>
						</tr>
						<?php 
						if (isset($_POST['proc'])) {
							$idoperacion=$_POST['idoperacion'];
							
							$estado=1;
							$actualizar = ControladorFormularios::ctrTrackeoTareas($idoperacion, $estado);
						    if($actualizar=="ok"){
						        	if(isset($_SESSION["id_asesor"])){
                                          $respuesta = ControladorFormularios::ctrSelecionaUsuario("id", $_SESSION["id_asesor"]);
                                          if($respuesta["privilegio"]==1){
                                            echo '<div class="alert alert-success">Cliente actualizado</div> <script>setTimeout(function(){window.location="index.php?pag=inicio";},500);</script>';
                                          }else if($respuesta["privilegio"]==2){
                                            echo '<div class="alert alert-success">Cliente actualizado</div> <script>setTimeout(function(){window.location="index.php?pag=iniciorrhh";},1000);</script>';
                                          }else if($respuesta["privilegio"]==3){
                                            echo '<div class="alert alert-success">Cliente actualizado</div> <script>setTimeout(function(){window.location="index.php?pag=inicioempleado";},500);</script>';
                                          }else if($respuesta["privilegio"]==4){
                                            echo '<div class="alert alert-success">Cliente actualizado</div> <script>setTimeout(function(){window.location="index.php?pag=inicioAcomercial";},500);</script>';
                                          }else{
                                            echo '<div class="alert alert-success">Cliente actualizado</div> <script>setTimeout(function(){window.location="index.php?pag=inicioadmin";},500);</script>';
                                          }
                                        }else{
                                          echo '<script>window.location ="index.php?pag=login";</script>';
                                        }
						    }
						}
						?>
					<?php } ?>
				<?php endforeach ?>
			</tbody>
		</table>		
	</div>
	<div class="col" style="border:3px solid #b2132b; border-radius: 5px; margin-left: 1%;">
		<h4>Operaciones abiertas:</h4>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Titulo</th>
					<th>Fecha</th>
					<th>Dinero</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($usuarios as $key => $value): ?>
					<?php if ($value["estado"]==1) {?>
						<tr>
							<td><?php echo$value["titulo"]; ?></td>
							<td><?php echo$value["fecha"]; ?></td>
							<td>$<?php echo$value["dtransaccion"]; ?></td>
    						<td>
   <form method="post">
      <input type="hidden" name="idoperacion" value="<?php echo$value["id"]; ?>">
      <button class="btn btn-danger" type="submit" name="fintarea">Finalizar</button>
   </form>
   <?php 
      if (isset($_POST['fintarea'])) {
         $idoperacion=$_POST['idoperacion'];

         $estado=2;
         $actualizar = ControladorFormularios::ctrTrackeoTareas($idoperacion, $estado);
        if($actualizar==ok){
            	if(isset($_SESSION["id_asesor"])){
      $respuesta = ControladorFormularios::ctrSelecionaUsuario("id_asesor", $_SESSION["id_asesor"]);
      if($respuesta["privilegio"]==1){
        echo '<div class="alert alert-success">Cliente actualizado</div> <script>setTimeout(function(){window.location="index.php?pag=inicio";},1000);</script>';
      }else if($respuesta["privilegio"]==2){
        echo '<div class="alert alert-success">Cliente actualizado</div> <script>setTimeout(function(){window.location="index.php?pag=iniciorrhh";},1000);</script>';
      }else if($respuesta["privilegio"]==3){
        echo '<div class="alert alert-success">Cliente actualizado</div> <script>setTimeout(function(){window.location="index.php?pag=inicioempleado";},1000);</script>';
      }else if($respuesta["privilegio"]==4){
        echo '<div class="alert alert-success">Cliente actualizado</div> <script>setTimeout(function(){window.location="index.php?pag=inicioAcomercial";},1000);</script>';
      }else{
        echo '<div class="alert alert-success">Cliente actualizado</div> <script>setTimeout(function(){window.location="index.php?pag=inicioadmin";},1000);</script>';
      }
    }else{
      echo '<script>window.location ="index.php?pag=login";</script>';
    }
        }
         
      }
   ?>
</td>
					<?php } ?>
				<?php endforeach ?>
			</tbody>
		</table>	
	</div>
</div>
</div>
<br>
<div class="container">
<h4>Operaciones cerradas:</h4>
<table class="table table-hover">
	<thead>
		<tr style="background-color: #b21328; color: white;">
			<th>Titulo</th>
			<th>Fecha</th>
			<th>Dinero</th>
			<th>Comision</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($usuarios as $key => $value): ?>
			<?php if ($value["estado"]==2) {?>
				<tr>
					<td><?php echo$value["titulo"]; ?></td>
					<td><?php echo$value["fecha"]; ?></td>
					<td>$<?php echo$value["dtransaccion"]; ?></td>
					<td>$<?php echo$value["comision"]; ?></td>
				</tr>
			<?php } ?>
		<?php endforeach ?>
	</tbody>
</table>
<br>
</div>
<br>
<style type="text/css">
h4{
	text-align: center;
}
  body{
    background-image: url(style/img/hexagono.png);
  }
</style>
</style>
