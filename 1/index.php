


<!DOCTYPE html>
<html lang="en">
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Monitoramento de Roteadores - SEDUC</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    
    <script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
    <script src="../semantic/semantic.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../semantic/semantic.min.css">
    <script src="js/notify.min.js" type="text/javascript"></script>
    <style>
    .ui.card,
    .ui.cards>.card {
    background-color: #2185d0;
    }

    </style>
</head>
<body>
  <div class="ui blue top attached menu">
  <a class="item">
    <i class="sidebar icon"></i>
  </a>
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

<div class="ui grid">
  <div class="row">
    <div class="three wide column">
      <img>
    </div>
    <div class="ten wide column" style="margin-top: 5vh; margin-left: 20vh;">
    <div class="ui styled accordion">
    <!--Seção de adicionar grupos de IP -->
  <div class="title">
  <i class="address card icon"></i>
    Adicionar novo grupo de IP
  </div>
  <div class="content">
 
  <div class="ui form">
  <div class="field">
  <form action="controller/addGroup.php" method="POST" id="addIp">
  
    <div class="field" id="fie">
      <label>Digite o nome de um novo grupo</label>
      <input placeholder="Digite o nome do grupo" name="new" type="text" tabindex="-1" required>
    </div>
    <button type="submit" class="ui primary button">
        Salvar
    </button>
    <button class="ui button" type="reset">
        Descartar
    </button>
    </form>
    
  </div>
</div>  

  </div>
  <!--Fim Seção de Adicionar grupos de IP -->


  <!--Seção de Editar grupos de IP -->
  <div class="title">
    <i class="address book icon"></i>
    Editar grupos de IP
  </div>
  <div class="content">

  <div class="ui form">
            <div class="field">
            <form action="controller/editGroup.php" method="POST">
            <label for="">Selecione um grupo para editar</label>
            <select required id="1" name="escola">
            <option value="0">Selecione um grupo</option>
            <?php 
              include '../controller/newfunctions.php';
              include '../model/conecta.inc'; 

              $teste = getSchool();

              while($row = $teste->fetch_assoc()) {
                echo '<option value="'.$row['idEscola'].'" >'.$row['nome'].'</option>';
            }
            ?>
            </select>
            
            <label for="">Digite um novo nome:</label>
            <div class="ui input focus">
              <input type="text" id="btn" name="editGroup" placeholder="Digite um novo nome" required>
            </div>
                <button class="ui primary button" style="margin-top: 1vh;">Salvar</button>
            </form>

            <button class="ui red button" style="margin-top: 1vh;" onclick="erase()">Apagar</button>
            
            </div>
        </div>




 </div>
  <!--Fim Seção de Editar grupos de IP -->


  <!--Seção de Adicionar IP -->
  <div class="title">
    <i class="cloud upload icon"></i>
    Adicionar Novo IP
  </div>
  <div class="content">
  <div class="ui form">
  <div class="field">
  <form action="controller/addIp.php" method="POST" id="myForm">
  Selecione um grupo de IP
    <select name="escola" required>
      <option value="">Selecione um grupo</option>
      <?php
        $escolas = getSchool();

        while($row = $escolas->fetch_assoc()) {
            echo '<option value="'.$row['nome'].'">'.$row['nome'].'</option>';
        }
      ?>
    </select>
    <div class="field" id="fie">
      <label>Digite o IP</label>
      <input placeholder="Digite o IP" type="text" name="ip" tabindex="-1" required>
    </div>
    <button type="submit" class="ui primary button">
        Salvar
    </button>
    <button class="ui button" type="reset">
        Descartar
    </button>
    </form>
    
  </div>
</div>  
</div>
<!--Fim Seção de Adicionar IP -->

<!--Seção de Editar IP -->
  <div class="title">
    <i class="edit icon"></i>
    Editar IP
  </div>
  <div class="content">
        <div class="ui form">
            <div class="field">
            Selecione um grupo de IP
            <select required id="userid">
            <option value="">Selecione um grupo</option>
            <?php

                $escolas = getSchool();

                while($row = $escolas->fetch_assoc()) {
                    echo '<option value="'.$row['nome'].'">'.$row['nome'].'</option>';
                }
            ?>
            </select>
            <table class="ui celled striped table hidden">
            <thead>
                <tr><th colspan="3">
                    IP's
                    </th>
                </tr></thead>
                <tbody id='table'>
                    <td class="collapsing">
                        <i class="laptop icon"></i> <p class=></p>
                    </td>
                    <td contenteditable="true">IP'S</td>
                    <td class="right aligned collapsing"><i class='edit icon'></i></td>
                <tbody>
            </table>
            <button class="ui primary button" onclick="sub()" id="btnn">
              Salvar
            </button>
            
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
  <script>
  
</script>
  <script src="js/semanticUi.js"></script>
  <script src="js/editarIp.js"></script>
  <script src="js/editarGrupo.js"></script>
</body>
</html>