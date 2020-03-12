<?php
include '../../model/conecta.inc';


function eraseGroup($id){
    global $conexao;
    $sql = "delete from escola where nome like '%$id%'";
    $conexao->query($sql);
}


function tratar(){
    $id = json_decode(file_get_contents('php://input'), true);
    //var_dump($id);
    echo($id['nome']);
    eraseGroup($id['nome']);
    //echo json_encode($certo);
    //header('Content-Type: application/json');

}

tratar();

?>
