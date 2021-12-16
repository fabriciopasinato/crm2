<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<link rel="stylesheet" type="text/css" href="style/perfilcliente.css">
<link rel="stylesheet" type="text/css" href="style/tablas.css">

<?php 
if(isset($_SESSION["validarIngreso"])){
  if($_SESSION["validarIngreso"]!="ok"){
    echo '<script>window.location ="index.php?pag=perfilcliente";</script>';
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
  $usuarios=ControladorFormularios::ctrSelecionarClientefetch($item, $valor);
  $infoextra=ControladorFormularios::ctrSelecionarInfoExtra("id_cliente", $valor);

}
?>
<?php
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
      <h3 class="titulo"><?php echo $usuarios['nombre'];?> <?php echo $usuarios['apellido'];?><p style="font-size:60%;"><?php
      $asesorr= ControladorFormularios::ctrSelecionarAsesoruni("id" ,$usuarios['id_asesor']);
      $uneogcio= ControladorFormularios::ctrSelecionarUnegocioUni("id" ,$asesorr['id_u_negocio']);
      echo $uneogcio["nombre"];
      ?></p></h3>
      <p class="texto"><?php echo $usuarios['observacion'];?>.</p>
    </div>
    <div class="perfil-usuario-footer" style="text-transform: capitalize;">
      <ul class="lista-datos">
        <li><i class="icono fas fa-map-signs"></i><?php echo $usuarios['domicilio'];?></li>
        <li><i class="icono fas fa-phone-alt"></i><?php echo $usuarios['telefono'];?></li>
        <li><i class="icono fas fa-briefcase"></i><?php echo $usuarios['actividadlaboral'];?></li>
        <li><i class="icono fas fa-building"></i><?php echo $usuarios['persona'];?></li>
      </ul>
      <ul class="lista-datos">
        <li><i class="icono fa fa-map" aria-hidden="true"></i>Ciudad: <?php echo $usuarios['localidad'];?></li>
        <li><i class="icono fa fa-address-card"></i>DNI: <?php echo $usuarios['dni'];?></li>
        <li><i class="icono fa fa-id-card" aria-hidden="true"></i>CUIT: <?php echo $usuarios['cuit'];?></li>
        <li><i class="icono fa fa-signal"></i>Comitente: <?php echo $usuarios['cuit'];?></li>
      </ul>
    </div>
    <div class="perfil-usuario-footer" style="text-transform: capitalize; margin-top:3%;">
      <ul class="lista-datos">  
        <li><i class="icono fa fa-map" aria-hidden="true"></i>Documentacion: 
        	<?php
          if($usuarios["archivo1"]=="style/img/documentacion/"){ ?>
                
                <?php }else{ ?>
                
                    <a href="<?php echo $usuarios["archivo1"]; ?>" download="Documentacion">
                    Descargar
                    </a>
                <?php } ?>
        </li>
        <li><i class="icono fa fa-map" aria-hidden="true"></i>Documentacion: 
        	<?php
          if($usuarios["archivo2"]=="style/img/documentacion/"){ ?>
             
                <?php }else{ ?>
                
                    <a href="<?php echo $usuarios["archivo2"]; ?>" download="Documentacion">
                    Descargar
                    </a>
                <?php } ?>
        </li>
      </ul>
      <ul class="lista-datos">
        <li><i class="icono fa fa-map" aria-hidden="true"></i>Documentacion: 
        	<?php
          if($usuarios["archivo3"]=="style/img/documentacion/"){ ?>
                
                <?php }else{ ?>
                
                    <a href="<?php echo $usuarios["archivo3"]; ?>" download="Documentacion">
                    Descargar
                    </a>
                <?php } ?>
        </li>
        <li><i class="icono fa fa-map" aria-hidden="true"></i>Documentacion: 
        	<?php
          if($usuarios["archivo4"]=="style/img/documentacion/"){ ?>
                
                <?php }else{ ?>
                
                    <a href="<?php echo $usuarios["archivo4"]; ?>" download="Documentacion">
                    Descargar
                    </a>
                <?php } ?>
        </li>
      </ul>

    </div>
    <div class="perfil-usuario-footer" style="text-align:center; margin-top:3%;">
      <h6 >Informacion adicional:</h6>
      <div class="container">
        <?php if($infoextra==null){ ?>
      <form enctype="multipart/form-data" method="post">
          <div class="row">
            <div class="col-sm-2">
              <label for="inputEmail4">Vehiculo:</label>
              <select class="form-control" name="vehiculo">
                  <option value="0">No</option>
                  <option value="1">Si</option>
              </select>
            </div>
            <div class="col-sm-2">
              <label for="inputEmail4">Propiedad:</label>
              <select class="form-control" name="propiedad">
                  <option value="0">No</option>
                  <option value="1">Si</option>
              </select>
            </div>
            <div class="col-sm-2">
              <label for="inputEmail4">Hijos:</label>
              <select class="form-control" name="hijos">
                  <option value="0">No</option>
                  <option value="1">Si</option>
              </select>
            </div>
            <div class="col-sm-2">
              <label for="inputEmail4">Viaja:</label>
              <select class="form-control" name="viaja">
                  <option value="0">No</option>
                  <option value="1">Si</option>
              </select>
            </div>
           <div class="col-sm-2">
              <label for="inputEmail4">Casado:</label>
              <select class="form-control" name="casado">
                  <option value="0">No</option>
                  <option value="1">Si</option>
              </select>
            </div>
            <div class="col-sm-2">
              <label for="inputEmail4">Campo:</label>
              <select class="form-control" name="campo">
                  <option value="0">No</option>
                  <option value="1">Si</option>
              </select>
            </div>
            <div class="col-sm-2">
              <label for="inputEmail4">Empresario:</label>
              <select class="form-control" name="empresario">
                  <option value="0">No</option>
                  <option value="1">Si</option>
              </select>
            </div>
            <input type="hidden" name="id_cliente" value="<?php echo $usuarios['id']; ?>">
          </div>
          <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
        <?php
        $registro=ControladorFormularios::ctrRegistroInfoA();
        if($registro=="ok"){echo '<script>location.reload();</script>';}
        }else{ ?>
            <form enctype="multipart/form-data" method="post">
          <div class="row">
            <div class="col-sm-2">
              <label for="inputEmail4">Vehiculo:</label>
              <select class="form-control" name="vehiculo">
                  <option value="<?php echo $infoextra["vehiculo"];?>"><?php if($infoextra["vehiculo"]==1){echo "Si";}else{echo "No";}?></option>
                  <option value="0">No</option>
                  <option value="1">Si</option>
              </select>
            </div>
            <div class="col-sm-2">
              <label for="inputEmail4">Propiedad:</label>
              <select class="form-control" name="propiedad">
                  <option value="<?php echo $infoextra["propiedad"];?>"><?php if($infoextra["propiedad"]==1){echo "Si";}else{echo "No";}?></option>
                  <option value="0">No</option>
                  <option value="1">Si</option>
              </select>
            </div>
            <div class="col-sm-2">
              <label for="inputEmail4">Hijos:</label>
              <select class="form-control" name="hijos">
                  <option value="<?php echo $infoextra["hijos"];?>"><?php if($infoextra["hijos"]==1){echo "Si";}else{echo "No";}?></option>
                  <option value="0">No</option>
                  <option value="1">Si</option>
              </select>
            </div>
            <div class="col-sm-2">
              <label for="inputEmail4">Viaja:</label>
              <select class="form-control" name="viaja">
                  <option value="<?php echo $infoextra["viaja"];?>"><?php if($infoextra["viaja"]==1){echo "Si";}else{echo "No";}?></option>
                  <option value="0">No</option>
                  <option value="1">Si</option>
              </select>
            </div>
           <div class="col-sm-2">
              <label for="inputEmail4">Casado:</label>
              <select class="form-control" name="casado">
                  <option value="<?php echo $infoextra["casado"];?>"><?php if($infoextra["casado"]==1){echo "Si";}else{echo "No";}?></option>
                  <option value="0">No</option>
                  <option value="1">Si</option>
              </select>
            </div>
            <div class="col-sm-2">
              <label for="inputEmail4">Campo:</label>
              <select class="form-control" name="campo">
                  <option value="<?php echo $infoextra["campo"];?>"><?php if($infoextra["campo"]==1){echo "Si";}else{echo "No";}?></option>
                  <option value="0">No</option>
                  <option value="1">Si</option>
              </select>
            </div>
            <div class="col-sm-2">
              <label for="inputEmail4">Empresario:</label>
              <select class="form-control" name="empresario">
                  <option value="<?php echo $infoextra["empresa"];?>"><?php if($infoextra["empresa"]==1){echo "Si";}else{echo "No";}?></option>
                  <option value="0">No</option>
                  <option value="1">Si</option>
              </select>
            </div>
            <input type="hidden" name="id_cliente" value="<?php echo $usuarios['id']; ?>">
            <input type="hidden" name="id" value="<?php echo $infoextra['id']; ?>">
          </div>
          <button type="submit" class="btn btn-danger" name="enviar">Actualizar</button>
        </form>
        <?php
        if(isset($_POST["enviar"])){
            $respuesta=ControladorFormularios::ctrActualizacionInfoEcliente();
            if(isset($_SESSION["id_asesor"])){
			$respuesta = ControladorFormularios::ctrSelecionaUsuario("id", $_SESSION["id_asesor"]);
			if($respuesta["privilegio"]==1){
				echo '<script>setTimeout(function(){window.location="index.php?pag=inicio";},1000);</script>';
			}else if($respuesta["privilegio"]==2){
				echo '<script>setTimeout(function(){window.location="index.php?pag=iniciorrhh";},1000);</script>';
			}else if($respuesta["privilegio"]==3){
				echo '<script>setTimeout(function(){window.location="index.php?pag=inicioempleado";},1000);</script>';
			}else if($respuesta["privilegio"]==4){
				echo '<script>setTimeout(function(){window.location="index.php?pag=inicioAcomercial";},1000);</script>';
			}else{
				echo '<script>setTimeout(function(){window.location="index.php?pag=inicioadmin";},1000);</script>';
			}
		}else{
			echo '<script>window.location ="index.php?pag=login";</script>';
		}
        }
        } ?>
        </div>
    </div>
    <div class="redes-sociales">
      <a href="tel:<?php echo $usuarios['telefono'];?>" class="boton-redes facebook fab "><i class="fas fa-phone-square-alt"></i></a>
      <a href="https://wa.me/<?php echo $usuarios['telefono'];?>" target="_blank" class="boton-redes twitter fab fa-whatsapp"><i class="icon-twitter"></i></a>
      <a href="mailto:<?php echo $usuarios['mail'];?>" class="boton-redes instagram fas fa-envelope-square"><i class="icon-instagram"></i></a>
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
      <a href="index.php?pag=historialOperaciones&id=<?php echo$usuarios["id"]; ?>" data-toggle="tooltip" title="Historial de operacion" class="boton-redes instagram fas fa-book-open"><i class="icon-instagram" ></i></a>
      <a href="index.php?pag=agegarserviciocliente&id=<?php echo$usuarios["id"]; ?>" data-toggle="tooltip" title="Agregar servicio a cliente" class="boton-redes instagram fas"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="32" height="32"
viewBox="0 0 226 226"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,226v-226h226v226z" fill="none"></path><g fill="#ffffff"><path d="M31.64,9.04v22.6h-22.6v176.28h54.24v-9.04h-45.2v-158.2h22.6v-22.6h90.4v13.56h-81.36v9.04h103.96v49.72h9.04v-58.76h-22.6v-22.6zM36.16,54.24v9.04h18.08v-9.04zM76.84,54.24v9.04h18.08v-9.04zM117.52,54.24v9.04h18.08v-9.04zM36.16,76.84v9.04h18.08v-9.04zM76.84,76.84v9.04h18.08v-9.04zM117.52,76.84v9.04h18.08v-9.04zM131.08,90.4c-14.72531,0 -25.63687,5.98547 -31.30453,14.90188c-5.17328,8.12187 -5.42047,18.27422 -2.17172,27.73797c-0.35313,0.60031 -0.86516,1.11234 -1.20063,1.83625c-0.70625,1.58906 -1.32422,3.39 -1.23594,5.68531v0.01766c0.24719,5.77359 3.60188,8.79281 6.07375,10.48781c1.04172,5.50875 3.65484,10.11703 7.23906,13.41875v9.67563c-0.79453,1.90687 -2.38359,3.51359 -5.43812,5.19094c-3.19578,1.76563 -7.52156,3.42531 -11.98859,5.59703c-4.46703,2.17172 -9.12828,4.94375 -12.74781,9.35781c-3.63719,4.43172 -5.98547,10.48781 -5.98547,18.13297v4.52h144.86953l-0.26484,-4.78484c-0.40609,-7.13312 -3.05453,-12.76547 -6.79766,-16.80875c-3.72547,-4.04328 -8.33375,-6.58578 -12.69484,-8.59859c-4.36109,-2.01281 -8.56328,-3.54891 -11.61781,-5.19094c-2.91328,-1.53609 -4.34344,-2.98391 -5.01438,-4.57297v-7.6275c2.70141,-3.90203 3.88438,-8.38672 4.2375,-12.58891c2.15406,-1.90688 4.66125,-4.83781 5.3675,-10.08172c0.47672,-3.76078 -0.47672,-6.60344 -1.94219,-9.00469c2.03047,-5.3675 2.86031,-11.84734 1.07703,-18.29187c-1.02406,-3.74312 -2.96625,-7.41562 -6.19734,-10.15234c-2.52484,-2.17172 -5.98547,-3.37234 -9.81687,-3.90203l-2.89562,-5.91484h-2.825c-4.64359,0 -9.21656,1.07703 -13.15391,2.61312c-1.55375,0.61797 -2.96625,1.28891 -4.29047,2.03047c-0.74156,-0.98875 -1.55375,-1.92453 -2.48953,-2.77203c-2.75438,-2.48953 -6.56813,-3.90203 -10.80562,-4.48469l-3.17813,-6.42687zM36.16,99.44v9.04h18.08v-9.04zM76.84,99.44v9.04h11.22938l5.77359,-9.04zM128.5375,99.95203l2.66609,5.3675h2.78969c3.70781,0 5.98547,1.05938 7.80406,2.68375c1.81859,1.64203 3.14281,4.07859 3.91969,6.93891c1.55375,5.72063 0.22953,13.15391 -1.04172,15.20203l-1.64203,2.61312l1.83625,2.48953c1.07703,1.43016 1.76563,2.91328 1.4125,4.90844c-0.49438,2.78969 -1.50078,3.16047 -3.49594,4.89078l-1.50078,1.28891l-0.05297,1.9775c-0.15891,4.43172 -1.695,8.88109 -4.27281,11.42359l-1.35953,1.32422v15.16672l0.26484,0.74156c1.78328,4.96141 5.77359,8.05125 9.83453,10.29359c4.06094,2.24234 8.43969,3.88438 12.39469,5.80891c3.955,1.92453 7.38031,4.11391 9.74625,6.99187c1.64203,1.9775 2.64844,4.64359 3.26641,7.85703h-89.09344c0.61797,-3.21344 1.62438,-5.87953 3.26641,-7.85703c2.36594,-2.87797 5.79125,-5.06734 9.74625,-6.99187c3.955,-1.92453 8.33375,-3.56656 12.39469,-5.80891c4.06094,-2.24234 8.05125,-5.33219 9.83453,-10.29359l0.26484,-0.74156v-15.66109l-1.9775,-1.34188c-2.08344,-1.4125 -5.50875,-6.58578 -5.98547,-11.22938l-0.24719,-2.50719l-2.26,-1.09469c-1.28891,-0.61797 -2.71906,-0.86516 -2.86031,-4.20219c0,0 0.14125,-0.86516 0.47672,-1.62437c0.35313,-0.77688 0.98875,-1.58906 0.79453,-1.39484l2.17172,-2.17172l-1.21828,-2.825c-3.37234,-7.76875 -2.91328,-15.90828 0.98875,-22.035c3.56656,-5.61469 10.55844,-9.48141 21.13453,-10.18766zM165.24484,108.99203l2.40125,4.90844h2.825c3.42531,0 5.45578,0.90047 7.00953,2.22469c1.57141,1.32422 2.68375,3.26641 3.33703,5.68531c1.34188,4.83781 0.37078,11.44125 -1.16531,14.44281l-1.48313,2.94859l2.33062,2.31297c-0.30016,-0.30016 1.18297,2.15406 0.93578,4.00797c-0.58266,4.43172 -1.21828,4.14922 -3.12516,5.40281l-1.88922,1.25359l-0.14125,2.27766c-0.21187,3.93734 -2.18937,9.85219 -3.24875,10.92922l-1.27125,1.30656v12.39469l0.26484,0.72391c1.71266,4.76719 5.59703,7.66281 9.53437,9.74625c3.91969,2.08344 8.1925,3.61953 12.09453,5.42047c3.90203,1.80094 7.38031,3.83141 9.83453,6.51516c1.57141,1.695 2.63078,3.86672 3.39,6.42687h-26.43141c-0.74156,-5.52641 -2.75437,-10.09938 -5.63234,-13.61297c-3.61953,-4.41406 -8.28078,-7.18609 -12.74781,-9.35781c-4.46703,-2.17172 -8.79281,-3.83141 -11.98859,-5.59703c-3.05453,-1.67734 -4.64359,-3.28406 -5.43813,-5.19094v-10.09938c3.12516,-3.955 4.76719,-8.61625 5.22625,-13.34813c1.74797,-1.53609 4.46703,-4.18453 5.31453,-8.96937c0.68859,-3.91969 -0.47672,-7.11547 -1.92453,-9.71094c2.40125,-5.52641 3.1075,-12.43 1.18297,-19.47484c-0.01766,-0.07063 -0.05297,-0.14125 -0.07063,-0.21188c0.97109,-0.61797 2.20703,-1.32422 3.60188,-1.87156c2.20703,-0.86516 4.78484,-1.18297 7.27437,-1.48313zM36.16,122.04v9.04h18.08v-9.04zM76.84,122.04v9.04h12.44766l-1.62438,-9.04zM36.16,144.64v9.04h18.08v-9.04zM76.84,144.64v9.04h15.59047l-3.77844,-9.04zM36.16,167.24v9.04h18.08v-9.04zM76.84,167.24v9.04h18.08v-9.04z"></path></g></g></svg></a>
      <a href="index.php?pag=operaciones&id=<?php echo$usuarios["id"]; ?>&as=<?php echo $idas;?>" class="boton-redes instagram fas fa-plus" data-toggle="tooltip" title="Hacer operaciones"><i class="icon-instagram"></i></a>
    </div>
  </div>
    </section>
<br><br><br>


<?php 
      /*$ser=ControladorFormularios::ctrSelecionarServiciosxCliente("id_cliente", $valor);*/
      $ser=ControladorFormularios::ctrSelecionarOperaciones("id_cliente", $valor);
      
      function super_unique($array,$key)
    {
       $temp_array = [];
       foreach ($array as &$v) {
           if (!isset($temp_array[$v[$key]]))
           $temp_array[$v[$key]] =& $v;
       }
       $array = array_values($temp_array);
       return $array;

    }
    $serr=super_unique($ser, "id_servicio");
    $uneg=super_unique($ser, "id_unegocio");
    $unidadenegocio=ControladorFormularios::ctrSelecionarUnegocio(null, null);
    
    $elotrox=array();
    foreach ($unidadenegocio as $key => $value) {
    	array_push($elotrox, $value["id"]);
    }
    
    foreach ($uneg as $key => $valuess) {
    	for ($i=0; $i < count($elotrox) ; $i++) { 
    		if ($valuess["id_unegocio"]==$elotrox[$i]) {
    			unset($elotrox[$i]);
    		}
    	}
    }
    $elotro=array();
    for ($i=0; $i < count($elotrox) ; $i++) { 
    		if($elotrox[$i]==null){
    		    
    		}else{
    		    array_push($elotro, $elotrox[$i]);
    		}
    	}
   
      ?>

<center>
  <div class="row justify-content-center">
    <div class="container">
      <!-- Titulo -->
      <div class="row justify-content-center" style="background-color: #171717; border-top: 6px solid #B21328; border-bottom: 3px solid #384045; color: white; justify-content: center; align-items: center; text-align: center; font-weight: bold; padding-top: 3px; padding-bottom: 5px; width: 70%;">
        Servicios adquiridos por el cliente:
    </div>
  <div class="row" style="background-color: #b21328; color:white; padding-left: 4%; padding-right: 4%; padding-top: 15px; padding-bottom: 15px; width: 70%;">
    <div class="col">Servicio</div>
    <div class="col">Unidad de negocio</div>
    <div class="col">Comision</div>
    <div class="col">Transaccion</div>
  </div>
    <!-- Contenido -->
    <?php foreach ($serr as $key => $value): ?>
    <div class="row list" style="background-color: #384045; color:white; padding-left: 4%; padding-right: 4%; padding-top: 15px; padding-bottom: 15px; width: 70%;">
    
      <?php $servicios=ControladorFormularios::ctrSelecionarServiciosunitario("id", $value["id_servicio"]);?>
        <div class="col"><?php echo $servicios["nombre"]; ?> </div>
        <?php $uneg=ControladorFormularios::ctrSelecionarUnegocioUni("id", $value["id_unegocio"]);?>
        <div class="col"><?php echo $uneg["nombre"]; ?></div>
        <?php  $opereta=ControladorFormularios::ctrSelecionarOperacionesDoble("id_cliente", $valor, "id_servicio", $value["id_servicio"]);
        
        $contcomi=0;
            $contdt=0;
            foreach ($opereta as $key => $valuess) {
                $contcomi=$contcomi+$valuess["comision"];
                $contdt=$contdt+$valuess["dtransaccion"];
            }
                ?>
                <div class="col"><?php echo "$". $contcomi; ?></div>
                <div class="col"><?php echo "$".$contdt; ?></div>
    </div>
    <?php endforeach ?>
  </div>
</center>
  <div style="margin:10px;"></div>

<center>
  <div class="row justify-content-center">
    <div class="container">
      <!-- Titulo -->
      <div class="row justify-content-center" style="background-color: #171717; border-top: 6px solid #B21328; border-bottom: 3px solid #384045; color: white; justify-content: center; align-items: center; text-align: center; font-weight: bold; padding-top: 5px; padding-bottom: 5px; width: 70%;">
        Sugerencias recomendadas:
    </div>
  <div class="row" style="background-color: #b21328; color:white; padding-left: 4%; padding-right: 4%; padding-top: 15px; padding-bottom: 15px; width: 70%;">
    <div class="col">Unidad de negocio</div>
  </div>
    <!-- Contenido -->
   <?php for ($j=0; $j < count($elotro) ; $j++) { ?>

    <div class="row list" style="background-color: #384045; color:white; padding-left: 4%; padding-right: 4%; padding-top: 15px; padding-bottom: 15px; width: 70%;">
        <?php $uneg=ControladorFormularios::ctrSelecionarUnegocioUni("id", $elotro[$j]);?>
        <div class="col"><?php echo $uneg["nombre"]; ?></div>
    </div>
    <?php } 
    ?>
  </div>
</center>


    </div>

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