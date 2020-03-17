<?php
session_start();
if(!isset($_SESSION['nome'])){
    header('location: ../login');
};
include '../../model/conecta.inc';


function eraseIpRot($id){
    global $conexao;
    $sql = "delete from ip WHERE id = $id";
    $conexao->query($sql);
}

function eraseIpComp($id){
    global $conexao;
    $sql = "DELETE FROM comps WHERE idComp = $id";
    $conexao->query($sql);
}


function tratar(){
    $id = json_decode(file_get_contents('php://input'), true);
    //var_dump($id);
    echo($id['id']);
    if($id['tipo']==1){
        eraseIpRot($id['id']);
    }else if($id['tipo']==0){
        eraseIpComp($id['id']);
    }
    
    //echo json_encode($certo);
    //header('Content-Type: application/json');

}

tratar();

?>
