<?php
    $conn = new mysqli("localhost","crm","Dep-sistemas2021","root");
    $count = 0;
    $idd=$_SESSION["id_asesor"];
    $sql2 = "SELECT * FROM notificaciones WHERE estado = 0 AND 	id_asesor = $idd ";
    $result = mysqli_query($conn, $sql2);
    $count = mysqli_num_rows($result);
