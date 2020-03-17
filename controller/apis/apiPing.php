<?php
session_start();
if(!isset($_SESSION['nome'])){
    header('location: ../login');
};

function socketServer($ip){
    $conectado = @ fsockopen($ip.':88', 135, $numeroDoErro, $stringDoErro, 5); // Este último é o timeout, em segundos
    
    if ($conectado) {
        //print 'A máquina está online! :)';
        return 1;
      } else {
        //print 'A máquina NÃO está online! :(';
        return 0;
      }
}

 function hora(){
    date_default_timezone_set('America/Sao_Paulo');
    $date = date('Y/m/d h:i:s a', time());
    return $date;
 }


 function tratar(){
    $id = json_decode(file_get_contents('php://input'), true);
    $ip = socketServer($id['id']);
    $data = hora();
    $sla = [
        'ip'=>$ip,
        'data'=>$data 
    ];
    echo json_encode($sla);
    header('Content-Type: application/json');
    //header('location: teste.php');
    
}

tratar();

?>

