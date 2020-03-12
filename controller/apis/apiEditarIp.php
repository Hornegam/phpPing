<?php
include '../../model/conecta.inc';

function getSchool(){
    global $conexao;
    $sql = "select distinct(nome) from escola order by nome";
    return $escolas = $conexao->query($sql);

}

function getIp($escola){
global $conexao;
$sql = "select escola.nome, ip.ip, ip.id from escola inner join ip on (escola.idEscola = ip.idNome) where escola.nome like '%$escola%'";
return $escolas = $conexao->query($sql);
}

function pegaTudo($nome){
    $escolas = getIp($nome);
    $that = []; //array para passar para o js
    $funciona = null;
    
    while($row = $escolas->fetch_assoc()) {
        array_push($that,['ip'=>$row['ip'],
                          'id'=>$row['id']                 
        ]);
    }

    return $that;
}

function tratar(){
    $id = json_decode(file_get_contents('php://input'), true);
    //$ip = socketServer($id['id']);
    //$data = hora();
    $sla = pegaTudo($id['id']);
    echo json_encode($sla);
    header('Content-Type: application/json');
    //header('location: teste.php');
    
}

tratar();

?>
