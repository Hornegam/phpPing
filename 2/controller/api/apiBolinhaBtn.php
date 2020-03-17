<?php
session_start();
if(!isset($_SESSION['nome'])){
    header('location: ../login');
};
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

 function getSchool(){
    global $conexao;
    $sql = "select idEscola from escola order by nome";
    return $escolas = $conexao->query($sql);

}

 function getComp($id){
    global $conexao;
    $sql = "select ip, local from comps where idEscolaComp = $id";
    return $result = $conexao->query($sql);
 }


function pegaTudo(){
    $school = getSchool();
    $that = []; //array para passar para o js
    $funciona = 0;
    $i = 0;
    
    while($row = $school->fetch_assoc()) {
        $info = getComp($row['idEscola']);
        $i = 0;
        
        $local = [];
        while($row2 = $info->fetch_assoc()) {
            $work = pingAddress($row2['ip']);
            $funciona = $funciona+ $work;
            array_push($local,[ 'ip' => $row2['ip'],
                               'local' => $row2['local'],
                               'funfa' => $work
            ]);
            $i += 1;
        }
        
        array_push($that,[ 'escola' => $row['idEscola'],
                           'funciona' => $funciona,
                           'tamanho' => $i,
                           'local' => $local
        ]);

        $funciona = 0;
        $i = 0;
    
    }    

    return $that;
}

function tratar(){
    //$id = json_decode(file_get_contents('php://input'), true);
    //$ip = socketServer($id['id']);
    //$data = hora();
    $sla = pegaTudo();
    echo json_encode($sla);
    //header('Content-Type: application/json');
    //header('location: teste.php');
    
}

tratar();

?>
