<?php
include '../../model/conecta.inc';


function setIp($ip,$id){
    global $conexao;
    $sql = "update ip set ip='$ip' WHERE id = $id";
    if($conexao->query($sql)){
        return true;
    }else{
        return false;
    }
}


function tratar(){
    $id = json_decode(file_get_contents('php://input'), true);
    //var_dump($id);
    $certo = [];
    foreach($id['id'] as $i=>$ids){
        if (filter_var($id['ip'][$i], FILTER_VALIDATE_IP)) {
            echo($i." : ".$ids." - IP : ".$id['ip'][$i]);
            echo '<br>';
            if(setIp($id['ip'][$i],$ids)){
                array_push($certo,['updated'=> 1,
                                   'id'=>$ids
                ]);
            }else{
                array_push($certo,['updated'=> 0,
                'id'=>$ids
                ]);  
            }
        }else{
            array_push($certo,['updated'=> 0,
                'id'=>$ids
            ]); 
        }
    }
    echo json_encode($certo);
    header('Content-Type: application/json');

}

tratar();

?>
