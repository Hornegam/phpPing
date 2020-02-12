<?php
require 'conecta.inc';

global $csv ;
$csv = array_map('str_getcsv', file('nomeIp.csv'));

function parseSchool($nombre){
    $piece = explode(";",$nombre);
    return $piece;
}


/*
$teste = getSchoolIp("teste");
while($row = $teste->fetch_assoc()) {
    echo $row["Ip"];
    echo "<br>";

};
*/

//header("location: main.php");

