<?php 
if(isset($_SESSION["validarIngreso"])){
  if($_SESSION["validarIngreso"]!="ok"  ){
    echo '<script>window.location ="index.php?pag=exportar";</script>';
    return;
  }
}else{
  echo '<script>window.location ="index.php?pag=login";</script>';
  return;
}
 ?>

 <nav class="navbar">
  <ul>
    <li>
      <a href="index.php?pag=descliente">Descargar Clientes</a>
    </li>
    <li>
      <a href="index.php?pag=desoperacion">Descargar Operaciones</a>
    </li>
    <li>
      <a href="index.php?pag=dessercli">Descargar servicios por cliente</a>
    </li>
    <li>
      <a href="index.php?pag=desasesor">Descargar Asesores</a>
    </li>
  </ul>
 </nav>