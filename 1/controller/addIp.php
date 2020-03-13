<?php
include '../../model/conecta.inc';

function getSchoolId($nome){
    global $conexao;
    $sql = "select idEscola from escola where nome like '%$nome%'";
    return $escolas = $conexao->query($sql);
}

function addIp($ip,$id){
    global $conexao;
    $sql = "insert into ip(ip,idNome) values('$ip','$id')";
    $conexao->query($sql);
    header('location: ../../1');
}

$escola = $_POST['escola'];
$ip = $_POST['ip'];

if (filter_var($ip, FILTER_VALIDATE_IP)) {
    $id = getSchoolId($escola);
    while($row = $id->fetch_assoc()){
        addIp($ip,$row['idEscola']);
    }
}else{
    header('location: ../../1');
}



/*
while($row = $escolas->fetch_assoc()){
    if($row['nome'] == $new){
        header('location: ../index.php');
    }
}

addSchool($new);

*/




