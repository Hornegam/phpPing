<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Viws</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <style>
        *{
         margin: 0%;
         padding: 0%;
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
          padding-left: 14px;
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

      .git{
          max-width: 930px;
          margin-left: 180px;
          margin-top: 150px;
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

         .cr{
             background-color: #1e6cc7;
             color: white;
         }

         .yl{
             color: rgb(216, 216, 52);
         }
         .red{
             color: red;
         }
         .ok{
             color: rgb(49, 97, 49);
         }
      
    </style>
</head>
<body>
    <div class="bgd">
        <nav class="navbar navbar-expand-lg in">
            <a class="navbar-brand" href="http://informaticaeducativa.caraguatatuba.sp.gov.br">
                <img src="info_logo.png" height="70px">
            </a>
            <form class="form-inline my-2 my-lg-0 fom">
                <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar IP" aria-label="Pesquisar">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Pesquisar</button>
              </form>
             <a class="li" href="PJ.html"><i class="fa fa-lock fa-2x"></i></a>
            
        </nav>

        
    <div class="circuloV">
         <i class="fa fa-wifi fa-5x text-light"></i>
    </div>

        <div class="container-fluid">
            <div class="card git">
                <div class="card-login">
                   <table class="table">
                       <thead class="cr">
                           <tr>
                               <th scope="col">Escolas</th>
                               <th scope="col">Status</th>
                           </tr>
                       </thead>
                       <tbody>
                       <?php 
          include '/controller/functions.php';
          
          $escolas = getSchool();

          //Para pegar os nomes da escolas
          while($row = $escolas->fetch_assoc()) {
            echo  '<tr>
            <td>
                <a class="Lin" href="school.html">
                '.$row['nome'].'
             </a>
            </td>
            <td>
               <i class="fa fa-exclamation-triangle fa-2x yl"></i>
            </td>
        </tr>';

            
          };

          ?>
                           <tr>
                               <td>
                                   <a class="Lin" href="#"> Adriana Aparecida Cassiano</a>
                               </td>
                               <td>
                                   <i class="fa fa-exclamation-circle fa-2x red"></i>
                               </td>
                           </tr>
                           <tr>
                               <td>
                            <a class="Lin" href="#">Aida de Almeida Castro Grazioli</a>
                        </td>
                               <td>
                                  <i class="fa fa-check-circle ok fa-2x"></i>
                               </td>
                           </tr>
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
</body>
</html>