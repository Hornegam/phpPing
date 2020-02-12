<?php
require 'schools.php';
function pingAddress($nome,$ip) {
    $pingresult = exec("ping -n 2 -w 2 $ip", $outcome, $status);
    if (0 == $status) {
        $status = " está funcionando";
        echo "O roteador com IP : $ip da escola $nome".$status;
        return true;
    } else {
        $status = "não está funcionando.";
        echo "O roteador com IP $ip da escola $nome ".$status;
        return false;
    }
    
}

function pingSchool($array){
    $size = count($array);
    for($i = 1; $i < 5;$i++){
        $separado = parseSchool($array[$i][0]);
        pingAddress($separado[0],$separado[1]);
        echo "<br>";
    }
}

$array = $csv;
//$separado = parseSchool($csv[0][0]);
//pingSchool($array);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php 
        $sql = "select Ip from relacao where Escola like '%Adolfina%'";
        $escolas = $conexao->query($sql);
    
        //Para pegar os nomes da escolas
        while($row = $escolas->fetch_assoc()) {
                       echo $row["Ip"];
                       echo "<br>";
    
        };
    ?>
</body>
</html>
