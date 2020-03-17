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

function getIp($escola){
global $conexao;
$sql = "select escola.nome, ip.ip, ip.id from escola inner join ip on (escola.idEscola = ip.idNome) where escola.idEscola = $escola";
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

function getComp($id){
    global $conexao;
    $sql = "SELECT * FROM `comps` WHERE idEscolaComp = $id";
    $escolas = $conexao->query($sql);
    $that = [];
    //var_dump($escolas);
    while($row = $escolas->fetch_assoc()) {
        array_push($that,['ip'=>$row['ip'],
                          'patrimonio'=>$row['patrimonio'],
                          'local'=>$row['local'],
                          'id'=>$row['idComp']                     
        ]);
    }
    return $that;

}

function tratar(){
    $id = json_decode(file_get_contents('php://input'), true);
    //$ip = socketServer($id['id']);
    //$data = hora();
    
    if($id['tipo']==1){
        $sla = pegaTudo($id['id']);
        array_push($sla,['tipo'=>$id['tipo']]);
        echo json_encode($sla);
        //header('Content-Type: application/json');
    }else{
        $sla = getComp($id['id']);
        array_push($sla,['tipo'=>$id['tipo']]);
        echo json_encode($sla);
        //header('Content-Type: application/json');
    }
    
    //header('location: teste.php');
    
}

tratar();

?>
