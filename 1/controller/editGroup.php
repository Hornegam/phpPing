<?php
session_start();
if(!isset($_SESSION['nome'])){
    header('location: ../login');
};


include '../../model/conecta.inc';

function getSchool(){
    global $conexao;
    $sql = "select distinct(nome) from escola order by nome";
    return $escolas = $conexao->query($sql);

}

function editSchool($new,$old){
    global $conexao;
    $sql = "update escola set nome = '$new' WHERE idEscola = $old";
    $conexao->query($sql);
    header('location: ../../0');
}

$escolaOld = $_POST['escola'];
$escolaNew = $_POST['editGroup'];
if(empty($escolaNew)){
    header('location: ../../1');
    echo ($escolaNew." e ".$escolaOld);
}else{
    editSchool($escolaNew,$escolaOld);
}
//addSchool($new);




