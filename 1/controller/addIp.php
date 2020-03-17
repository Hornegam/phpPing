<?php
session_start();
if(!isset($_SESSION['nome'])){
    header('location: ../login');
};

include '../../model/conecta.inc';


function getSchoolId($nome){
    global $conexao;
    $sql = "select idEscola from escola where nome like '%$nome%'";
    echo "12";
    return $escolas = $conexao->query($sql);
}

function addIpRot($ip,$id){
    global $conexao;
    $sql = "insert into ip(ip,idNome) values('$ip','$id')";
    //echo " 13";
    if($conexao->query($sql)){
        return 1;
    }else{
        return 0;
    }
    //header('location: ../../1');
}
function addIpComp($patrimonio,$ip,$tipo,$id,$local){
    global $conexao;
    $sql = "INSERT INTO comps(patrimonio,ip,tipo,idEscolaComp,local) VALUES ('$patrimonio','$ip','$tipo','$id','$local')";
    //echo "14";
    if($conexao->query($sql)){
        return 1;
    }else{
        return 0;
    }
    //header('location: ../../1');
}



function tratar(){

    $id = json_decode(file_get_contents('php://input'), true);

    $tamanho = count($id['ip']);
    $certo = [];
    for($i = 0;$i<$tamanho;$i++){
        if (filter_var($id['ip'][$i], FILTER_VALIDATE_IP)){
            if($id['modo']==1){//Roteadores
                $res = addIpRot($id['ip'][$i],$id['id']);
                array_push($certo,['ip' => $id['ip'][$i],
                               'done' => $res
            ]);
            }else if($id['modo']==0){//Computadores
                $res = addIpComp($id['patrimonio'][$i],$id['ip'][$i],$id['tipo'][$i],$id['id'],$id['local'][$i]);
                array_push($certo,['ip' => $id['ip'][$i],
                               'done' => $res
            ]);
            }
        }else{
            array_push($certo,['ip' => $id['ip'][$i],
                               'done' => '0'
            ]);
        }
    }

    echo json_encode($certo);
    //header('Content-Type: application/json');
    

}

tratar();





