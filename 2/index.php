<?php 
    
    session_start();
    if(!isset($_SESSION['nome'])){
        header('location: ../login');
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Monitoramento de Roteadores - SEDUC</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <link rel="stylesheet" type="text/css" href="../semantic/semantic.min.css">
    <script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
    <script src="../semantic/semantic.min.js"></script>
    <script src="https://www.w3schools.com/lib/w3.js"></script>
    <style>
    .ui.card,
    .ui.cards>.card {
    background-color: #2185d0;
    }
    </style>
</head>
<body>
  <div class="ui blue menu">
  <a class="item">
    <i class="sidebar icon"></i>
  </a>
  <div style="width:350vh; margin:0 auto;">
      <div id="roteadores" style="width:350vh; margin:0 auto;"></div>
      <div id="nroteadores" style="width:350vh; margin:0 auto;"></div>
  </div>
</div>
<div class="ui bottom attached segment">
        <div class="ui blue sidebar blue inverted blue vertical blue menu">
          <div class="item">
             <img src="info_logo.png">
          </div>
          <div class="item">
              <h3><center>Monitoramento de Roteadores</center></h3>
          </div>
      <div>  
      <div class="row">
            <div class="column">
              <form action="../0" method="post">
                  <input type="hidden" name="teste" value="'.$row['nome'].'"/>
                  <a class="white item" value="" name="teste" onclick="this.parentNode.submit()"><i class="server icon"></i>Roteadores</a>
                       
                  </form>
            </div>
        </div>
        <div class="row">
            <div class="column">
              <form action="../2" method="post">
                  <input type="hidden" name="teste" value="'.$row['nome'].'"/>
                  <a class="white item" value="" name="teste" onclick="this.parentNode.submit()"><i class="sitemap icon"></i>Computadores</a>
                       
                  </form>
            </div>
        </div>
        <div class="row">
            <div class="column">
              <form action="../1" method="post">
                  <input type="hidden" name="teste" value=""/>
                  <a class="white item" value="" name="teste" onclick="this.parentNode.submit()"><i class="cog icon"></i> Opções     </a>
                       
                  </form>
            </div>
        </div>
        <div class="row">
            <div class="column">
            <form action="../controller/logout.php" method="post">
                  <input type="hidden" name="teste" value=""/>
                  <a class="white item" value="" name="teste" onclick="this.parentNode.submit()"><i class="sign-out icon"></i>Sair      </a>
              </form>
            </div>
        </div>
          
          
  </div>
  
</div>

<!-- Dimmer para dar blur na tela com loading-->


<!-- Dimmer encerrado -->


<div class="ui grid">
  <div class="row">
    <div class="three wide column">

      <img>
    </div>
    <div class="ten wide column" style="margin-top: 5vh; margin-left: 20vh;">
    <div class="ui styled accordion">

<!--Seção de Editar IP -->
  <div class="title">
    <i class="edit icon"></i>
    Verificar Computadores
  </div>
  <div class="content">
        <div class="ui form">
            <div class="field">
            Selecione um grupo de IP
            <select required id="userid">
            <option value="">Selecione um grupo</option>
            <?php
                include '../controller/newfunctions.php';
                include '../model/conecta.inc';
                $escolas = getSchool();

                while($row = $escolas->fetch_assoc()) {
                    echo '<option value="'.$row['idEscola'].'">'.$row['nome'].'</option>';
                }
            ?>
            </select>
            <div class="ui page dimmer" id="vei">
                <div class="content">
                <div class="ui text loader">Loading</div>
                 </div>
            </div>
            <table class="ui celled striped table hidden" id="teste">
            <thead>
                <tr><th colspan="1">
                    Status
                    </th>
                    <th colspan="1">
                    Patrimonio
                    </th>
                    <th colspan="1">
                    IP
                    </th>
                    <th colspan="1">
                    Tipo
                    </th>
                    <th colspan="1">
                    Local
                    </th>
                </tr></thead>
                <tbody id='table'>
                    <td class="right aligned collapsing">
                        <i class="spinner icon"></i> <p class=></p>
                    </td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td></td>
                <tbody>
            </table>

            </div>
        </div>
  </div>
<!--Fim Seção de Editar IP -->
</div>
    </div>
    <div class="three wide column">
      <img>
    </div>
  </div>
</div>



  <!--    
  <script src="../view/js/apiBolinhaJs.js"></script>
            -->    
  <script>
    let tid = "#usersTable";
    let headers = document.querySelectorAll(tid + " th");

    // Sort the table element when clicking on the table headers
    headers.forEach(function(element, i) {
      element.addEventListener("click", function() {
    w3.sortHTML(tid, ".item", "td:nth-child(" + (i + 1) + ")");
  });
});
  </script>
  <script src="controller/js/verComputador.js"></script>
  <script src="controller/js/semanticUi.js"></script>   
  <!--      
  <script src="controller/js/bolinha.js">
    -->
  </script>
</body>
</html>