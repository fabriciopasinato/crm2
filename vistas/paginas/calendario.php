<?php 
if(isset($_SESSION["validarIngreso"])){
  if($_SESSION["validarIngreso"]!="ok"  ){
    echo '<script>window.location ="index.php?pag=calendario";</script>';
    return;
  }
}else{
  echo '<script>window.location ="index.php?pag=login";</script>';
  return;
}
 ?>
 <?php 
 include "modulosVarios/header.php";
 include('fullcalendar/index.php');
 ?>
 <br>
 <br>

<style type="text/css">
.h2, h2 {
  
    text-transform: capitalize;
}
.fc td, .fc th {
    background-color:#fff;
}
  body{
    background-image: url(style/img/hexagono.png);
    
  }
</style>
    