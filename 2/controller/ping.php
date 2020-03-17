<?php
session_start();
if(!isset($_SESSION['nome'])){
    header('location: ../login');
};
include '../../model/conecta.inc';

function pingAddress($ip,$local,$patr) {
    $pingresult = exec("ping -n 2 -w 1 $ip", $outcome, $status);
    //$status = true;
    //echo "status";
     if (0 == $status) {
         //echo "ping1";
         $status = " está funcionando";
         echo "O computador com IP $ip, patrimonio $patr que estao $local ".$status;
         //return true;
     } else {
         //echo "ping1.errado";
         $status = "não está funcionando.";
         echo "O computador com IP $ip, patrimonio $patr que estao $local ".$status;
         //return false;
     }
     
 }

 function getComp(){
    global $conexao;
    $sql = "select ip, local, patrimonio from comps where local like '%LAB%'";
    return $result = $conexao->query($sql);
 }

 function ping(){
     $resultado = getComp();
     foreach( $resultado as $res){
         pingAddress($res['ip'],$res['local'],$res['patrimonio']);
     }
 }

ping();

