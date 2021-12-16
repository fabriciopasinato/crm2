<script src="https://kit.fontawesome.com/b6b59e7f17.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>

<?php 
    include "modulosVarios/header.php";

$usuarios=ControladorFormularios::ctrSelecionarAsesor(null, null);
?>
<div class="container">
    <br><br><center>
	<h2>Nómina empresarial de Grupo América</h2>
	</center>
	<hr>
	<div >
		<table class="table table-hover" id="userTable">
			<thead>
				
					<th>nombre</th>
					<th>apellido</th>
					<th>dni</th>
					<th>cuit</th>
					<th>domicilio</th>
					<th>localidad</th>
					<th>telefono</th>
					<th>mail</th>
					<th>P Laboral</th>
					<th>Accion</th>
				
			</thead>
			<tbody>
				<?php foreach ($usuarios as $key => $value): ?>
					<tr>
						<td><?php echo$value["nombre"]; ?></td>
						<td><?php echo$value["apellido"]; ?></td>
						<td><?php echo$value["dni"]; ?></td>
						<td><?php echo$value["cuit"]; ?></td>
						<td><?php echo$value["domicilio"]; ?></td>
						<td><?php echo$value["localidad"]; ?></td>
						<td><?php echo$value["telefono"]; ?></td>
						<td><?php echo$value["correo"]; ?></td>
						<td><?php echo$value["puestolaboral"]; ?></td>  
						<td>
							<a href="index.php?pag=perfilAsesor&id=<?php echo$value["id"]; ?>" class="btn btn-info"><i class="far fa-user"></i></a><br>
							<button type="button" style="margin-top: 10px;" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="far fa-edit"></i></button>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>



<!-- The Modal -->
<div class="modal" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Novedades/Carrera</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form method="post" enctype="multipart/form-data">
					<div class="form-inline">
						<label>Tipo:</label>
						<select name="tipo">
							<option value="novedades">Novedades</option>
							<option value="carrera">Carrera</option>
						</select>
						<label>Cliente:</label>
						<select name="id_asesor">
							<?php foreach ($usuarios as $key => $value): ?>
								<option value="<?php echo$value["id"]; ?>"><?php echo$value["nombre"]; ?> <?php echo$value["apellido"]; ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<br>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Referente" id="referente" name="titulo">
					</div>
					<div class="form-group">
						<input type="date" class="form-control" placeholder="fecha" id="pwd" name="fecha">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Observacion" id="pwd" name="observacion">
					</div>
					<div class="form-group">
						<label>Archivo/Imagen:</label>
						<input type="file" class="form-control" placeholder="Observacion" id="pwd" name="archivo">
					</div>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</form>
				<?php 
				$registro=ControladorFormularios::ctrRegistroRH();
				if ($registro=="ok") {
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
				?>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			</div>

		</div>
	</div>
</div><br>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#userTable').DataTable();
      });
    </script>
    
    <style>
    body{
    background-image: url(style/img/hexagono.png);
  }
   </style>
