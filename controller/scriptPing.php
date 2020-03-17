<?php
    
session_start();
if(!isset($_SESSION['nome'])){
    header('location: ../login');
};

include '../model/conecta.inc';

function socketServer($ip){
$conectado = @ fsockopen($ip.':88', 135, $numeroDoErro, $stringDoErro, 5); // Este último é o timeout, em segundos

if ($conectado) {
    print 'A máquina está online! :)';
    return true;
  } else {
    print 'A máquina NÃO está online! :(';
    return false;
  }
}

function pingAddress($ip) {
  $pingresult = exec("ping -n 3 -w 1 $ip", $outcome, $status);
  //$status = true;
  //echo $status;
   if (1 == $status) {
       //echo "ping1";
       //$status = " está funcionando";
       //echo "O roteador com IP : $ip da escola $nome".$status;
       echo "ta funcionando";
       return true;
   } else {
       //echo "ping1.errado";
       //$status = "não está funcionando.";
       //echo "O roteador com IP $ip da escola $nome ".$status;
       echo "nao ta funcionando";
       return false;
   }
   
}

function getIp1(){
  global $conexao;
  $sql = 'select * from ip';
  return $ips = $conexao->query($sql);
}

function insertDatabase($id,$work){
  global $conexao;
  $sql = "insert into job values($id,NOW(),$work)";
  $conexao->query($sql);
}

function doEvery(){
  $ip = getIp1();
  //$teste = $ip->fetch_assoc();
  
  while($row = $ip->fetch_assoc()) {
    $out = socketServer($row["ip"]);
    if($out == true){
        insertDatabase($row["id"],1);
    }else{
        insertDatabase($row["id"],0);
    }
  }
}

//socketServer('192.168.22.12');
doEvery();





//Query para verificar funcionamento do roteador na hora, com nome
//select escola.nome, ip.ip, job.funciona, job.hora from escola inner join ip on (ip.idNome = escola.idEscola) inner join job on (job.idIp = ip.id)