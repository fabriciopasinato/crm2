<?php 
header("Pragma: public");
header("Expires: 0");
$filename = "gastos.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
$gastosgenerales=ControladorFormularios::ctrSelecionarGastos(null, null); ?>
<table>
        <thead>
          <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Precio</th>
            <th>Tipo de pago</th>
            <th>U. de negocio compra</th>
            <th>U. de negocio paga</th>
            <th>Empleado</th>
            <th>Observacion</th>
            <th>Fecha compra</th>
            <th>Fecha pago</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($gastosgenerales as $key => $value): ?>

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
            <td><?php echo$value["fechaCompra"]; ?></td>
            <td><?php echo$value["fechaPago"]; ?></td>
        <td><?php 
              if($value["estado"]==0){
                echo "Rechazada";
              }else if($value["estado"]==1){
                echo "Solicitud";
              }else if($value["estado"]==2){
                echo "Pendiente";
              }else if($value["estado"]==3){
                echo "Confirmado";
              }else if($value["estado"]==4){
                echo "Aceptado el pago";
              }else if($value["estado"]==5){
                echo "Finalizada";
              }
            ?></td>
            
          </tr>
         
         
          
           
        <?php endforeach ?>
      </tbody>
    </table>