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
      <div id="roteadores"></div>
      <div id="nroteadores"></div>
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
                  <a class="white item" value="" name="teste" onclick="this.parentNode.submit()"><i class="sitemap icon"></i>Sala de Aula</a>
                       
                  </form>
            </div>
        </div>
        <div class="row">
            <div class="column">
              <form action="../3" method="post">
                  <input type="hidden" name="teste" value="'.$row['nome'].'"/>
                  <a class="white item" value="" name="teste" onclick="this.parentNode.submit()"><i class="desktop icon"></i>Laboratórios</a>
                       
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
              <form action=".." method="post">
                  <input type="hidden" name="teste" value=""/>
                  <a class="white item" value="" name="teste" onclick="this.parentNode.submit()"><i class="sign-out icon"></i>Sair      </a>
                  </form>
            </div>
        </div>
          
          
  </div>
  
</div>

<div class="ui three column centered grid" style="padding-left: 10px; padding-right: 10px;">
  <div class="six column centered row">
  <?php 
              include '../controller/newfunctions.php';
              include '../model/conecta.inc';                  
              $escolas = getSchool();
              $nome1 = null;
              //Para pegar os nomes da escolas
              while($row = $escolas->fetch_assoc()) {
                //pega todos os ip, id do ip e nome da escola
                $nome1 = str_replace(" ","",$row['nome']);
                //echo ($nome1);

                echo  '<div class="column" style="padding-top: 10px;">
                <div class="ui cards">
                  <div class="blue card">
                    <div class="content">
                      <div class="center align header">
                          <form action="../view/school.php" method="post" target="_blank">
                                  <input type="hidden" name="teste" value="'.$row['nome'].'"/>
                                  <a class="white item" value="'.$row['nome'].'" name="teste" onclick="this.parentNode.submit()" style="text-align: center; font-size: 9px; text-align: center; color: white; font-weight: bold;">
                                      '.$row['nome'].'
                                  </a>
                                  <i class="right floated red sync icon" id="'.$nome1.'"></i>
                          </form>
                       </div>
                    </div>
                </div>
            </div>  
         </div>';

               };?>
</div>
      
  <script src="../view/js/apiBolinhaJs.js"></script>

  <script>
    $('.ui.sidebar').sidebar({
    context: $('.bottom.segment')
  })
  .sidebar('attach events', '.menu .item');
  </script>
  <script>/*
  $('#AdolfinaLeonorSoaresdosSantos')(function() {
    $(this).toggleClass('right floated yellow circle icon');
    $(this).toggleClass('right floated green circle icon');
  });*/
  </script>
</body>
</html>