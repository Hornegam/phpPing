<?php
include '../../../model/conecta.inc';

function pingAddress($ip) {
    $pingresult = exec("ping -n 1 -w 1 $ip", $outcome, $status);
    //$status = true;
    //echo "status";
     if (0 == $status) {
         //echo "ping1";
         //$status = " está funcionando";
         //echo "O computador com IP $ip, patrimonio $patr que estao $local ".$status;
         return 1;
     } else {
         //echo "ping1.errado";
         //$status = "não está funcionando.";
         //echo "O computador com IP $ip, patrimonio $patr que estao $local ".$status;
         return 0;
     }
     
 }

 function getComp($id){
    global $conexao;
    $sql = "select patrimonio,ip,tipo,local from comps where idEscolaComp = $id";
    return $result = $conexao->query($sql);
 }


function pegaTudo($id){
    $school = getComp($id);
    $that = []; //array para passar para o js
    $funciona = 0;
    $i = 0;
    
    while($row = $school->fetch_assoc()) {
        $funfa = pingAddress($row['ip']);
        array_push($that,[
            'patrimonio' => $row['patrimonio'],
            'ip' => $row['ip'],
            'tipo' => $row['tipo'],
            'local' => $row['local'],
            'funciona' => $funfa
        ]);
    }    

    return $that;
}

function tratar(){
    $id = json_decode(file_get_contents('php://input'), true);
    $ip = pegaTudo($id['id']);
    //$data = hora();
    //$sla = pegaTudo();
    echo json_encode($ip);
    header('Content-Type: application/json');
    //header('location: teste.php');
    
}

tratar();