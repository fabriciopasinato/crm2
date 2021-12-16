<?php

class ControladorFormularios{
	#INICIO DE SESION 
	public function ctrIngreso(){
		if(isset($_POST["usuario"])){
			$tabla="usuario";
			$item="usuarios";
			$valor=$_POST["usuario"];
			$respuesta=ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
			if(isset($_POST["contra"])){
				if($respuesta["usuarios"]==$_POST["usuario"] && $respuesta["contrasena"]== $_POST["contra"]){
					if ($respuesta["privilegio"]==1) {
						$_SESSION["validarIngreso"]="ok";
						$_SESSION["id_asesor"]=$respuesta["id_asesor"];
						echo '<div class="jm-loadingpage"><img src="style/img/logo.png" style="border-radius:190px;display: block; margin: auto;margin-top: 10%;"></div>';
						echo '<style type="text/css">.jm-loadingpage {position: fixed;left: 0px;top: 0px;width: 100%;height: 100%;z-index: 999999999;background: url(style/img/Fondo.png) center no-repeat #171717;}</style>';
						echo '<script>window.location ="index.php?pag=inicio";</script>';
					}elseif ($respuesta["privilegio"]==2) {
						$_SESSION["validarIngreso"]="ok";
						$_SESSION["id_asesor"]=$respuesta["id_asesor"];
						echo '<div class="jm-loadingpage"><img src="style/img/logo.png" style="border-radius:190px;display: block; margin: auto;margin-top: 10%;"></div>';
						echo '<style type="text/css">.jm-loadingpage {position: fixed;left: 0px;top: 0px;width: 100%;height: 100%;z-index: 999999999;background: url(style/img/Fondo.png) center no-repeat #171717;}</style>';
						echo '<script>window.location ="index.php?pag=iniciorrhh";</script>';
					}elseif ($respuesta["privilegio"]==3) {
						$_SESSION["validarIngreso"]="ok";
						$_SESSION["id_asesor"]=$respuesta["id_asesor"];
						echo '<div class="jm-loadingpage"><img src="style/img/logo.png" style="border-radius:190px;display: block; margin: auto;margin-top: 10%;"></div>';
						echo '<style type="text/css">.jm-loadingpage {position: fixed;left: 0px;top: 0px;width: 100%;height: 100%;z-index: 999999999;background: url(style/img/Fondo.png) center no-repeat #171717;}</style>';
						echo '<script>window.location ="index.php?pag=inicioempleado";</script>';
					}elseif ($respuesta["privilegio"]==4) {
						$_SESSION["validarIngreso"]="ok";
						$_SESSION["id_asesor"]=$respuesta["id_asesor"];
						echo '<div class="jm-loadingpage"><img src="style/img/logo.png" style="border-radius:190px;display: block; margin: auto;margin-top: 10%;"></div>';
						echo '<style type="text/css">.jm-loadingpage {position: fixed;left: 0px;top: 0px;width: 100%;height: 100%;z-index: 999999999;background: url(style/img/fondo.png) center no-repeat #171717;}</style>';
						echo '<script>window.location ="index.php?pag=inicioAcomercial";</script>';
					}
					else{
						$_SESSION["validarIngreso"]="perfil2";
						echo '<div class="jm-loadingpage"><img src="style/img/logo.png" style="border-radius:190px;display: block; margin: auto;margin-top: 10%;"></div>';
						echo '<style type="text/css">.jm-loadingpage {position: fixed;left: 0px;top: 0px;width: 100%;height: 100%;z-index: 999999999;background: url(style/img/Fondo.png) center no-repeat #171717;}</style>';
						echo '<script>window.location ="index.php?pag=inicioadmin";</script>';
					}
				}else{
					echo '<div class="alert alert-danger">Error de ingreso</div>';
				}
			}else{
				echo '<div class="alert alert-danger">Error de ingreso</div>';
			}	
		}
	}

	#AGREGAR CLIENTES
	static public function ctrRegistroCliente(){
		if(isset($_POST["nombre"])){
			$archivo1=$_FILES["archivo1"]["name"];
			$ruta1=$_FILES["archivo1"]["tmp_name"];
			$destino1="style/img/documentacion/".$archivo1;
			
			$archivo2=$_FILES["archivo2"]["name"];
			$ruta2=$_FILES["archivo2"]["tmp_name"];
			$destino2="style/img/documentacion/".$archivo2;
			
			$archivo3=$_FILES["archivo3"]["name"];
			$ruta3=$_FILES["archivo3"]["tmp_name"];
			$destino3="style/img/documentacion/".$archivo3;
	
			$archivo4=$_FILES["archivo4"]["name"];
			$ruta4=$_FILES["archivo4"]["tmp_name"];
			$destino4="style/img/documentacion/".$archivo4;
			copy($ruta1, $destino1);
			copy($ruta2, $destino2);
			copy($ruta3, $destino3);
			copy($ruta4, $destino4);

			$tabla ="cliente";
			$datos=array("nombre"=>$_POST["nombre"], "apellido"=>$_POST["apellido"], "dni"=>$_POST["dni"], "cuit"=>$_POST["cuit"], "domicilio"=>$_POST["domicilio"], "localidad"=>$_POST["localidad"], "telefono"=>$_POST["telefono"], "mail"=>$_POST["mail"], "actividadlaboral"=>$_POST["actividadlaboral"], "persona"=>$_POST["persona"], "observacion"=>$_POST["observacion"], "id_asesor"=>$_POST["id_asesor"], "user"=>$_POST["nombre"], "pass"=>$_POST["dni"], "archivo1"=>$destino1, "archivo2"=>$destino2, "archivo3"=>$destino3, "archivo4"=>$destino4);
			$respuesta=ModeloFormularios::mdlRegistroCliente($tabla, $datos);
			return $respuesta;
		}
	}
	
	#SELECCIONAR  CLIENTES
	static public function ctrSelecionarCliente($item, $valor){
		$tabla="cliente";
		$respuesta=ModeloFormularios::mdlSeleccionarRegistrosaFetchall($tabla, $item, $valor);
		return $respuesta;
	}
	#SELECCIONAR  backoffice
	static public function ctrSelecionarRegistrobackofTurismo($item, $valor){
		$tabla="clientesturismobackof";
		$respuesta=ModeloFormularios::mdlSeleccionarRegistrosaFetchall($tabla, $item, $valor);
		return $respuesta;
	}
	#SELECCIONAR  backoffice unitario
	static public function ctrSelecionarRegistrobackofTurismofetch($item, $valor){
		$tabla="clientesturismobackof";
		$respuesta=ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
		return $respuesta;
	}
	#SELECCIONAR  CLIENTES fetch
	static public function ctrSelecionarClientefetch($item, $valor){
		$tabla="cliente";
		$respuesta=ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
		return $respuesta;
	}

	#ELIMINAR CLIENTES
	public function ctrEliminarCliente(){
		if(isset($_POST["eliminarMarca"])){
			$tabla="cliente";
			$valor=$_POST["eliminarMarca"];
			$respuesta=ModeloFormularios::mdlEliminarCliente($tabla, $valor);
			if($respuesta == "ok"){
		        if(isset($_SESSION["id_asesor"])){
      $respuesta = ControladorFormularios::ctrSelecionaUsuario("id", $_SESSION["id_asesor"]);
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
	}
	
	#ELIMINAR gelenral
	public function ctrEliminarGeneral($tablaaa){
		if(isset($_POST["eliminar"])){
			$tabla=$tablaaa;
			$valor=$_POST["eliminar"];
			$respuesta=ModeloFormularios::mdlEliminarCliente($tabla, $valor);
			if($respuesta == "ok"){
		        echo '<div class="alert alert-success">Eliminado</div> <script>setTimeout(function(){window.location="index.php?pag=agregarGastos";},1000);</script>';
			}
		}
	}
	
	#ACTUALIZAR CLIENTE
	static public function ctrActualizarCliente(){
		if(isset($_POST["nombre"])){
			$tabla ="cliente";
			$datos=array("nombre"=>$_POST["nombre"], "apellido"=>$_POST["apellido"] ,"dni"=>$_POST["dni"],"cuit"=>$_POST["cuit"],"domicilio"=>$_POST["domicilio"],"localidad"=>$_POST["localidad"],"telefono"=>$_POST["telefono"],"mail"=>$_POST["mail"],"actividadlaboral"=>$_POST["actividadlaboral"],"persona"=>$_POST["persona"],"observacion"=>$_POST["observacion"], "id"=>$_POST["id"]);
			$respuesta=ModeloFormularios::mdlActualizarCliente($tabla, $datos);
			return $respuesta;
		}
	}

	#AGREGAR Operacion
	static public function ctrRegistroOperacion(){
		if(isset($_POST["titulo"])){
		    if (isset($_POST["finalizacion"]) and $_POST["finalizacion"]==1) {
               $estado=2;
            } else {
               $estado=0;
            }
		    
			$tabla ="operaciones";
			$comi=($_POST["dinerotransaccion"]/100)*$_POST["comision"];
			$dtransacion=$_POST["dinerotransaccion"]-$comi;
			$datos=array("titulo"=>$_POST["titulo"], "descripcion"=>$_POST["descripcion"], "fecha"=>$_POST["fecha"], "id_cliente"=>$_POST["id_cliente"], "id_unegocio"=>$_POST["id_unegocio"], "id_asesor"=>$_POST["id_asesor"], "comision"=>$comi, "dtransaccion"=>$dtransacion, "porcomision"=>$_POST["comision"], "id_servicio"=>$_POST["id_servicio"], "estado"=>$estado);
			$respuesta=ModeloFormularios::mdlRegistroOperacion($tabla, $datos);
			return $respuesta;
		}
	}

	#AGREGAR ASESOR
	static public function ctrRegistroAsesor(){
		if(isset($_POST["nombre"])){
			$tabla ="asesor";
			$datos=array("nombre"=>$_POST["nombre"], "apellido"=>$_POST["apellido"], "dni"=>$_POST["dni"], "cuit"=>$_POST["cuil"], "domicilio"=>$_POST["domicilio"], "localidad"=>$_POST["localidad"], "telefono"=>$_POST["atelefono"], "correo"=>$_POST["mail"], "id_u_negocio"=>$_POST["unidaddenegocio"], "puestolaboral"=>$_POST["puestolaboral"]);
			$respuesta=ModeloFormularios::mdlRegistroAsesor($tabla, $datos);
			return $respuesta;
		}
	}
	#AGREGAR USUARIO
	static public function ctrRegistroUsuario(){
		if(isset($_POST["usuario"])){
			$tabla ="usuario";
			$datos=array("usuarios"=>$_POST["usuario"], "contrasena"=>$_POST["contrasena"], "privilegio"=>$_POST["privilegio"], "id_asesor"=>$_POST["id_asesor"], "privadministrativo"=>$_POST["privadmin"], "privturismo"=>$_POST["backturismo"]);
			$respuesta=ModeloFormularios::mdlRegistroUsuario($tabla, $datos);
			return $respuesta;
		}
	}

	#AGREGAR UNIDAD DE NEGOCIO
	static public function ctrRegistroUnegocio(){
		if(isset($_POST["nombre"])){
			$tabla ="unidadnegocio";
			$datos=array("nombre"=>$_POST["nombre"], "descripcion"=>$_POST["descripcion"]);
			$respuesta=ModeloFormularios::mdlRegistroUnegocio($tabla, $datos);
			return $respuesta;
		}
	}

	#AGREGAR SERVICIO
	static public function ctrRegistroServicio(){
		if(isset($_POST["nombre"])){
			$tabla ="servicio";
			$datos=array("nombre"=>$_POST["nombre"], "descripcion"=>$_POST["descripcion"], "precio"=>$_POST["precio"], "id_unidadnegocio"=>$_POST["id_unidadnegocio"]);
			$respuesta=ModeloFormularios::mdlRegistroServicio($tabla, $datos);
			return $respuesta;
		}
	}

	#SELECCIONAR  UNIDAD DE NEGOCIO ALL
	static public function ctrSelecionarUnegocio($item, $valor){
		$tabla="unidadnegocio";
		$respuesta=ModeloFormularios::mdlSeleccionarRegistrosaFetchall($tabla, $item, $valor);
		return $respuesta;
	}
	#SELECCIONAR  UNIDAD DE NEGOCIO
	static public function ctrSelecionarUnegocioUni($item, $valor){
		$tabla="unidadnegocio";
		$respuesta=ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
		return $respuesta;
	}

	#SELECCIONAR  ASESOR all
	static public function ctrSelecionarAsesor($item, $valor){
		$tabla="asesor";
		$respuesta=ModeloFormularios::mdlSeleccionarRegistrosaFetchall($tabla, $item, $valor);
		return $respuesta;
	}
	#SELECCIONAR  asesor 
	static public function ctrSelecionarAsesoruni($item, $valor){
		$tabla="asesor";
		$respuesta=ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
		return $respuesta;
	}
	#SELECCIONAR  usuario 
	static public function ctrSelecionarusuario($item, $valor){
		$tabla="usuario";
		$respuesta=ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
		return $respuesta;
	}

	#SELECCIONAR  OPERACIONES
	static public function ctrSelecionarOperaciones($item, $valor){
		$tabla="operaciones";
		$respuesta=ModeloFormularios::mdlSeleccionarRegistrosaFetchall($tabla, $item, $valor);
		return $respuesta;
	}
	#SELECCIONAR  OPERACIONES doble
	static public function ctrSelecionarOperacionesDoble($item, $valor, $item2, $valor2){
		$tabla="operaciones";
		$respuesta=ModeloFormularios::mdlSeleccionarRegistrosaFetchallDoble($tabla, $item, $valor, $item2, $valor2);
		return $respuesta;
	}

	#SELECCIONAR  SERVICIOS
	static public function ctrSelecionarServicios($item, $valor){
		$tabla="servicio";
		$respuesta=ModeloFormularios::mdlSeleccionarRegistrosaFetchall($tabla, $item, $valor);
		return $respuesta;
	}
	
	#SELECCIONAR  SERVICIOS UNITARIO
	static public function ctrSelecionarServiciosunitario($item, $valor){
		$tabla="servicio";
		$respuesta=ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
		return $respuesta;
	}

	#SELECCIONAR  CITAS
	static public function ctrSelecionarCitas($item, $valor){
		$tabla="eventoscalendar";
		$respuesta=ModeloFormularios::mdlSeleccionarRegistrosaFetchall($tabla, $item, $valor);
		return $respuesta;
	}  

	#SELECCIONAR  CLIENTES ESTADISTICAS 
	static public function ctrSelecionarClienteEstadisticas($item, $valor){
		$tabla="cliente";
		$respuesta=ModeloFormularios::mdlSeleccionarClienteEstadisticas($tabla, $item, $valor);
		return $respuesta;
	}

	#SELECCIONAR  operaciones ESTADISTICAS 
	static public function ctrSelecionarOperacionesEstadisticas($item, $valor){
		$tabla="operaciones";
		$respuesta=ModeloFormularios::mdlSeleccionarOperacionesEstadisticas($tabla, $item, $valor);
		return $respuesta;
	}


	#AGREGAR servicios por clientes
	static public function ctrRegistroServicioCliente(){
		if(isset($_POST["id_unegocio"])){
			$tabla ="servicioxcliente";
			$datos=array("id_unegocio"=>$_POST["id_unegocio"], "id_cliente"=>$_POST["id_cliente"]);
			$respuesta=ModeloFormularios::mdlRegistroServicioCliente($tabla, $datos);
			return $respuesta;
		}
	}

	#SELECCIONAR  SERVICIOS X CLIENTE
	static public function ctrSelecionarServiciosxCliente($item, $valor){
		$tabla="servicioxcliente";
		$respuesta=ModeloFormularios::mdlSeleccionarRegistrosaFetchall($tabla, $item, $valor);
		return $respuesta;
	}


	#Olvido de contraseña
	static public function ctrOlvidasteContra(){
		if(isset($_POST["recuperar"])){
			$tabla="asesor";
			$item="dni";
			$valor=$_POST["dni"];
			$respuesta=ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
			if(isset($_POST["dni"])){
				if($respuesta["dni"]==$_POST["dni"]){
					$respuesta=$respuesta["id"];
					return $respuesta;
				}else{
					echo '<div class="alert alert-danger">No se encontro el asesor</div>';
				}
			}else{
				echo '<div class="alert alert-danger">No se encontro el asesor</div>';
			}	
		}
	}


	#ACTUALIZAR CLIENTE
	static public function ctrActualizarNotas(){
		if(isset($_POST["notas"])){
			$tabla ="asesor";
			$datos=array("nombre"=>$_POST["nombre"], "apellido"=>$_POST["apellido"], "dni"=>$_POST["dni"], "cuit"=>$_POST["cuit"], "domicilio"=>$_POST["domicilio"], "localidad"=>$_POST["localidad"], "telefono"=>$_POST["telefono"], "correo"=>$_POST["correo"], "id_u_negocio"=>$_POST["id_u_negocio"], "puestolaboral"=>$_POST["puestolaboral"], "notas"=>$_POST["notas"], "id"=>$_POST["id"]);
			$respuesta=ModeloFormularios::mdlActualizarAsesor($tabla, $datos);
			return $respuesta;
		}
	}
	
	#SELECCIONAR  NEWSLETTER
	static public function ctrSelecionarNewsletter($item, $valor){
		$tabla="newsletter";
		$respuesta=ModeloFormularios::mdlSeleccionarRegistrosaFetchall($tabla, $item, $valor);
		return $respuesta;
	}
	
	#AGREGAR RRHH
	static public function ctrRegistroRH(){
		if(isset($_POST["id_asesor"])){
			$archivo=$_FILES["archivo"]["name"];
			$ruta=$_FILES["archivo"]["tmp_name"];
			$destino="style/img/rrhh/".$archivo;
			copy($ruta, $destino);
			$tabla =$_POST["tipo"];
			$datos=array("id_asesor"=>$_POST["id_asesor"], "titulo"=>$_POST["titulo"], "fecha"=>$_POST["fecha"], "observacion"=>$_POST["observacion"], "archivo"=>$destino);
			$respuesta=ModeloFormularios::mdlRegistroRRhh($tabla, $datos);
			return $respuesta;
		}
	}

	#SELECCIONAR  novedades 
	static public function ctrSelecionarNovedades($item, $valor){
		$tabla="novedades";
		$respuesta=ModeloFormularios::mdlSeleccionarRegistrosaFetchall($tabla, $item, $valor);
		return $respuesta;
	}
	#SELECCIONAR  carrera 
	static public function ctrSelecionarCarrera($item, $valor){
		$tabla="carrera";
		$respuesta=ModeloFormularios::mdlSeleccionarRegistrosaFetchall($tabla, $item, $valor);
		return $respuesta;
	}
	
	
	#Pasaje de tareas
	static public function ctrTrackeoTareas($idoperacion, $estado){
		$tabla ="operaciones";
		$datos=array("id"=>$idoperacion, "estado"=>$estado);
		$respuesta=ModeloFormularios::mdlTrackeoTareas($tabla, $datos);
		return $respuesta;
		
	}
	
	#AGREGAR prospecto
	static public function ctrRegistroProspecto(){
		if(isset($_POST["nombre"])){
			$tabla ="prospecto";
			$datos=array("nombre"=>$_POST["nombre"], "apellido"=>$_POST["apellido"], "localidad"=>$_POST["localidad"], "telefono"=>$_POST["telefono"], "mail"=>$_POST["mail"], "actividadlaboral"=>$_POST["actividadlaboral"], "persona"=>$_POST["persona"], "observacion"=>$_POST["observacion"], "id_asesor"=>$_POST["id_asesor"]);
			$respuesta=ModeloFormularios::mdlRegistroProspecto($tabla, $datos);
			return $respuesta;
		}
	}

	#SELECCIONAR  prospecto
	static public function ctrSelecionarProspecto($item, $valor){
		$tabla="prospecto";
		$respuesta=ModeloFormularios::mdlSeleccionarRegistrosaFetchall($tabla, $item, $valor);
		return $respuesta;
	}
	#SELECCIONAR  unitario
	static public function ctrSelecionarProspectoUni($item, $valor){
		$tabla="prospecto";
		$respuesta=ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
		return $respuesta;
	}
	#ELIMINAR prospecto
	public function ctrEliminarProspecto(){
		if(isset($_POST["eliminarMarca"])){
			$tabla="prospecto";
			$valor=$_POST["eliminarMarca"];
			$respuesta=ModeloFormularios::mdlEliminarCliente($tabla, $valor);
			if($respuesta == "ok"){
			    if(isset($_SESSION["id_asesor"])){
      $respuesta = ControladorFormularios::ctrSelecionaUsuario("id", $_SESSION["id_asesor"]);
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
	}

	#ACTUALIZAR prospecto
	static public function ctrActualizarProspecto(){
		if(isset($_POST["nombre"])){
			$tabla ="prospecto";
			$datos=array("nombre"=>$_POST["nombre"], "apellido"=>$_POST["apellido"], "localidad"=>$_POST["localidad"],"telefono"=>$_POST["telefono"],"mail"=>$_POST["mail"],"actividadlaboral"=>$_POST["actividadlaboral"],"persona"=>$_POST["persona"],"observacion"=>$_POST["observacion"], "id"=>$_POST["id"]);
			$respuesta=ModeloFormularios::mdlActualizarProspecto($tabla, $datos);
			return $respuesta;
		}
	}
	#SELECCIONAR  usuario
	static public function ctrSelecionaUsuario($item, $valor){
		$tabla="usuario";
		$respuesta=ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
		return $respuesta;
	}
	
	#AGREGAR evento con prospecto
	static public function ctrRegistroEvento($evento, $color_evento, $fecha_inicio, $fecha_fin, $idasesor, $observacion, $hora){
		
			$tabla ="eventoscalendar";
			$datos=array("evento"=>$evento, "color_evento"=>$color_evento, "fecha_inicio"=>$fecha_inicio, "fecha_fin"=>$fecha_fin, "id_asesor"=>$idasesor, "observacion"=>$observacion, "hora"=>$hora);
			$respuesta=ModeloFormularios::mdlRegistroEnvio($tabla, $datos);
			return $respuesta;
		
	}
	
	#SELECCIONAR  NOTIFICACIONES
	static public function ctrSelecionaNotificaciones($item, $valor){
		$tabla="notificaciones";
		$respuesta=ModeloFormularios::mdlSeleccionarRegistrosNotificaciones($tabla, $item, $valor);
		return $respuesta;
	}
	
	#ACTUALIZAR botificaciones
	static public function ctrActualizarNotificacion($id){
			$tabla ="notificaciones";
			$datos=array("id"=>$id, "estado"=>1);
			$respuesta=ModeloFormularios::mdlActualizarNotificaciones($tabla, $datos);
			return $respuesta;
	}
	
	#AGREGAR notificaciones
	static public function ctrRegistroNotificaciones($mensajee, $idd){
			$tabla ="notificaciones";
			$datos=array("mensaje"=>$mensajee, "id_asesor"=>$idd);
			$notificaciones=ModeloFormularios::mdlRegistroNotificacion($tabla, $datos);
		    return $notificaciones;
	}
	
	#SELECCIONAR  GASTOS
	static public function ctrSelecionarGastos($item, $valor){
		$tabla="gastos";
		$respuesta=ModeloFormularios::mdlSeleccionarRegistrosaFetchall($tabla, $item, $valor);
		return $respuesta;
	}
		#SELECCIONAR  GASTOS untiarios
	static public function ctrSelecionarGastosUni($item, $valor){
		$tabla="gastos";
		$respuesta=ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
		return $respuesta;
	}
	#SELECCIONAR  filtro doble
	static public function ctrSelecionarGastosDobleF($item, $valor, $item2, $valor2){
		$tabla="gastos";
		$respuesta=ModeloFormularios::mdlSeleccionarRegistrosFiltroDoble($tabla, $item, $valor,$item2, $valor2);
		return $respuesta;
	}

	#AGREGAR gastos
	static public function ctrRegistroGastos(){
			$tabla ="gastos";
			$archivo=$_FILES["documento"]["name"];
			$ruta=$_FILES["documento"]["tmp_name"];
			$destino="style/img/documentaciongasto/".$archivo;
			copy($ruta, $destino);
			if (isset($_POST['titulo'])) {
				$datos=array("titulo"=>$_POST['titulo'], "descripcion"=>$_POST['descripcion'], "precio"=>$_POST['precio'], "forma_de_pago"=>$_POST['formadepago'], "id_asesor"=>$_POST['id_asesor'], "u_negocioGastadora"=>$_POST['unidadGastadora'], "estado"=>$_POST['estado'], "observacioncompra"=>$_POST['observacioncompra'], "documento"=>$destino);
			$notificaciones=ModeloFormularios::mdlRegistroGastos($tabla, $datos);
		    return $notificaciones;
			}
			
	}

	#Pasaje de gastos
	static public function ctrTrackeoGastos($idgastos, $estado, $item, $valor, $observacion){
			$tabla ="gastos";
			$datos=array("id"=>$idgastos, "estado"=>$estado, "observacion"=>$observacion);
			$respuesta=ModeloFormularios::mdlTrackeoGastos($tabla, $datos, $item, $valor);
			return $respuesta;
	}
	#Pasaje de gastosultimoo
	static public function ctrTrackeoGastosDocu($idgastos, $estado, $item, $valor, $observacion, $destino){
			$tabla ="gastos";
    			$datos=array("id"=>$idgastos, "estado"=>$estado, "observacion"=>$observacion, "documento2"=>$destino);
    			$respuesta=ModeloFormularios::mdlTrackeoGastosarchivo($tabla, $datos, $item, $valor);
    			return $respuesta;
			
	}
	#Pasaje de gastos
	static public function ctrTrackeoGastos2($idgastos, $estado, $item, $valor, $item2, $valor2, $observacion){
			$tabla ="gastos";
			$datos=array("id"=>$idgastos, "estado"=>$estado, "observacion"=>$observacion);
			$respuesta=ModeloFormularios::mdlTrackeoGastos2($tabla, $datos, $item, $valor, $item2, $valor2);
			return $respuesta;
	}
	
	#AGREGAR cuenta corriente de gastos
	static public function ctrCCgasto($fechadinero, $titulo, $precio, $u_negocioGastadora){
			$tabla ="cuentaCgasto";
			$datos=array("fechaDdinero"=>$fechadinero, "titulo"=>$titulo, "gasto"=>$precio, "id_u_negocio"=>$u_negocioGastadora);
			$respuesta=ModeloFormularios::mdlRegistroccGasto($tabla, $datos);
			return $respuesta;
		
	}
	
	#SELECCIONAR  unitario
	static public function ctrSelecionarInfoExtra($item, $valor){
		$tabla="infoAdicional";
		$respuesta=ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
		return $respuesta;
	}
	
	
	#AGREGAR info cliente
	static public function ctrRegistroInfoA(){
		if(isset($_POST["vehiculo"])){
			$tabla ="infoAdicional";
			$datos=array("id_cliente"=>$_POST["id_cliente"], "vehiculo"=>$_POST["vehiculo"], "propiedad"=>$_POST["propiedad"], "hijos"=>$_POST["hijos"], "viaja"=>$_POST["viaja"], "casado"=>$_POST["casado"], "campo"=>$_POST["campo"], "empresa"=>$_POST["empresario"]);
			$respuesta=ModeloFormularios::mdlRegistroInfoEcliente($tabla, $datos);
			return $respuesta;
		}
	}
	
	#ACTUALIZAR info CLIENTE
	static public function ctrActualizacionInfoEcliente(){
		if(isset($_POST["vehiculo"])){
			$tabla ="infoAdicional";
			$datos=array("id_cliente"=>$_POST["id_cliente"], "vehiculo"=>$_POST["vehiculo"], "propiedad"=>$_POST["propiedad"], "hijos"=>$_POST["hijos"], "viaja"=>$_POST["viaja"], "casado"=>$_POST["casado"], "campo"=>$_POST["campo"], "empresa"=>$_POST["empresario"], "id"=>$_POST["id"]);
			$respuesta=ModeloFormularios::mdlActualizarInfoCliente($tabla, $datos);
			return $respuesta;
			
		}
	}
	
	#AGREGAR Operacion
	static public function ctrRegistroBackofficeturismo(){
		if(isset($_POST["referencia"])){
			$tabla ="clientesturismobackof";
			$datos=array("id_cliente"=>$_POST["id_cliente"], "referencia"=>$_POST["referencia"], "formadepago"=>$_POST["formadepago"], "operador"=>$_POST["operador"], "montofinal"=>$_POST["montofinal"], "cuota"=>$_POST["cuota"], "senaproveedor"=>$_POST["señaproveedor"], "totalproveedor"=>$_POST["totalproveedor"], "fechaviaje"=>$_POST["fechaviaje"], "fechacompra"=>$_POST["fechacompra"], "propuesta"=>$_POST["propuesta"], "destino"=>$_POST["destino"], "mtefectivo"=>$_POST["mefectivo"], "mttransferencia"=>$_POST["mtransferencia"], "mtchecke"=>$_POST["mchecke"], "mttcredito"=>$_POST["mtcredito"], "mtdbancario"=>$_POST["mdbancario"], "mtfoperador"=>$_POST["mfoperador"], "mtfagencia"=>$_POST["mfagencia"], "datosacompanante"=>$_POST["datospasajeros"]);
			$respuesta=ModeloFormularios::mdlRegistroBackofficeturismo($tabla, $datos);
			return $respuesta;
		}
	}
	
	
	#ACTUALIZAR CLIENTE
	static public function ctrActualizarBackofficeturismo(){
		if(isset($_POST["referencia"])){
			$tabla ="clientesturismobackof";
			$datos=array("referencia"=>$_POST["referencia"], "formadepago"=>$_POST["formadepago"], "montofinal"=>$_POST["montofinal"], "cuota"=>$_POST["cuota"], "senaproveedor"=>$_POST["señaproveedor"], "totalproveedor"=>$_POST["totalproveedor"], "propuesta"=>$_POST["propuesta"], "destino"=>$_POST["destino"], "mtefectivo"=>$_POST["mefectivo"], "mttransferencia"=>$_POST["mtransferencia"], "mtchecke"=>$_POST["mchecke"], "mttcredito"=>$_POST["mtcredito"], "mtdbancario"=>$_POST["mdbancario"], "mtfoperador"=>$_POST["mfoperador"], "mtfagencia"=>$_POST["mfagencia"], "datosacompanante"=>$_POST["datosacompanante"], "id"=>$_POST["id"]);
			$respuesta=ModeloFormularios::mdlActualizarbackOficeturismo($tabla, $datos);
			return $respuesta;
		}
	}
	
	#AGREGARcita para proximo contacot de prospecto
	static public function ctrRegistroCitaProspecto(){
		if(isset($_POST["datecontacto"])){
			$tabla ="eventoscalendar";
			$evento="Proximo contacto";
			$color="#FF5722";
			$observacion=$_POST["nombre"]." ". $_POST["apellido"];
			$fechafin=date("d-m-Y",strtotime($_POST["datecontacto"]."+ 1 days"));
			$fechaini=$_POST["datecontacto"];
			
            $dateini = new DateTime($fechaini);
            $dateini= $dateini->format('Y-m-d'); 
            
            $datefin = new DateTime($fechafin);
            $datefin=$datefin->format('Y-m-d'); 
			
			$datos=array("evento"=>$evento, "color_evento"=>$color, "fecha_inicio"=>$dateini, "fecha_fin"=>$datefin, "id_asesor"=>$_POST["id_asesor"], "observacion"=>$observacion);
			$respuesta=ModeloFormularios::mdlRegistroCitaProspecto($tabla, $datos);
			return $respuesta;
		}
	}
	
	#ACTUALIZAR gastos
	static public function ctrActualizarGastos(){
		if(isset($_POST["titulo"])){
			$tabla ="gastos";
			$datos=array("titulo"=>$_POST["titulo"], "descripcion"=>$_POST["descripcion"] ,"precio"=>$_POST["precio"],"u_negocioGastadora"=>$_POST["u_negocioGastadora"],"forma_de_pago"=>$_POST["forma_de_pago"],"observacioncompra"=>$_POST["observacioncompra"], "id"=>$_POST["id"], "estado"=>$_POST["estado"]);
			$respuesta=ModeloFormularios::mdlActualizarGastos($tabla, $datos);
			return $respuesta;
		}
	}

	
}