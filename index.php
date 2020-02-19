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

