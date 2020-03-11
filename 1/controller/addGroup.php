<?php
include '../../model/conecta.inc';

function getSchool(){
    global $conexao;
    $sql = "select distinct(nome) from escola order by nome";
    return $escolas = $conexao->query($sql);

}

function addSchool($nome){
    global $conexao;
    $sql = "insert into escola(nome) values('$nome')";
    $conexao->query($sql);
    header('location: ../../0');
}

$new = $_POST['new'];
$escolas = getSchool();
while($row = $escolas->fetch_assoc()){
    if($row['nome'] == $new){
        header('location: ../index.php');
    }
}

addSchool($new);




