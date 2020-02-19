<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visualização de IP</title>
    <script src="../load/js/jquery-2.1.3.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="styledheet" href="footer.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<link rel="stylesheet" href="style.css">
<link   rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sriracha&display=swap">


</head>
<body>
<div id="loader" class="loader"></div>

<nav class="navbar navbar-light" style="background-color: #1e6cc7;">
        <a class="nav-brand" href="http://informaticaeducativa.caraguatatuba.sp.gov.br">
            <img class="mr-1" src="http://informaticaeducativa.caraguatatuba.sp.gov.br/img/ie_dark.png"  height="55">     
        </a>
        <div>
            <a href="pingUnique.php" style="color: white;" class="pr-3 fas fa-hands-helping btn btn-warning"><strong></strong></a>
            <a href="Log.html"><button class="btn btn-primary fas fa-sign-out-alt"></button></a>
        </div>
</div>
        
    </nav>
    
    <div class="container pt-2" style="width: 80%; padding-bottom: 20px;">
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../pgn.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Roteador</li>
    <li class="breadcrumb-item active" aria-current="page">Ping</li>
  </ol>
</nav>
    <div class="card" style="background-color: #1e6cc7;">
        <div class="card-header">
          <div class="row">
              <div class="col-md-6 text-center">
                  <strong>IP</strong>
              </div>
              <div class="col-md-4 text-center">
                <strong>Status</strong>
              </div>
          </div>
          <!--1º-->
        </div>
    </div>
    <br>
    <div class="card" style="">
    
    <?php 
        include '../controller/functions.php';
        $ip = $_GET['ip'] ;
      /*  if($_GET['ip'] == null){
            if($_POST == null){
                echo "Recarregue a página !";
            }else{
                $ip = $_POST['ip']; 
            }
        }else{
            $ip = $_GET['ip'];
        }
        */
        echo '<div class="row">
        <div class="col-md-6 pl-4 text-center pt-4">
           <strong> '.$ip.'</strong>
        </div>
        <div class="col-md-6 text-center pr-4 pt-3">
        '.renderizePing2($ip).'
        </div>
    </div>';
    ?>
    <br>
        </div>
</div>
    

<footer class=" text-center  mt-5" >
    <img class="d-block mx-auto mb-3" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSmTboEpL_YzVmlu3mwroanSRMvu5nOJb4mE89FSt4uPCR6HmB4" height="60px" alt="" >
    <b class="text-blue-pmc">Secretaria da Educação - Informática Educativa</b> <br>
</footer>
</div>
<script> 
     jQuery(window).load(function () {
      $("#loader").delay(1500).fadeOut("slow"); //retire o delay quando for copiar!
});
</script>
</body>
</html>