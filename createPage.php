<?php
require 'conecta.inc';


require 'index.php';

              $sql = "select distinct(Escola) from relacao";
              $escolas = $conexao->query($sql);
              $conteudo = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Situação</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="styledheet" href="footer.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<link rel="stylesheet" href="style.css">
<link   rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sriracha&display=swap">

</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="nav-brand" href="http://informaticaeducativa.caraguatatuba.sp.gov.br">
            <img class="mr-1" src="ie_dark.png"  height="55">     
        </a>
        <span style="font-size: 20px; color: black;">
        <a class="volta" href="Log.html">  <i class="fas fa-lock">Login</i> </a>
        </span>
        
    </nav>

 <div class="container-fluid mt-5">
     <div class="card parabaixo">
         <div class="card-header">
             <div class="row">
                 <div class="col-sm-6">
                     <h5 class="text-center mb-2 mt-4">Nome da Escola</h5>
                 </div>
                 <div class="col-sm">
                     <h5 class="text-center mb-2 mt-4">Status</h5>
                 </div>
                 <div class="col-sm">
                    <h6 class="text-center mb-2 mt-4">IP</h6>
                 </div>
             </div>
            </div>
     <br>
     <div class="row">';

            //Para pegar os nomes da escolas
            while($row = $escolas->fetch_assoc()) {
                       $nome = explode(" ",$row['Escola']);
                       $sql2 = "select Ip from relacao where Escola like %".$row['Escola']."%";
                       $ips = $conexao->query($sql2);
                       
                while($row2 = $ips->fetch_assoc()){
                 $conteudo = $conteudo.'<div class="col-sm-6">
                    <h5 class="text-center">'.$row['Escola'].'</h5>
                    </div>
                    <div class="col-sm text-center">
                        <button type="submit" class="btn btnt mb-2">Bom</button>
                    </div>
                    <div class="col-sm">
                        <h6 class="text-center">'.$row2['Ip'].'</h6>
                    </div>'
                    ;} 
            $conteudo = $conteudo.'  
                </div>
                    </div>
            </body>
             </html>';
        file_put_contents('view/schoolsView/'.$nome[0].'_'.$nome[1].'.php', $conteudo);
    
        };

