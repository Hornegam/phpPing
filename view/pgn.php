<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visualização de IP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="styledheet" href="footer.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<link rel="stylesheet" href="style.css">
<link   rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sriracha&display=swap">
<script src="../load/js/jquery-2.1.3.js"></script>

</head>
<body>
    <div id="loader" class="loader"></div>
    <div style="display:none" id="tudo_page">
    <nav class="navbar navbar-light" style="background-color: #1e6cc7;">
        <a class="nav-brand" href="http://informaticaeducativa.caraguatatuba.sp.gov.br">
            <img class="mr-1" src="ie_dark.png"  height="55">     
        </a>
        <div>
            <a href="pingUnique.php" style="color: white;" class="pr-3 fas fa-hands-helping btn btn-warning"><strong></strong></a>
            <a href="Log.html"><button class="btn btn-primary fas fa-sign-out-alt"></button></a>
        </div>
</div>
        
    </nav>
    <div class="text-center">
    <h1><strong>Monitoramento de Roteadores</strong></h1>
    </div>
                
    <div class="container pt-2" style="width: 80%; padding-bottom: 20px;">
    <div class="card cor">
        <div class="card-header">
          <div class="row">
              <div class="col-sm-8">
                  <strong>Escolas</strong>
              </div>
              <div class="col">
                <strong>Status</strong>
              </div>
          </div>
          <!--1º-->
        </div>
    </div>
    <br>
    <div class="card">
    <br>
    <?php 
          include '../controller/functions.php';
          
          $escolas = getSchool();

          //Para pegar os nomes da escolas
          while($row = $escolas->fetch_assoc()) {
            echo  '<div class="row">
            <div class="col-sm-8 pl-5">
                <a href="ping.php/?school='.$row["nome"].'" class="escolas"><strong> '.$row["nome"].'</strong></a>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-success">BOM</button>
            </div>
            </div>';

            echo "<hr>";
          };

          ?>
        </div>
</div>
    

<footer class=" text-center  mt-5" >
    <img class="d-block mx-auto mb-3" src="ie_dark.png" height="60px" alt="" >
    <b class="text-blue-pmc">Secretaria da Educação - Informática Educativa</b> <br>
</footer>
</div>
</div>
<script type="text/javascript">
        // Este evendo é acionado após o carregamento da página
        jQuery(window).load(function () {
      $(".loader").delay(1500).fadeOut("slow"); //retire o delay quando for copiar!
    $("#tudo_page").toggle("fast");
});
</script>
</body>
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visualização de IP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="styledheet" href="footer.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<link rel="stylesheet" href="style.css">
<link   rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sriracha&display=swap">
<script src="../load/js/jquery-2.1.3.js"></script>

</head>
<body>
    <div id="loader" class="loader"></div>
    <div style="display:none" id="tudo_page">
    <nav class="navbar navbar-light" style="background-color: #1e6cc7;">
        <a class="nav-brand" href="http://informaticaeducativa.caraguatatuba.sp.gov.br">
            <img class="mr-1" src="ie_dark.png"  height="55">     
        </a>
        <div>
            <a href="pingUnique.php" style="color: white;" class="pr-3 fas fa-hands-helping btn btn-warning"><strong></strong></a>
            <a href="Log.html"><button class="btn btn-primary fas fa-sign-out-alt"></button></a>
        </div>
</div>
        
    </nav>
    <div class="text-center">
    <h1><strong>Monitoramento de Roteadores</strong></h1>
    </div>
                
    <div class="container pt-2" style="width: 80%; padding-bottom: 20px;">
    <div class="card" style="background-color: #1e6cc7;">
        <div class="card-header">
          <div class="row">
              <div class="col-sm-8">
                  <strong>Escolas</strong>
              </div>
              <div class="col">
                <strong>Status</strong>
              </div>
          </div>
          <!--1º-->
        </div>
    </div>
    <br>
    <div class="card cor">
    <br>
    <?php 
          include '../controller/functions.php';
          
          $escolas = getSchool();

          //Para pegar os nomes da escolas
          while($row = $escolas->fetch_assoc()) {
            echo  '<div class="row">
            <div class="col-sm-8 pl-5">
                <a href="ping.php/?school='.$row["Escola"].'" class="escolas"><strong> '.$row["Escola"].'</strong></a>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-success">BOM</button>
            </div>
            </div>';

            echo "<hr>";
          };

          ?>
        </div>
</div>
    

<footer class=" text-center  mt-5" >
    <img class="d-block mx-auto mb-3" src="ie_dark.png" height="60px" alt="" >
    <b class="text-blue-pmc">Secretaria da Educação - Informática Educativa</b> <br>
</footer>
</div>
</div>
<script type="text/javascript">
        // Este evendo é acionado após o carregamento da página
        jQuery(window).load(function () {
      $(".loader").delay(1500).fadeOut("slow"); //retire o delay quando for copiar!
    $("#tudo_page").toggle("fast");
});
</script>
</body>
>>>>>>> 31862ba59a8d2c70d0786acb7f3e5300a27a2ab3
</html>