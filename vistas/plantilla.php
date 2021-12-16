<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="shortcut icon" href="style/img/favicon.ico">
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<?php 
	if(isset($_GET["pag"])){
		if($_GET["pag"]=="inicio" || $_GET["pag"]=="login"|| $_GET["pag"]=="agregarclientes" || $_GET["pag"]=="panelcliente"|| $_GET["pag"]=="editar_cliente"|| $_GET["pag"]=="inicioadmin"|| $_GET["pag"]=="operaciones"|| $_GET["pag"]=="historialOperaciones"|| $_GET["pag"]=="agregarAsesor"|| $_GET["pag"]=="agregarUsuario"|| $_GET["pag"]=="agregarUnegocio"|| $_GET["pag"]=="agregarServicio"|| $_GET["pag"]=="salir"|| $_GET["pag"]=="estadisticas"|| $_GET["pag"]=="estadisticasadmin" || $_GET["pag"]=="perfilcliente"|| $_GET["pag"]=="agegarserviciocliente"|| $_GET["pag"]=="ayuda"|| $_GET["pag"]=="olvidastecontra"|| $_GET["pag"]=="mercados"|| $_GET["pag"]=="panelnewsletter"|| $_GET["pag"]=="enviarnewsletter"|| $_GET["pag"]=="exportar"|| $_GET["pag"]=="descliente"|| $_GET["pag"]=="desoperacion"|| $_GET["pag"]=="dessercli"|| $_GET["pag"]=="desasesor"|| $_GET["pag"]=="enviarnewsletteruneg"|| $_GET["pag"]=="recursosHumanos"|| $_GET["pag"]=="perfilAsesor"|| $_GET["pag"]=="iniciorrhh"|| $_GET["pag"]=="inicioempleado"|| $_GET["pag"]=="faq"|| $_GET["pag"]=="tareas"|| $_GET["pag"]=="inicioAcomercial"|| $_GET["pag"]=="panelclienteId"|| $_GET["pag"]=="agregarProspecto"|| $_GET["pag"]=="panelProspecto"|| $_GET["pag"]=="perfilProspecto"|| $_GET["pag"]=="editarProspecto"|| $_GET["pag"]=="pasajeAcliente"|| $_GET["pag"]=="actualizadonoti"|| $_GET["pag"]=="calendario"|| $_GET["pag"]=="agregarGastos"|| $_GET["pag"]=="filtracionCliente"|| $_GET["pag"]=="desgastos"|| $_GET["pag"]=="panelturismo"|| $_GET["pag"]=="backoficeturismo"|| $_GET["pag"]=="actualizarbackoffice"|| $_GET["pag"]=="infocompletabackoff"|| $_GET["pag"]=="cEstadoGasto"|| $_GET["pag"]=="panelProspectoId"|| $_GET["pag"]=="publicidad"|| $_GET["pag"]=="editarGasto"){
			include "paginas/".$_GET["pag"].".php";
		}else{
			include "paginas/error404.php";
			
		}
	}else{
	    if(isset($_SESSION["id_asesor"])){
			$respuesta = ControladorFormularios::ctrSelecionaUsuario("id", $_SESSION["id_asesor"]);
			if($respuesta["privilegio"]==1){include "paginas/inicio.php";}else if($respuesta["privilegio"]==2){
			    include "paginas/iniciorrhh.php";
			}else if($respuesta["privilegio"]==3){
			    include "paginas/inicioempleado.php";
			}else if($respuesta["privilegio"]==4){
			    include "paginas/inicioAcomercial.php";
			}else{
			    include "paginas/inicioadmin.php";
			}
			
	    }else{
	        include "paginas/login.php";
	    }
		
	}
	?>
</body>
</html>