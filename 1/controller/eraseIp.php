<?php
include '../../model/conecta.inc';


function eraseIp($id){
    global $conexao;
    $sql = "delete from ip WHERE id = $id";
    $conexao->query($sql);
}


function tratar(){
    $id = json_decode(file_get_contents('php://input'), true);
    //var_dump($id);
    echo($id['id']);
    eraseIp($id['id']);
    //echo json_encode($certo);
    //header('Content-Type: application/json');

}

tratar();

?>
