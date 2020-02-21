<?php 
if($_POST['teste']==null){
    header('location: vils.php');
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Schools</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="jquery-2.1.3.js"></script>
   <style>
        *{
         margin: 0%;
         padding: 0%;
     }
     .loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('https://media.giphy.com/media/l46CmCB7Ka2PBLE1G/giphy.gif') 50% 50% no-repeat #4185f5;
}
      .in{
        height:90px;
        background-color: #1e6cc7;
        color: white;
        box-shadow: 0px 25px 45px 2px rgba(0,0,0,0.75);
      }

      .li{
          color: white;
          margin-left: 900px;
      }

      .hm{
          color: white;
          margin-left: 1150px;
          position: absolute;
      }

      .bgd{
          background-color: #274c75;
      }

      .card-L{
          max-width: 500px;
          margin-left: 400px;
          margin-top: 130px;
          padding: 30px;
          border-radius: 100px;
          border-color: white;
          border-style: solid;
          border-width: 10px;
          background-color:  #4b79ad;
      }

      .circulo{
          border-radius: 100px;
          height: 150px;
          width: 150px;
          padding-left: 30px;
          padding-top: 30px;
          top: 20px;
          z-index: 999;
          border-color: white;
          border-width: 10px;
          background-color: #274c75;
          border-style: solid;
          position: absolute;
          margin-left: 575px;
          margin-top: 100px;
      }

       .circuloV{
        border-radius: 100px;
          height: 150px;
          width: 150px;
          padding-left: 20px;
          padding-top: 25px;
          top: 20px;
          z-index: 999;
          border-color: white;
          border-width: 10px;
          background-color: #274c75;
          border-style: solid;
          position: absolute;
          margin-left: 560px;
          margin-top: 100px;
       }


      .btnt{
          background-color:#274c75;
          color: white;
          text-decoration: none;
          margin-left: 150px;
          margin-top: 15px;
      }

      .int{
        height:110px;
        background-color: #1e6cc7;
        color: white;
        box-shadow: 0px -16px 90px -17px rgba(0,0,0,0.75);
        margin-top: 30px;
      }

      .logo{
          margin-left: 530px;
          margin-top: 10px;
      }

      .log{
          color: white;
          margin-left: 480px;
      }

      .gitS{
          max-width: 930px;
          margin-left: 80px;
          margin-top: 100px;
      }

      .ma{
          width: 90px;
          height: 90px;
      }

      .Lin{
          color: #1e6cc7;
          text-decoration: none;
      }
      .fom{
             position: absolute;
             margin-left: 500px;
         }
         .td{
             color: red;
         }

         .tb{
             color:  rgb(54, 190, 177);
         }

         .AR{
           
             color: rgb(202, 202, 59);
         }

         .ok{
             color: rgb(34, 139, 34);
         }
         .cr{
             background-color: #1e6cc7;
             color: white;
         }
         .pd{
             padding-left: 30px;
         }
         .bt{
             width: 60px;
             height: 60px;
             border-radius: 60px;
             
             font-size: 15px;
             outline: none;
             text-decoration: none;
             top: 30px;
         }
         .pip{
             height: 800px;
         }
         .brl{
             width: 25px;
             margin: 0%;
             padding: 0%;
         }
         .fd{
            width: 100%;
            height: 100px;
            border-radius: 10px;
         }
         .f1{
             color: white;
             text-decoration: none;
             margin-left: 2px;
         }
         .bgc{
             background-color: white;
         }
    </style>
</head>
<body>
    <div id="loader" class="loader"></div>
    <div style="display:none" id="tudo_page">
    <div class="bgd">
        <nav class="navbar navbar-expand-lg in">
            <a class="navbar-brand" href="http://informaticaeducativa.caraguatatuba.sp.gov.br">
                <img src="info_logo.png" height="70px">
            </a>
            <form class="form-inline my-2 my-lg-0 fom">
                <input class="form-control mr-sm-2" type="search" placeholder="Procurar IP" aria-label="Pesquisar">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Pesquisar</button>
              </form>
              <a class="hm" href="vils.php"><i class="fa fa-home fa-2x"></i></a>
             <a class="li" href="PJ.html"><i class="fa fa-lock fa-2x"></i></a>
        </nav>

         <div class="container">
             <div class="card gitS">
                 <div class="card-login">
                 

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content card-body">
        <div id="conteudo-pagina-lida"></div>
    </div>
  </div>
</div> 
                     <table class="table">
                         <thead class="cr">
                             <tr>
                                 <th scope="col">Nome da Escola</th>
                                 <th scope="col">IP</th>
                                 <th scope="col">Status</th>
                                 
                             </tr>
                         </thead>
                         <tbody>
                             <?php 
                             include '../controller/functions.php';

                             $nome = $_POST['teste'];

                             $escola = getIp($nome);
    
                             while($row = $escola->fetch_assoc()) {
                             echo '<tr>
                             <td>
                             
                                 <button type="submit" name="id" class="btn btn-primary" data-toggle="modal" id="ler-pagina" data-target=".bd-example-modal-lg">'.$row['nome'].'</button>
                                 <input type="hidden" value="'.$row['id'].'" id="teste">
                             </td>
                             <td>
                                 '.$row['ip'].'
                             </td>
                             '.renderizePing($row['ip'],$row['id']).'
                         </tr>';

                             }
                             
                             
                             ?>
                            
                         </tbody>
                     </table>
                 </div>
             </div> 
         </div>
         <div class="int">
            <img src="logo-white.png" height="70px" class=" logo">
             <h6 class="log">Secretaria da Educação - Informática Educativa</h6>
       </div>
</div>
    </div>
    <script>
            
   $(document).ready(function(){
        $("#ler-pagina").click(function(){
            console.log(document.getElementById("teste").value);
            $(function(){
                $.post( "../load/teste.php", { id : document.getElementById("teste").value } );
                $("#conteudo-pagina-lida").load("../load/teste.php"); 
            });
        })
   });
   </script>
    <script type="text/javascript">
        // Este evendo é acionado após o carregamento da página
        jQuery(window).load(function () {
      $(".loader").delay(1500).fadeOut("slow"); //retire o delay quando for copiar!
    $("#tudo_page").toggle("fast");
    });
    </script>
    
</body>
</html>