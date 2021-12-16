<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<nav class="navbar navbar-expand-sm  navbar-dark" style="background-color: #171717 !important;">
   <form method="post"><a href="index.php?pag=inicioadmin" type="submit" name="home" style="background-color: transparent; border-color: transparent;">
    <img src="style/img/grupoAmerica.png" width="150px" style="margin-left: 20px;" alt="">
        </a>
	</form>
 
  <ul class="navbar-nav" style="margin-left: 42%;">
  <li class="nav-item">
      <a class="nav-link" href="index.php?pag=estadisticasadmin">Estadisticas</a>
    </li>
    <div class="dropdown">
      <a class="nav-link" href="#">Agregar</a>
      <div class="dropdown-content">
        <a class="dropdown-item" href="index.php?pag=agregarAsesor">Asesor</a>
        <a class="dropdown-item" href="index.php?pag=agregarUsuario">Usuario del Asesor</a>
        <a class="dropdown-item" href="index.php?pag=agregarServicio">Servicio</a>
        <a class="dropdown-item" href="index.php?pag=agregarUnegocio">Unidad de negocio</a>
      </div>
    </div>

    <li class="nav-item float-right">
      <a class="nav-link" href="index.php?pag=salir"><img src="style/img/exit.png" style="width:22px; height:22px;"></a>
    </li>
  </ul>
</nav>


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


</style>