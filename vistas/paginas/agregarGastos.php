
<?php 
if(isset($_SESSION["validarIngreso"])){
  if($_SESSION["validarIngreso"]!="ok"){
    echo '<script>window.location ="index.php?pag=agregarGastos";</script>';
    return;
  }
}else{
  echo '<script>window.location ="index.php?pag=login";</script>';
  return;
}
?>

<?php 
if(isset($_SESSION["id_asesor"])){
  $usuario = ControladorFormularios::ctrSelecionaUsuario("id_asesor", $_SESSION["id_asesor"]);
  $asesor=ControladorFormularios::ctrSelecionarAsesoruni("id", $usuario["id_asesor"]);
  if($usuario['privadministrativo']==0){
   
    $targasto=ControladorFormularios::ctrSelecionarGastosDobleF("id_asesor", $usuario["id_asesor"], "estado", "5"); 
  }else if($usuario['privadministrativo']==1){
    $targasto=ControladorFormularios::ctrSelecionarGastosDobleF("u_negocioGastadora", $asesor["id_u_negocio"], "estado", "1"); 
    $targastopropio=ControladorFormularios::ctrSelecionarGastosDobleF("id_asesor", $usuario["id_asesor"], "estado", "5");
  }
  else if($usuario['privadministrativo']==2){
    $targasto=ControladorFormularios::ctrSelecionarGastos("estado", "2"); 

     $targastopropio=ControladorFormularios::ctrSelecionarGastosDobleF("id_asesor", $usuario["id_asesor"], "estado", "5");
     
    $esooo=ControladorFormularios::ctrSelecionarGastos("estado", "4"); 
  }else if($usuario['privadministrativo']==3){
    $targasto=ControladorFormularios::ctrSelecionarGastos("estado", "3"); 
     $targastopropio=ControladorFormularios::ctrSelecionarGastosDobleF("id_asesor", $usuario["id_asesor"], "estado", "5");
  }else if($usuario['privadministrativo']==4){
    
    $targasto=ControladorFormularios::ctrSelecionarGastosDoble("estado", "4"); 
     $targastopropio=ControladorFormularios::ctrSelecionarGastosDobleF("id_asesor", $usuario["id_asesor"], "estado", "5");
  }
}
$gastos=ControladorFormularios::ctrSelecionarGastos("id_asesor", $usuario["id_asesor"]);
$gastosgenerales=ControladorFormularios::ctrSelecionarGastos(null, null);
$unegocios=ControladorFormularios::ctrSelecionarUnegocio(null, null);
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
<?php include "modulosVarios/header.php"; ?>
<div class="container" style="display: flex;">
   
<!-- Button to Open the Modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalgasto" style="margin-top: 1%;">
  Solicitud de Pedido
</button>
</div>





<?php if($targastopropio!=null){?>
<br>
<div class="container" style="background-color: #b21328; color: white; padding-bottom: 1px; border-radius: 5px;">
<h2>Tareas sobre los gastos propios</h2>
</div>
<hr class="container">
<div class="container">
  <div style="margin-top:10px;">
    <center>
      <table class="table table-striped table-responsive display" style="text-transform: capitalize; max-width: 1200px;" id="userTable">
        <thead>
          <tr style="background-color: #384045; color: #ffff;">
            <th>Id</th>
            <th>Titulo</th>
            <th>Precio</th>
            <th>Tipo de pago</th>
            <th>U. de negocio</th>
            <th>Observacion compra</th>
            <th>Empleado</th>
            <th>Accion</th>
            <th>Doc</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($targastopropio as $key => $value): ?>
            <tr>
              <td><?php echo$value["id"]; ?></td>
              <td><?php echo$value["titulo"]; ?></td>
              <td><?php echo$value["precio"]; ?></td>
              <td><?php echo$value["forma_de_pago"]; ?></td>
              <td><?php
				$unegocio=ControladorFormularios::ctrSelecionarUnegocioUni("id", $value["u_negocioGastadora"]);
				 echo$unegocio["nombre"]; 
				?></td>
				<td><?php echo$value["observacioncompra"]; ?></td>
              <td><?php
				$asesorr=ControladorFormularios::ctrSelecionarAsesoruni("id", $value["id_asesor"]);
				 echo $asesorr["nombre"]. " ".$asesorr["apellido"]; 
				?></td>
              <td>
                   <a href="index.php?pag=cEstadoGasto&id=<?php echo $value["id"];?>&estado=5" class="btn btn-danger">
                    Fecha compra
                  </a>
            </td>
            <td>
                <?php 
               
                if($value["documento"]=="style/img/documentaciongasto/"){ ?>
                <p>sin</p>
                <?php }else{ ?>
                
                    <a href="<?php echo $value["documento"]; ?>" download="DocumentoGastos">
                    
                    Ver
                    </a>
                <?php } ?>
                </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </center>
</div>
</div>
<br>
<?php } ?>


<?php if($esooo!=null){?>
<br>
<div class="container" style="background-color: #b21328; color: white; padding-bottom: 1px; border-radius: 5px;">
<h2>Tareas Gastos liquidacion</h2>
</div>
<hr class="container">
<div class="container">
  <div style="margin-top:10px;">
    <center>
      <table class="table table-striped table-responsive display" style="text-transform: capitalize; max-width: 1200px;" id="userTable">
        <thead>
          <tr style="background-color: #384045; color: #ffff;">
            <th>Id</th>
            <th>Titulo</th>
            <th>Precio</th>
            <th>Tipo de pago</th>
            <th>U. de negocio</th>
            <th>Observacion compra</th>
            <th>Empleado</th>
            <th>Accion</th>
            <th>Doc</th>
            <th>Doc f</th>
          </tr>
        </thead>
        <tbody>
            
          <?php
          foreach ($esooo as $key => $valuerr): ?>
          <?php if($valuerr["u_negocioPaga"]==12){?>
            <tr>
              <td><?php echo $valuerr["id"]; ?></td>
              <td><?php echo $valuerr["titulo"]; ?></td>
              <td><?php echo $valuerr["precio"]; ?></td>
              <td><?php echo $valuerr["forma_de_pago"]; ?></td>
              <td><?php
				$unegocio=ControladorFormularios::ctrSelecionarUnegocioUni("id", $valuerr["u_negocioGastadora"]);
				 echo$unegocio["nombre"]; 
				?></td>
				<td><?php echo $valuerr["observacioncompra"]; ?></td>
              <td><?php
				$asesorr=ControladorFormularios::ctrSelecionarAsesoruni("id", $valuerr["id_asesor"]);
				 echo $asesorr["nombre"]. " ".$asesorr["apellido"]; 
				?></td>
              <td>
                     <a href="index.php?pag=cEstadoGasto&id=<?php echo $valuerr["id"];?>&estado=4" class="btn btn-danger">
                    Liquidar
                  </a>
            </td>
            <td>
                <?php 
               
                if($value["documento"]=="style/img/documentaciongasto/"){ ?>
                <p>sin</p>
                <?php }else{ ?>
                
                    <a href="<?php echo $value["documento"]; ?>" download="DocumentoGastos">
                    
                    Ver
                    </a>
                <?php } ?>
                </td>
                <td>
                <?php 
               
                if($value["documento2"]==""){ ?>
                <p>sin</p>
                <?php }else{ ?>
                
                    <a href="<?php echo $value["documento2"]; ?>" download="DocumentoGastos">
                    
                    Ver
                    </a>
                <?php } ?>
                </td>
          </tr>
          <?php }?>
        <?php endforeach ?>
      </tbody>
    </table>
  </center>
</div>
</div>
<br>
<?php } ?>


<?php if($targasto!=null){?>
<br>
<div class="container" style="background-color: #b21328; color: white; padding-bottom: 1px; border-radius: 5px;">
<h2>Tareas sobre los gastos</h2>
</div>
<hr class="container">
<div class="container">
  <div style="margin-top:10px;">
    <center>
      <table class="table table-striped table-responsive display" style="text-transform: capitalize; max-width: 1200px;" id="userTable">
        <thead>
          <tr style="background-color: #384045; color: #ffff;">
            <th>Id</th>
            <th>Titulo</th>
            <th>Precio</th>
            <th>Tipo de pago</th>
            <th>U. de negocio</th>
            <th>Observacion compra</th>
            <th>Empleado</th>
            <th>Accion</th>
            <th>Doc</th>
            <th>Doc F</th>
          </tr>
        </thead>
        <tbody>
            
          <?php
          foreach ($targasto as $key => $value): ?>
            <tr>
              <td><?php echo$value["id"]; ?></td>
              <td><?php echo$value["titulo"]; ?></td>
              <td><?php echo$value["precio"]; ?></td>
              <td><?php echo$value["forma_de_pago"]; ?></td>
              <td><?php
				$unegocio=ControladorFormularios::ctrSelecionarUnegocioUni("id", $value["u_negocioGastadora"]);
				 echo$unegocio["nombre"]; 
				?></td>
				<td><?php echo$value["observacioncompra"]; ?></td>
              <td><?php
				$asesorr=ControladorFormularios::ctrSelecionarAsesoruni("id", $value["id_asesor"]);
				 echo $asesorr["nombre"]. " ".$asesorr["apellido"]; 
				?></td>
              <td>
                <?php if($usuario['privadministrativo']==0){?>
                  <!-- Button to Open the Modal -->
                  <a href="index.php?pag=cEstadoGasto&id=<?php echo $value["id"];?>&estado=5" class="btn btn-danger">
                    Fecha compra
                  </a>
                  <?php
                }else if($usuario['privadministrativo']==1 and $asesor['id_u_negocio']==$value['u_negocioGastadora']){
                ?>
                   <a href="index.php?pag=cEstadoGasto&id=<?php echo $value["id"];?>&estado=1" class="btn btn-danger">
                    Gasto
                  </a>
                  <?php
                }else if($usuario['privadministrativo']==2){ ?>
                   <a href="index.php?pag=cEstadoGasto&id=<?php echo $value["id"];?>&estado=2" class="btn btn-danger">
                    Confirmar
                  </a>
                  <a href="index.php?pag=editarGasto&id=<?php echo $value["id"];?>&ess=2" class="btn btn-primary">
                    Editar
                  </a>
                  <?php
                }else if($usuario['privadministrativo']==3){ ?>
                 <a href="index.php?pag=cEstadoGasto&id=<?php echo $value["id"];?>&estado=3" class="btn btn-danger">
                    Confirmar
                  </a>
                <?php
              }else if($usuario['privadministrativo']==4 and $asesor['id_u_negocio']==$value['u_negocioPaga'] or $usuario['privadministrativo']==3 and $asesor['id_u_negocio']==$value['u_negocioPaga']){?>
                     <a href="index.php?pag=cEstadoGasto&id=<?php echo $value["id"];?>&estado=4" class="btn btn-danger">
                    Liquidar
                  </a>
               <?php   
              }
              ?>
            </td>
            <td>
                <?php 
               
                if($value["documento"]=="style/img/documentaciongasto/"){ ?>
                <p>sin</p>
                <?php }else{ ?>
                
                    <a href="<?php echo $value["documento"]; ?>" download="DocumentoGastos">
                    
                    Ver
                    </a>
                <?php } ?>
                </td>
                <td>
                <?php 
               
                if($value["documento2"]==""){ ?>
                <p>sin</p>
                <?php }else{ ?>
                
                    <a href="<?php echo $value["documento2"]; ?>" download="DocumentoGastos">
                    
                    Ver
                    </a>
                <?php } ?>
                </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </center>
</div>
</div>
<br>
<?php } ?>




<?php if($gastos!=null){ ?>
<br>
<div class="container" style="background-color: #b21328; color: white; padding-bottom: 1px; border-radius: 5px;">
<h2>Gastos personales</h2>
</div>

<hr class="container">
<div class="container">
  <div style="margin-top:10px;">
    <center>
      <table class="table table-striped table-responsive display" style="text-transform: capitalize; max-width: 1200px;" id="userTable2">
        <thead>
          <tr style="background-color: #384045; color: #ffff;">
            <th>Id</th>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Tipo de pago</th>
            <th>U. de negocio</th>
           <th>U. que paga</th>
            <th>Estado</th>
            <th>Observacion</th>
            <th>Observacion compra</th>
            <th>Fecha compra</th>
            <th>Fecha pago</th>
            <th>Accion</th>
            <th>Doc</th>
            <th>Doc F</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($gastos as $key => $value): ?>
            <tr>
              <td><?php echo$value["id"]; ?></td>
              <td><?php echo$value["titulo"]; ?></td>
              <td><?php echo$value["descripcion"]; ?></td>
              <td><?php echo$value["precio"]; ?></td>
              <td><?php echo$value["forma_de_pago"]; ?></td>
              <td><?php
				$unegocio=ControladorFormularios::ctrSelecionarUnegocioUni("id", $value["u_negocioGastadora"]);
				 echo$unegocio["nombre"]; 
				?></td>
				<td><?php
				$unegocio=ControladorFormularios::ctrSelecionarUnegocioUni("id", $value["u_negocioPaga"]);
				 echo$unegocio["nombre"]; 
				?></td>
			
              <td><?php 
              if($value["estado"]==0){
                echo "Rechazada";
              }else if($value["estado"]==1){
                echo "Solicitud";
              }else if($value["estado"]==2){
                echo "Aprobado por resp. de área";
              }else if($value["estado"]==3){
                echo "Aprobado por Adm. y finanzas";
              }else if($value["estado"]==4){
                echo "Aprobado por Directorio";
              }else if($value["estado"]==5){
                echo "Pago liquidado";
              }else if($value["estado"]==6){
                echo "Finalizacion";
              }
              else if($value["estado"]==15){
                echo "Revision";
              }
            ?></td>
            <td><?php echo$value["observacion"]; ?></td>
            <td><?php echo$value["observacioncompra"]; ?></td>
            <td><?php echo$value["fechaCompra"]; ?></td>
            <td><?php echo$value["fechaPago"]; ?></td>
            <td><?php if($value["estado"]==1){ ?>
            <div class="btn-group">
                  <a href="index.php?pag=editarGasto&id=<?php echo$value["id"]; ?>" class="btn btn-secondary">Editar</a>
                  <form method="post">
                    <input type="hidden" name="eliminar" value="<?php echo$value["id"]; ?>">
                    <button type="submit" class="btn" style="background-color:#b21328; color:white;">Eliminar</button>
                    <?php
                    $eliminar= new ControladorFormularios();
                    $eliminar->ctrEliminarGeneral("gastos");
                    ?>
                  </form>
                </div>
            <?php }else if($value["estado"]==15){ ?>
                <a href="index.php?pag=editarGasto&id=<?php echo$value["id"]; ?>" class="btn btn-secondary">Revision</a>
            <?php    
            } 
            ?></td>
            <td>
                <?php 
               
                if($value["documento"]=="style/img/documentaciongasto/"){ ?>
                <p>sin</p>
                <?php }else{ ?>
                
                    <a href="<?php echo $value["documento"]; ?>" download="DocumentoGastos">
                    
                    Ver
                    </a>
                <?php } ?>
                </td>
                <td>
                <?php 
               
                if($value["documento2"]==""){ ?>
                <p>sin</p>
                <?php }else{ ?>
                
                    <a href="<?php echo $value["documento2"]; ?>" download="DocumentoGastos">
                    
                    Ver
                    </a>
                <?php } ?>
                </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </center>
</div>
</div>
<br>
<?php } ?>
<?php
if($usuario['privadministrativo']==1 or $usuario['privadministrativo']==2 or $usuario['privadministrativo']==3or $usuario['privadministrativo']==4){ ?>
<h2>Historial de pedidos</h2>
  <div class="container">
      <a href="index.php?pag=desgastos" class="btn btn-success btn-sm">
<i class="bi bi-file-earmark-excel"></i> Exportar datos a Excel
</a>
  <div style="margin-top:10px;">
    <center>
      <table class="table table-striped table-responsive display" style="text-transform: capitalize; max-width: 1200px;" id="userTable3">
        <thead>
          <tr style="background-color: #384045; color: #ffff;">
            <th>Id</th>
            <th>Titulo</th>
            <th>Precio</th>
            <th>Tipo de pago</th>
            <th>U. de negocio</th>
            <th>U. Paga</th>
            <th>Empleado</th>
            <th>Observacion</th>
            <th>Observacion Compra</th>
            <th>Fecha compra</th>
            <th>Fecha pago</th>
            <th>Estado</th>
            <th>Doc</th>
            <th>Doc F.</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($gastosgenerales as $key => $value): 
          if($usuario['privadministrativo']==1 and $asesor['id_u_negocio']==$value["u_negocioGastadora"]){ ?>
              <tr>
              <td><?php echo$value["id"]; ?></td>
              <td><?php echo$value["titulo"]; ?></td>
              <td><?php echo$value["precio"]; ?></td>
              <td><?php echo$value["forma_de_pago"]; ?></td>
              <td><?php
        $unegocio=ControladorFormularios::ctrSelecionarUnegocioUni("id", $value["u_negocioGastadora"]);
         echo$unegocio["nombre"]; 
        ?></td>
        <td><?php
        $unegocio=ControladorFormularios::ctrSelecionarUnegocioUni("id", $value["u_negocioPaga"]);
         echo$unegocio["nombre"]; 
        ?></td>
              <td><?php
        $asesor=ControladorFormularios::ctrSelecionarAsesoruni("id", $value["id_asesor"]);
         echo $asesor["nombre"]. " ".$asesor["apellido"]; 
        ?></td>
        <td><?php echo$value["observacion"]; ?></td>
         <td><?php echo$value["observacioncompra"]; ?></td>
            <td><?php echo$value["fechaCompra"]; ?></td>
            <td><?php echo$value["fechaPago"]; ?></td>
        <td><?php 
              if($value["estado"]==0){
                echo "Rechazada";
              }else if($value["estado"]==1){
                echo "Solicitud";
              }else if($value["estado"]==2){
                echo "Aprobado por resp. de área";
              }else if($value["estado"]==3){
                echo "Aprobado por Adm. y finanzas";
              }else if($value["estado"]==4){
                echo "Aprobado por Directorio";
              }else if($value["estado"]==5){
                echo "Pago liquidado";
              }else if($value["estado"]==6){
                echo "Finalizacion";
              }
              else if($value["estado"]==15){
                echo "Revision";
              }
            ?></td>
            <td>
                <?php 
               
                if($value["documento"]=="style/img/documentaciongasto/"){ ?>
                <p>sin</p>
                <?php }else{ ?>
                
                    <a href="<?php echo $value["documento"]; ?>" download="DocumentoGastos">
                    
                    Ver
                    </a>
                <?php } ?>
                </td>
                <td>
                <?php 
               
                if($value["documento2"]==""){ ?>
                <p>sin</p>
                <?php }else{ ?>
                
                    <a href="<?php echo $value["documento2"]; ?>" download="DocumentoGastos">
                    
                    Ver
                    </a>
                <?php } ?>
                </td>
            
          </tr>
          <?php
          }else if($usuario['privadministrativo']==2 or $usuario['privadministrativo']==3or $usuario['privadministrativo']==4){?>
             <tr>
              <td><?php echo$value["id"]; ?></td>
              <td><?php echo$value["titulo"]; ?></td>
              <td><?php echo$value["precio"]; ?></td>
              <td><?php echo$value["forma_de_pago"]; ?></td>
              <td><?php
        $unegocio=ControladorFormularios::ctrSelecionarUnegocioUni("id", $value["u_negocioGastadora"]);
         echo$unegocio["nombre"]; 
        ?></td>
        <td><?php
        $unegocio=ControladorFormularios::ctrSelecionarUnegocioUni("id", $value["u_negocioPaga"]);
         echo$unegocio["nombre"]; 
        ?></td>
              <td><?php
        $asesor=ControladorFormularios::ctrSelecionarAsesoruni("id", $value["id_asesor"]);
         echo $asesor["nombre"]. " ".$asesor["apellido"]; 
        ?></td>
        <td><?php echo$value["observacion"]; ?></td>
        <td><?php echo$value["observacioncompra"]; ?></td>
        
            <td><?php echo$value["fechaCompra"]; ?></td>
            <td><?php echo$value["fechaPago"]; ?></td>
        <td><?php 
              if($value["estado"]==0){
                echo "Rechazada";
              }else if($value["estado"]==1){
                echo "Solicitud";
              }else if($value["estado"]==2){
                echo "Aprobado por resp. de área";
              }else if($value["estado"]==3){
                echo "Aprobado por Adm. y finanzas";
              }else if($value["estado"]==4){
                echo "Aprobado por Directorio";
              }else if($value["estado"]==5){
                echo "Pago liquidado";
              }else if($value["estado"]==6){
                echo "Finalizacion";
              }
              else if($value["estado"]==15){
                echo "Revision";
              }
            ?></td>
            <td>
                <?php 
               
                if($value["documento"]=="style/img/documentaciongasto/"){ ?>
                <p>sin</p>
                <?php }else{ ?>
                
                    <a href="<?php echo $value["documento"]; ?>" download="DocumentoGastos">
                    
                    Ver
                    </a>
                <?php } ?>
                </td>
                <td>
                <?php 
               
                if($value["documento2"]==""){ ?>
                <p>sin</p>
                <?php }else{ ?>
                
                    <a href="<?php echo $value["documento2"]; ?>" download="DocumentoGastos">
                    
                    Ver
                    </a>
                <?php } ?>
                </td>
            
          </tr>   
             
        <?php      
          }else if($usuario['privadministrativo']==4 and $asesor['id_u_negocio']==$value["u_negocioPaga"]){?>
             <tr>
              <td><?php echo$value["id"]; ?></td>
              <td><?php echo$value["titulo"]; ?></td>
              <td><?php echo$value["precio"]; ?></td>
              <td><?php echo$value["forma_de_pago"]; ?></td>
              <td><?php
        $unegocio=ControladorFormularios::ctrSelecionarUnegocioUni("id", $value["u_negocioGastadora"]);
         echo$unegocio["nombre"]; 
        ?></td>
        <td><?php
        $unegocios=ControladorFormularios::ctrSelecionarUnegocioUni("id", $value["u_negocioPaga"]);
         echo$unegocios["nombre"]; 
        ?></td>
              <td><?php
        $asesor=ControladorFormularios::ctrSelecionarAsesoruni("id", $value["id_asesor"]);
         echo $asesor["nombre"]. " ".$asesor["apellido"]; 
        ?></td>
        <td><?php echo$value["observacion"]; ?></td>
        <td><?php echo$value["observacioncompra"]; ?></td>
        
            <td><?php echo$value["fechaCompra"]; ?></td>
            <td><?php echo$value["fechaPago"]; ?></td>
        <td><?php 
              if($value["estado"]==0){
                echo "Rechazada";
              }else if($value["estado"]==1){
                echo "Solicitud";
              }else if($value["estado"]==2){
                echo "Aprobado por resp. de área";
              }else if($value["estado"]==3){
                echo "Aprobado por Adm. y finanzas";
              }else if($value["estado"]==4){
                echo "Aprobado por Directorio";
              }else if($value["estado"]==5){
                echo "Pago liquidado";
              }else if($value["estado"]==6){
                echo "Finalizacion";
              }
              else if($value["estado"]==15){
                echo "Revision";
              }
            ?></td>
           <td>
                <?php 
               
                if($value["documento"]=="style/img/documentaciongasto/"){ ?>
                <p>sin</p>
                <?php }else{ ?>
                
                    <a href="<?php echo $value["documento"]; ?>" download="DocumentoGastos">
                    
                    Ver
                    </a>
                <?php } ?>
                </td>
            
          </tr>   
             
        <?php      
          }
         
          ?>
          
           
        <?php endforeach ?>
      </tbody>
    </table>
  </center>
</div>
</div>

<?php }  ?>
<?php
if($usuario['privadministrativo']==1 and $usuario['privadministrativo']==4){ ?>
<h2>Pagos a realizar externos a area</h2>
<div class="container">
  <div style="margin-top:10px;">
    <center>
      <table class="table table-striped table-responsive display" style="text-transform: capitalize; max-width: 1200px;" id="userTable3">
        <thead>
          <tr style="background-color: #384045; color: #ffff;">
            <th>Id</th>
            <th>Titulo</th>
            <th>Precio</th>
            <th>Tipo de pago</th>
            <th>U. de negocio</th>
            <th>Empleado</th>
            <th>Observacion</th>
            <th>Observacion compra</th>
            <th>Fecha compra</th>
            <th>Fecha pago</th>
            <th>Estado</th>
            <th>Doc</th>
            <th>Doc F</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($gastosgenerales as $key => $value): 
          if($usuario['privadministrativo']==1 or $usuario['privadministrativo']==4 and $asesor['id_u_negocio']==$value["u_negocioPaga"]){ ?>
          <?php if($asesor['id_u_negocio']==$value["u_negocioPaga"]){ ?>
              <tr>
              <td><?php echo$value["id"]; ?></td>
              <td><?php echo$value["titulo"]; ?></td>
              <td><?php echo$value["precio"]; ?></td>
              <td><?php echo$value["forma_de_pago"]; ?></td>
              <td><?php
        $unegocio=ControladorFormularios::ctrSelecionarUnegocioUni("id", $value["u_negocioPaga"]);
         echo$unegocio["nombre"]; 
        ?></td>
              <td><?php
        $asesor=ControladorFormularios::ctrSelecionarAsesoruni("id", $value["id_asesor"]);
         echo $asesor["nombre"]. " ".$asesor["apellido"]; 
        ?></td>
        <td><?php echo$value["observacion"]; ?></td>
        <td><?php echo$value["observacioncompra"]; ?></td>
            <td><?php echo$value["fechaCompra"]; ?></td>
            <td><?php echo$value["fechaPago"]; ?></td>
        <td><?php 
              if($value["estado"]==0){
                echo "Rechazada";
              }else if($value["estado"]==1){
                echo "Solicitud";
              }else if($value["estado"]==2){
                echo "Aprobado por resp. de área";
              }else if($value["estado"]==3){
                echo "Aprobado por Adm. y finanzas";
              }else if($value["estado"]==4){
                echo "Aprobado por Directorio";
              }else if($value["estado"]==5){
                echo "Pago liquidado";
              }else if($value["estado"]==6){
                echo "Finalizacion";
              }
              else if($value["estado"]==15){
                echo "Revision";
              }
            ?></td>
            <td>
                <?php 
               
                if($value["documento"]=="style/img/documentaciongasto/"){ ?>
                <p>sin</p>
                <?php }else{ ?>
                
                    <a href="<?php echo $value["documento"]; ?>" download="DocumentoGastos">
                    
                    Ver
                    </a>
                <?php } ?>
                </td>
                <td>
                <?php 
               
                if($value["documento2"]==""){ ?>
                <p>sin</p>
                <?php }else{ ?>
                
                    <a href="<?php echo $value["documento2"]; ?>" download="DocumentoGastos">
                    
                    Ver
                    </a>
                <?php } ?>
                </td>
            
          </tr>  
          <?php } ?>
          <?php } ?>
        <?php endforeach ?>
      </tbody>
    </table>
  </center>
</div>
</div>
<?php }  ?>
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
<script>
  $(document).ready(function() {
    $('#userTable3').DataTable();
  });
</script>
<script>
  $(document).ready(function() {
    $('#userTable2').DataTable();
  });
</script>


<!-- The Modal -->
<div class="modal" id="myModalgasto">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Solicitud de Pedido</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="container">
          <form  method="post" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Titulo:</label>
                <input type="text" class="form-control" id="inputEmail4" name="titulo">
              </div>
              <div class="form-group col-md-6" id="sacado">
                <label for="inputPassword4">Descripcion:</label>
                <input type="text" class="form-control" id="apellido" name="descripcion">
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail4">Precio:</label>
                <input type="number" class="form-control" id="inputEmail4" name="precio">
              </div>
              <div class="form-group col-md-6" id="sacado">
                <label for="inputPassword4">Forma de pago:</label>
                <select name="formadepago" class="form-control">
                    <option value="Efectivo">Efectivo</option>
                    <option value="Transferencia">Transferencia</option>
                    <option value="Débito automático">Débito automático</option>
                    <option value="TC corporativa">TC corporativa</option>
                    <option value="E-cheq">E-cheq</option>
                </select>
              </div>
               <div class="form-group col-md-12">
                  <label for="subject">Selector Empresa gastadora / imputación real:</label>
                  <select class="form-control" name="unidadGastadora"  required>
                   <?php foreach ($unegocios as $key => $value): ?>
                   
                    <option value="<?php echo$value["id"]; ?>"><?php echo$value["nombre"]; ?></option>
                  <?php endforeach ?>
                  <option>AV/AA</option>
                   <option>Empleados GA</option>
                </select>
                </div>
                <div class="form-group col-md-12">
                <label for="inputEmail4">Observacion:</label>
                <input type="text" class="form-control" id="inputEmail4" name="observacioncompra">
              </div>
              <div class="form-group col-md-12">
                <label for="inputEmail4">Documento:</label>
                <input type="file" class="form-control" id="inputEmail4" name="documento">
              </div>
              <input type="hidden" name="id_asesor" value="<?php echo $usuario['id_asesor']; ?>">
       
              <input type="hidden" name="estado" value="1">
              <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
            <?php 
            $registro=ControladorFormularios::ctrRegistroGastos();
            if ($registro=="ok") {
              echo '<script>setTimeout(function(){window.location="./?pag=agregarGastos";},500);</script>';
            }
            ?>
          </div>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>

      </div>
    </div>
  </div>
<style type="text/css">
  h2{
    text-align: center;
  }
 
</style>

