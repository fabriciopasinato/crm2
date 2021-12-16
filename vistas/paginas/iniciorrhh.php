<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php 
if(isset($_SESSION["validarIngreso"])){
  if($_SESSION["validarIngreso"]!="ok"  ){
    echo '<script>window.location ="index.php?pag=inicio";</script>';
    return;
  }
}else{
  echo '<script>window.location ="index.php?pag=login";</script>';
  return;
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
include "modulosVarios/header.php";
$vall=$_SESSION["id_asesor"];
$asesor=ControladorFormularios::ctrSelecionarAsesoruni("id", $vall);
?>

<div class="content" >

  <div style="display: flex; justify-content:center; max-height: 600px !important; margin-bottom: 15px !important;" class="divgeneral">
    <div style="width:50%; height: 200px !important; flex-direction: row; margin-top:1%; margin-left: 2%; max-height: 500px !important;" class="divgeneral">

      <div class="main center" style="margin-bottom:8px; ">
        <div class="card center estadisticas" style="background-image: url(style/img/perfill.png); background-size: cover; height:79.2vh; width: 100%;">
          <a href="index.php?pag=perfilAsesor&id=<?php echo $_SESSION["id_asesor"]; ?>" class="heading" style="text-decoration: none !important; font-weight: bold; cursor: pointer;"><center><img class="imag" src="style/img/miperfil.png" />
          <br> 
          <p style="text-decoration: none !important; color: white; font-size:150% ;"> Mi perfil </p></center></a>
        </div>
      </div>
    </div>

    <div style="width:50%; height: 200px !important; flex-direction: row; margin-top:1%; margin-left: 8px; margin-right: 2%; max-height: 500px !important; " class="divgeneral">

      <div class="main center" style="margin-bottom:8px; ">
        <div class="card center estadisticas" style="background-image: url(style/img/estadisticas.png); background-size: cover; height:38vh; width: 100%;">
            <a href="index.php?pag=estadisticas&id=<?php echo $_SESSION["id_asesor"]; ?>" class="heading" style="text-decoration: none !important; font-weight: bold; cursor: pointer;"><center><img class="imagenn" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPjxsaW5rIHR5cGU9InRleHQvY3NzIiByZWw9InN0eWxlc2hlZXQiIGlkPSJkYXJrLW1vZGUtY3VzdG9tLWxpbmsiPjwvbGluaz48bGluayB0eXBlPSJ0ZXh0L2NzcyIgcmVsPSJzdHlsZXNoZWV0IiBpZD0iZGFyay1tb2RlLWdlbmVyYWwtbGluayI+PC9saW5rPjxzdHlsZSBsYW5nPSJlbiIgdHlwZT0idGV4dC9jc3MiIGlkPSJkYXJrLW1vZGUtY3VzdG9tLXN0eWxlIj48L3N0eWxlPjxzdHlsZSBsYW5nPSJlbiIgdHlwZT0idGV4dC9jc3MiIGlkPSJkYXJrLW1vZGUtbmF0aXZlLXN0eWxlIj48L3N0eWxlPjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0ibTQ3NiAzMmgtNDQwYTI4LjAzMSAyOC4wMzEgMCAwIDAgLTI4IDI4djMyMGEyOC4wMzEgMjguMDMxIDAgMCAwIDI4IDI4aDE2MC45bC0xMC42NyAzMmgtMTguMjNhOCA4IDAgMCAwIC04IDh2MTZoLTU2YTggOCAwIDAgMCAwIDE2aDI3MmE4IDggMCAwIDAgMC0xNmgtMjR2LTE2YTggOCAwIDAgMCAtOC04aC0xOC4yM2wtMTAuNjctMzJoMTYwLjlhMjguMDMxIDI4LjAzMSAwIDAgMCAyOC0yOHYtMzIwYTI4LjAzMSAyOC4wMzEgMCAwIDAgLTI4LTI4em0tMTQwIDQyNHY4aC0xNjB2LTh6bS0xMzIuOS0xNiAxMC42Ny0zMmg4NC40NmwxMC42NyAzMnptMjg0LjktNjBhMTIuMDEgMTIuMDEgMCAwIDEgLTEyIDEyaC00NDBhMTIuMDEgMTIuMDEgMCAwIDEgLTEyLTEydi0xMmg0NjR6bTAtMjhoLTQ2NHYtMjkyYTEyLjAxIDEyLjAxIDAgMCAxIDEyLTEyaDQ0MGExMi4wMSAxMi4wMSAwIDAgMSAxMiAxMnoiIGZpbGw9IiNmZmZmZmYiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48cGF0aCBkPSJtNDA4IDQ2NGgtOGE4IDggMCAwIDAgMCAxNmg4YTggOCAwIDAgMCAwLTE2eiIgZmlsbD0iI2ZmZmZmZiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiIgY2xhc3M9IiI+PC9wYXRoPjxwYXRoIGQ9Im02NCAyNDBhMjQuMDM3IDI0LjAzNyAwIDAgMCAyMy41NTctMTkuNDIzbDg0LjAwOS01Ni4wMDZhMjMuOTg4IDIzLjk4OCAwIDAgMCA0Mi4xLTIuMjVsODMuMSAyNy43YTI0IDI0IDAgMCAwIDQ2Ljg0Mi0xLjcyN2w4OC40NzMtNjYuMzU1YTIzLjk2IDIzLjk2IDAgMSAwIC03Ljc4MS0xNC4xNjNsLTg0LjE5MyA2My4xNDRhMjMuOTg0IDIzLjk4NCAwIDAgMCAtNDEuNzcxIDIuNzU5bC04My4xLTI3LjdhMjQgMjQgMCAwIDAgLTQ2Ljc5MSAxLjQ0NGwtODQuMDExIDU2LjAwNmEyNCAyNCAwIDEgMCAtMjAuNDM0IDM2LjU3MXptMzg0LTE0NGE4IDggMCAxIDEgLTggOCA4LjAwOSA4LjAwOSAwIDAgMSA4LTh6bS0xMjggODBhOCA4IDAgMSAxIC04IDggOC4wMDkgOC4wMDkgMCAwIDEgOC04em0tMTI4LTMyYTggOCAwIDEgMSAtOCA4IDguMDA5IDguMDA5IDAgMCAxIDgtOHptLTEyOCA2NGE4IDggMCAxIDEgLTggOCA4LjAwOSA4LjAwOSAwIDAgMSA4LTh6IiBmaWxsPSIjZmZmZmZmIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIiBjbGFzcz0iIj48L3BhdGg+PHBhdGggZD0ibTQ4IDMyOGg0MTZhOCA4IDAgMCAwIDAtMTZoLTh2LTE2OGE4IDggMCAwIDAgLTE2IDB2MTY4aC00OHYtNDhhOCA4IDAgMCAwIC0xNiAwdjQ4aC00OHYtODBhOCA4IDAgMCAwIC0xNiAwdjgwaC00OHYtNDhhOCA4IDAgMCAwIC0xNiAwdjQ4aC00OHYtMTEyYTggOCAwIDAgMCAtMTYgMHYxMTJoLTQ4di00OGE4IDggMCAwIDAgLTE2IDB2NDhoLTQ4di00OGE4IDggMCAwIDAgLTE2IDB2NDhoLThhOCA4IDAgMCAwIDAgMTZ6IiBmaWxsPSIjZmZmZmZmIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIiBjbGFzcz0iIj48L3BhdGg+PC9nPjwvZz48L3N2Zz4=" />
                <br> 
          <p style="text-decoration: none !important; color: white;"> Estadisticas </p></center></a>
          
        </div>
      </div>
      
      <div class="main center" style="margin-bottom:8px; ">
        <div class="card center estadisticas" style="text-decoration: none !important; background-size: cover; background-image: url(style/img/Agregarcliente.png); margin-bottom: 8px !important; height:40vh; width: 50%; ">
            <a href="index.php?pag=recursosHumanos&id=<?php echo $_SESSION["id_asesor"]; ?>" class="heading" style="text-decoration: none !important; font-weight: bold; cursor: pointer;"><center>
                <img class="imagenn" style="width: 140px !important;" src="style/img/Nomina.png" alt="Nomina Empresarial">
          <br> 
          <p style="text-decoration: none !important; color: white;"> Nómina empresarial</p></center></a>

         
        </div>
        <div class="card center estadisticas" style="text-decoration: none !important; background-size: cover; background-image: url(style/img/Calendario.png); margin-bottom: 8px !important; height:40vh; width: 50%;margin-left:1.4%;">
            <a href="index.php?pag=calendario&id=<?php echo $_SESSION["id_asesor"]; ?>" class="heading" style="text-decoration: none !important; font-weight: bold; cursor: pointer;"><center><img class="imagenn" src="style/img/calendar.png" />
          <br> 
          <p style="text-decoration: none !important; color: white;"> Calendario </p></center></a>
          
         
        </div>
        
    
  </div>



<style>
  .footer{
    background-color: #171717;
    color: white;
    width: 100%;
    height: 20px;
    bottom: 0%;
    position: fixed;
  }
</style>
</div>

<style>
    .center{
      display: flex;
      justify-content: center;
      align-items: center;
      
    }
    .card{
      width: 100%;
     
      background-color: #b21328 !important;
      color: white;
      position: relative;
      flex-direction: column;
    }
    .card .headling{
      font-size: 3rem;
      transform: translateY(80px);
      transition: all .4s;
    }
    .imag{
        width: 130px;
    }
    .imag:hover{
        width: 140px;
    }
    .imagenn{
        width:80px;
    }
    .imagenn:hover{
        width: 90px;
    }
    .card .text{
      font-size: 1.1rem;
      color: white;
      margin: 10px 30px;
      transform: translateY(50px);
      opacity: 0;
      transition: all .4s;
    }

    .card .btn{
      width: 150px;
      height: 40px;
      background: #b21328;
      color: white !important;
      border: none;
      margin:10px;
      font-size: 1.1rem;
      cursor: pointer;
      transition: all .5s;
      transform: translateY(50px);
      outline: none;
      opacity: 0;
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


.estadisticas{
  background-image: url(https://grupo-america.com/wp-content/uploads/2020/11/cropped-bolsa.jpg);

}
@media (max-width: 800px) {
      .navbar-nav{
        margin-left: 0% !important;
      }
      .divgeneral{
        display: block !important;
        width:100% !important;
      }
      .divcartas{
        width: 100%;
      }
      .divcartascalen{
        width: 100%;
        margin-top: 30%;
        margin-left: 0;
      }
    }
    
        .card:hover{
box-shadow: 1px 1px 95px 53px black inset !important;
}

 @media (max-width: 600px) {
        .estadisticas{
            height:auto !important;
        }
    }

  </style>

</div>