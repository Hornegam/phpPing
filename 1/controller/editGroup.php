<?php
include '../../model/conecta.inc';

function getSchool(){
    global $conexao;
    $sql = "select distinct(nome) from escola order by nome";
    return $escolas = $conexao->query($sql);

}

function editSchool($new,$old){
    global $conexao;
    $sql = "update escola set nome = '$new' WHERE nome like '%$old%'";
    $conexao->query($sql);
    header('location: ../../0');
}

$escolaOld = $_POST['escola'];
$escolaNew = $_POST['editGroup'];

$escolas = getSchool();
while($row = $escolas->fetch_assoc()){
    if($row['nome'] == $escolaNew){
        header('location: ../1');
    }
}
editSchool($escolaNew,$escolaOld);
//addSchool($new);




