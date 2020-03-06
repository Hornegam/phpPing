<?php
include '../model/conecta.inc';

function getSchool(){
    global $conexao;
    $sql = "select distinct(nome) from escola order by nome";
    return $escolas = $conexao->query($sql);

}

function getLastMinute($escola){
    global $conexao;
    $sql = "select escola.nome, ip.ip, ip.id, job.hora, job.funciona from escola inner join ip on (escola.idEscola = ip.idNome) inner join job on (job.idIp = ip.id) WHERE job.hora >= DATE_SUB(NOW(), INTERVAL 10 MINUTE) AND escola.nome like '%$escola%'";
    return $hour = $conexao->query($sql);
}

function getIp($escola){
    global $conexao;
    $sql = "select escola.nome, ip.ip, ip.id from escola inner join ip on (escola.idEscola = ip.idNome) where escola.nome like '%$escola%'";
    return $escolas = $conexao->query($sql);

}

function calculateSchool($escola){
    $minute = getLastMinute($escola);
    $size = 0;
    $funciona = 0;
    while($row = $minute->fetch_assoc()){
        if($row['funciona']==0){
            $funciona = $funciona+1;
        }
         $size = $size+1;
    }

    if($funciona == ($size-1)){
        renderizeButton(2); //2 é quando nada esta pegando
    }else if($funciona == 0){
        renderizeButton(0); //0 é quando está tudo pegando
    }else{
        renderizeButton(1);//1 é quando alguns porém não todos estão pegando
    }
}

function renderizeButton($funciona){
    if($funciona == 2){
       echo '<i class="red circle icon"></i>';
    }else if($funciona == 1){
        echo '<i class="yellow circle icon"></i>';
    }else if($funciona == 0){
        echo '<i class="green circle icon"></i>';
    }else{
        echo 'Revise seu código';
    }
}