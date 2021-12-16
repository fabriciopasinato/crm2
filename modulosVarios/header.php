<link rel="stylesheet" type="text/css" href="style/notificaciones.css">
<?php

$count = $_SESSION["id_asesor"]; // eliminar en caso de error en la carga

if($count>0){ $val= $count; }else{$val= $count;}
$idd=$_SESSION["id_asesor"];
if(isset($_SESSION["id_asesor"])){
			$respuesta = ControladorFormularios::ctrSelecionaUsuario("id_asesor", $_SESSION["id_asesor"]);
			if($respuesta["privilegio"]==1){
			   include("notificaciones/conexion.php");include("notificaciones/notiindex.php");
				echo '<nav class="navbar navbar-expand-sm  navbar-dark" style="background-color: #171717 !important;">
   <form method="post"><button type="submit" name="home" style="background-color: transparent; border-color: transparent;">
    <img src="style/img/grupoAmerica.png" width="150px" style="margin-left: 20px;" alt="">
        </button>
	</form>
 
  <ul class="navbar-nav" style="margin-left: 40%;">
  
    <div class="dropdown">
      <a class="nav-link" href="#">Clientes</a>
      <div class="dropdown-content">
      <a class="dropdown-item" href="index.php?pag=filtracionCliente">Buscar clientes/prospecto</a>
        <hr>
        <a class="dropdown-item" href="index.php?pag=panelcliente&id='. $_SESSION["id_asesor"] .'">Panel de clientes</a>
        <a class="dropdown-item" href="index.php?pag=panelProspecto&id='. $_SESSION["id_asesor"].'">Panel de Prospectos</a>
        <hr>
        <a class="dropdown-item" href="index.php?pag=agregarclientes&id='. $_SESSION["id_asesor"] .'">Agregar nuevo cliente</a>
        <a class="dropdown-item" href="index.php?pag=agregarProspecto&id='. $_SESSION["id_asesor"]. '">Agregar Prospecto</a>
      </div>
    </div>
    <li class="nav-item">
      <div class="dropdown">
      <a class="nav-link" href="index.php?pag=tareas&id='. $_SESSION["id_asesor"] .'">Operaciones</a>
      <div class="dropdown-content">
        <a class="dropdown-item" href="index.php?pag=tareas&id='. $_SESSION["id_asesor"] .'">Gestiones comerciales</a>
        <a class="dropdown-item" href="index.php?pag=publicidad">Campañas publicitarias</a>
        <a class="dropdown-item" href="index.php?pag=panelturismo">A.M.P.M. BackOffice(Turismo)</a>
      </div>
    </div>
    </li>
    
    <div class="dropdown">
      <a class="nav-link" href="#">Exportar DB</a>
      <div class="dropdown-content">
        <a class="dropdown-item" href="index.php?pag=descliente">Cartera de clientes</a>
        <a class="dropdown-item" href="index.php?pag=desasesor">Nomina de asesores</a>
        <a class="dropdown-item" href="index.php?pag=desoperacion">Operaciones realizadas</a>
        <a class="dropdown-item" href="index.php?pag=dessercli">Servicio/s por cliente</a>
        <a class="dropdown-item" href="index.php?pag=desgastos">Registros de gastos</a>
      </div>
    </div>
    
    <div class="dropdown">
      <a class="nav-link" href="#">Herramientas</a>
      <div class="dropdown-content">
        <a class="dropdown-item" href="http://drive.grupo-america.com/" target="_blank">Administrador de archivos</a>
        <a class="dropdown-item" href="index.php?pag=mercados">Mercado de valores</a>
        <hr>
        <a class="dropdown-item" href="index.php?pag=agregarGastos">Gestion de gastos</a>
        <a class="dropdown-item" href="index.php?pag=panelnewsletter">Difusion newsletter</a>
        <hr>
        <a class="dropdown-item" href="https://play.google.com/store/apps/developer?id=GrupoAm%C3%A9rica&pcampaignid=pcampaignidMKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1" target="_blank">Apps G.A. (Android)</a>
        <a class="dropdown-item" href="https://apps.apple.com/us/developer/grupo-america/id1565961166" target="_blank">Apps G.A. (Apple)</a>
        
        <hr>
        <a class="dropdown-item" href="https://www.inshome.com.ar/ampm" target="_blank">HomeBanking A.M.P.M.</a>
        <a class="dropdown-item" href="https://ampm.inssales.com.ar/sale/principal.php" target="_blank">E-Commerce A.M.P.M.</a>
      </div>
    </div>
    
        <div class="dropdown">
      <a class="nav-link" href="#">Contacto</a>
      <div class="dropdown-content">
        <a class="dropdown-item" href="index.php?pag=ayuda" target="_blank">América Management</a>
        <a class="dropdown-item" href="http://humhub.grupo-america.com/" target="_blank">América HumHub</a>
        <a class="dropdown-item" href="index.php?pag=faq">Ayuda (F.A.Q.)</a>
      </div>
    </div>
    
    <div class="demo-content" >
            <div id="notification-header">
              <div style="position:relative">
                <button style="color:#ffffff80;" id="notification-icon" name="button" onclick="myFunction()" class="dropbtn"><span id="notification-count"> '.$count .'</span>Notificaciones</button>
                <div id="notification-latest"></div>
              </div>          
            </div>
          </div>
    <li class="nav-item float-right">
      <a class="nav-link" href="index.php?pag=salir"><img src="style/img/exit.png" style="width:22px; height:22px;"></a>
    </li>
    
  </ul>
</nav>';


			}else if($respuesta["privilegio"]==2){
			    include("notificaciones/conexion.php");include("notificaciones/notiindex.php");
				echo '<nav class="navbar navbar-expand-sm  navbar-dark" style="background-color: #171717 !important;">
   <form method="post"><button type="submit" name="home" style="background-color: transparent; border-color: transparent;">
    <img src="style/img/grupoAmerica.png" width="150px" style="margin-left: 20px;" alt="">
        </button>
	</form>
 
  <ul class="navbar-nav" style="margin-left: 40%;">
    <li class="nav-item">
      <a class="nav-link" href="index.php?pag=recursosHumanos">Capital Humano</a>
      
    </li>
    <div class="dropdown">
      <a class="nav-link" href="#">Exportar DB</a>
      <div class="dropdown-content">
        <a class="dropdown-item" href="index.php?pag=desasesor">Empleados</a>
      </div>
    </div>
    <div class="dropdown">
      <a class="nav-link" href="#">Herramientas</a>
      <div class="dropdown-content">
        <a class="dropdown-item" href="http://drive.grupo-america.com/" target="_blank">Administrador de archivos</a>
        <a class="dropdown-item" href="index.php?pag=agregarGastos">Gestion de gastos</a>
      </div>
    </div>
    <div class="demo-content" >
            <div id="notification-header">
              <div style="position:relative">
                <button style="color:#ffffff80;" id="notification-icon" name="button" onclick="myFunction()" class="dropbtn"><span id="notification-count"> '.$count .'</span>Notificaciones</button>
                <div id="notification-latest"></div>
              </div>          
            </div>
          </div>
    <li class="nav-item float-right">
      <a class="nav-link" href="index.php?pag=salir"><img src="style/img/exit.png" style="width:22px; height:22px;"></a>
    </li>
  </ul>
</nav>';

			}else if($respuesta["privilegio"]==3){
			    include("notificaciones/conexion.php");include("notificaciones/notiindex.php");
				echo '<nav class="navbar navbar-expand-sm  navbar-dark" style="background-color: #171717 !important;">
   <form method="post"><button type="submit" name="home" style="background-color: transparent; border-color: transparent;">
    <img src="style/img/grupoAmerica.png" width="150px" style="margin-left: 20px;" alt="">
        </button>
	</form>
 
  <ul class="navbar-nav" style="margin-left: 40%;">
    <div class="dropdown">
      <a class="nav-link" href="#">Clientes</a>
      <div class="dropdown-content">
      <a class="dropdown-item" href="index.php?pag=filtracionCliente">Buscar clientes/prospecto</a>
        <hr>
        <a class="dropdown-item" href="index.php?pag=panelcliente&id='. $_SESSION["id_asesor"] .'">Panel de clientes</a>
        <a class="dropdown-item" href="index.php?pag=panelProspecto&id='. $_SESSION["id_asesor"].'">Panel de Prospectos</a>
        <hr>
        <a class="dropdown-item" href="index.php?pag=agregarclientes&id='. $_SESSION["id_asesor"] .'">Agregar nuevo cliente</a>
        <a class="dropdown-item" href="index.php?pag=agregarProspecto&id='. $_SESSION["id_asesor"]. '">Agregar Prospecto</a>
      </div>
    </div>
      </div>
    </div>
    <li class="nav-item">
        <div class="dropdown">
            <a class="nav-link" href="index.php?pag=tareas&id='. $_SESSION["id_asesor"] .'">Operaciones</a>
        </div>
        <div class="dropdown-content">
            <a class="dropdown-item" href="index.php?pag=tareas&id='. $_SESSION["id_asesor"] .'">Gestiones comerciales</a>
        </div>
    </li>

    <div class="dropdown">
      <a class="nav-link" href="#">Herramientas</a>
      <div class="dropdown-content">
      <a class="dropdown-item" href="index.php?pag=agregarGastos">Gestion de gastos</a>
        <a class="dropdown-item" href="http://drive.grupo-america.com/" target="_blank">Administrador de archivos</a>
        <a class="dropdown-item" href="index.php?pag=mercados">Mercado de valores</a>
                <hr>
        <a class="dropdown-item" href="https://play.google.com/store/apps/developer?id=GrupoAm%C3%A9rica&pcampaignid=pcampaignidMKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1" target="_blank">Apps G.A. (Android)</a>
        <a class="dropdown-item" href="https://apps.apple.com/us/developer/grupo-america/id1565961166" target="_blank">Apps G.A. (Apple)</a>
        
        <hr>
        <a class="dropdown-item" href="https://www.inshome.com.ar/ampm" target="_blank">HomeBanking A.M.P.M.</a>
        <a class="dropdown-item" href="https://ampm.inssales.com.ar/sale/principal.php" target="_blank">E-Commerce A.M.P.M.</a>
      </div>
    </div>
    
        <div class="dropdown">
      <a class="nav-link" href="#">Contacto</a>
      <div class="dropdown-content">
        <a class="dropdown-item" href="http://humhub.grupo-america.com/" target="_blank">América HumHub</a>
        <a class="dropdown-item" href="index.php?pag=ayuda" target="_blank">América Management</a>
        <a class="dropdown-item" href="index.php?pag=faq">Ayuda (F.A.Q.)</a>
      </div>
    </div>
    <div class="demo-content" >
            <div id="notification-header">
              <div style="position:relative">
                <button style="color:#ffffff80;" id="notification-icon" name="button" onclick="myFunction()" class="dropbtn"><span id="notification-count"> '.$count .'</span>Notificaciones</button>
                <div id="notification-latest"></div>
              </div>          
            </div>
          </div>
    <li class="nav-item float-right">
      <a class="nav-link" href="index.php?pag=salir"><img src="style/img/exit.png" style="width:22px; height:22px;"></a>
    </li>
  </ul>
</nav>';

			}else if($respuesta["privilegio"]==4){
			    include("notificaciones/conexion.php");include("notificaciones/notiindex.php");
				echo '<nav class="navbar navbar-expand-sm  navbar-dark" style="background-color: #171717 !important;">
   <form method="post"><button type="submit" name="home" style="background-color: transparent; border-color: transparent;">
    <img src="style/img/grupoAmerica.png" width="150px" style="margin-left: 20px;" alt="">
        </button>
	</form>
 
  <ul class="navbar-nav" style="margin-left: 40%;">
    <div class="dropdown">
      <a class="nav-link" href="#">Clientes</a>
      <div class="dropdown-content">
      <a class="dropdown-item" href="index.php?pag=filtracionCliente">Buscar clientes/prospecto</a>
        <hr>
        <a class="dropdown-item" href="index.php?pag=panelclienteId&id='. $_SESSION["id_asesor"] .'">Panel de clientes</a>
        <a class="dropdown-item" href="index.php?pag=panelProspectoId&id='. $_SESSION["id_asesor"].'">Panel de Prospectos</a>
        <hr>
        <a class="dropdown-item" href="index.php?pag=agregarclientes&id='. $_SESSION["id_asesor"] .'">Agregar nuevo cliente</a>
        <a class="dropdown-item" href="index.php?pag=agregarProspecto&id='. $_SESSION["id_asesor"]. '">Agregar Prospecto</a>
      </div>
    </div>
      </div>
    </div>
    <div class="dropdown">
      <a class="nav-link" href="#">Herramientas</a>
      <div class="dropdown-content">
        <a class="dropdown-item" href="index.php?pag=mercados">Mercado de valores</a>
      </div>
    </div>
        
        
      </div>
    </div>
    <div class="demo-content" >
            <div id="notification-header">
              <div style="position:relative">
                <button style="color:#ffffff80;" id="notification-icon" name="button" onclick="myFunction()" class="dropbtn"><span id="notification-count"> '.$count .'</span>Notificaciones</button>
                <div id="notification-latest"></div>
              </div>          
            </div>
          </div>
    <li class="nav-item float-right">
      <a class="nav-link" href="index.php?pag=salir"><img src="style/img/exit.png" style="width:22px; height:22px;"></a>
    </li>
  </ul>
</nav>';

			}
		}else{
			echo '<script>window.location ="index.php?pag=login";</script>';
		}

?>

<?php 
	if (isset($_POST['home'])) {
		if(isset($_SESSION["id_asesor"])){
			$respuesta = ControladorFormularios::ctrSelecionaUsuario("id_asesor", $_SESSION["id_asesor"]);
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
	?>


<style>
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 10;
}

.dropdown:hover .dropdown-content {
  display: block;
}

*{
  transition-duration: 0.5s !important;
}
.navbar{
  width: 100%;
  height: auto;
  background-color: #171717 !important;
  color: #fff;
  border-bottom: 4px solid #384045;
  border-bottom: 6px solid #b2132b;
}

#salir{
  background-color: #b2132b;
  border-radius: 5px;
}

#salir:hover{
  background-color: white !important;
}

@media (max-width: 700px) {
  .navbar-nav {
    margin-left:0% !important;
  }
}
</style>

