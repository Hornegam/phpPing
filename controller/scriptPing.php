<?php
include 'functions.php';

function findIp(){
    global $conexao;
    $sql = "select * from ip";
    return $escolas = $conexao->query($sql);
}

function insertPing($id,$funciona){
    global $conexao;
    date_default_timezone_set('America/Sao_Paulo');
    $sql = "insert into job values($id,NOW(),$funciona)";
    $conexao->query($sql);
}

function pingDatabase(){
    $ip = findIp();
    while($row = $ip->fetch_assoc()) {
        echo $row['ip'];
        echo '<br>';
        echo $row['id'];
        echo '<br>';
        $funciona = pingAddress($row['ip']);
        if($funciona == true){
            echo "deu bom";
            insertPing($row["id"],TRUE);
        }else if($funciona == false){
            echo "deu ruim";
            insertPing($row["id"],0);
        }
        
    }
    echo "Funcionou";
}
pingDatabase();
echo "Chegou aqui";


//Query para verificar funcionamento do roteador na hora, com nome
//select escola.nome, ip.ip, job.funciona, job.hora from escola inner join ip on (ip.idNome = escola.idEscola) inner join job on (job.idIp = ip.id)