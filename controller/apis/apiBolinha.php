<?php
include '../../model/conecta.inc';

function socketServer($ip){
    $conectado = @ fsockopen($ip.':88', 135, $numeroDoErro, $stringDoErro, 1); // Este último é o timeout, em segundos
    
    if ($conectado) {
        //print 'A máquina está online! :)';
        return 1;
      } else {
        //print 'A máquina NÃO está online! :(';
        return 0;
      }
}

function getSchool(){
    global $conexao;
    $sql = "select distinct(nome), idEscola from escola order by nome";
    return $escolas = $conexao->query($sql);

}

function getIp($escola){
global $conexao;
$sql = "select escola.nome, ip.ip, ip.id from escola inner join ip on (escola.idEscola = ip.idNome) where escola.nome like '%$escola%'";
return $escolas = $conexao->query($sql);
}
 
function nome($nome){
    $nome1 = str_replace(" ","",$nome);
    $nome2 = str_replace(".","",$nome1);
    return $nome2;
}

function pegaTudo(){
    $escolas = getSchool();
    $that = []; //array para passar para o js
    $funciona = null;
    
    while($row = $escolas->fetch_assoc()) {
        $info = getIp($row['nome']);
        $i = 0;
        while($row2 = $info->fetch_assoc()) {
            $funciona = $funciona+ socketServer($row2['ip']);
            $i += 1;
        }
        //echo $row['nome']." ".$funciona;
        $nomeright = nome($row['nome']);
        array_push($that,[ 'nome' => $nomeright,
                           'funciona' => $funciona,
                           'tamanho' => $i
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
