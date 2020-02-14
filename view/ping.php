<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Situação</title>
    <script src="jquery-2.1.3.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="styledheet" href="footer.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="loader" class="loader"></div>

<nav class="navbar navbar-light" style="background-color: #6495ED;">
        <a class="nav-brand" href="http://informaticaeducativa.caraguatatuba.sp.gov.br">
            <img class="mr-1" src="ie_dark.png"  height="55">     
        </a>
        <span style="font-size: 20px; color: black;">
            <button type="button" class="btn btn-primary">Sair</button>
        </span>
        
    </nav>

    <div class="container pt-2" style="width: 80%; padding-bottom: 50px;">
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../pgn.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Roteador</li>
  </ol>
</nav>
<div class="card" style="background-color: #6495ED;">
        <div class="card-header">
          <div class="row">
          <div class="col-sm-6">
                     <h5 class="text-center mb-2">Nome da Escola</h5>
                 </div>
                 <div class="col-sm">
                     <h5 class="text-center mb-2">IP</h5>
                 </div>
                 <div class="col-sm">
                    <h6 class="text-center mb-2">Status</h6>
                 </div>
          </div>
          <!--1º-->
        </div>
    </div>
     <br>
     <div class="card">
     <div class="row">
        <?php 
        include '../controller/functions.php';
        $escolaNome = $_GET['school'];
        if($escolaNome == null){
        header('location: pgn.php');
        }else{
        $name = explode(" ",$escolaNome);
        $escola = getIp($name[0]);
    
        while($row = $escola->fetch_assoc()) {
        echo '<div class="col-md-6 mt-2">
        <h5 class="text-center">'.$escolaNome.'</h5>
    </div>
    <div class="col-md-3 mt-2">
       <h6 class="text-center">'.$row["Ip"].'</h6>
    </div>'.renderizePing($row["Ip"]);
        }
    }
        ?>
        </div>
        </div>
    </div>
    <script> 
     jQuery(window).load(function () {
      $(".loader").delay(1500).fadeOut("slow"); //retire o delay quando for copiar!
});
</script>
</body>
</html>