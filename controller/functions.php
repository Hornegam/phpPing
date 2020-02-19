<?php
include '../model/conecta.inc';
function pingAddress($ip) {
    $pingresult = exec("ping -n 2 -w 2 $ip", $outcome, $status);
   //$status = true;
    if (0 == $status) {
        //$status = " está funcionando";
        //echo "O roteador com IP : $ip da escola $nome".$status;
        return true;
    } else {
        //$status = "não está funcionando.";
        //echo "O roteador com IP $ip da escola $nome ".$status;
        return false;
    }
    
}

//if($_POST['action'] == 'call_this') {
  //  echo '<strong>Teste</strong>';
//}

function pingUnique(){
    $ip = $_POST['ip'];
    if(pingAddress($ip)==true){
        echo '<div class="text-center">
        <strong>O ip '.$ip.' está funcionando</strong>
        </div>
        ';
    }else{
        echo '<div class="text-center">
        <strong>O ip '.$ip.' não está funcionando</strong>
        </div>
        ';
    }

}

function pingS3wachool($array){
    $size = count($array);
    for($i = 1; $i < $size;$i++){
        $separado = parseSchool($array[$i][0]);
        pingAddress($separado[1]);
        echo "<br>";
    }
}
function renderizePing($ip){
    $status = pingAddress($ip);
    if($status == true){
        $teste = '<div class="col-md-3 text-align-center pb-1 mt-2">
        <button type="submit" class="btn btn-success fas fa-thumbs-up pb-2"></button>
        <a href="../pingip.php/?ip='.$ip.'"><button type="submit" class="btn btn-info fas fa-wifi pb-2"></button></a>
        <a href="https://'.$ip.':88"><button type="submit" href="https://'.$ip.':88" class="btn btn-warning fas fa-server pb-2"></button></a>
        </div>';
        return $teste;
        }else if($status == false){
        return $teste = '<div class="col-md-2 text-align-center pr-2 pb-1 mt-2">
        <button type="submit" class="btn btn-danger fas fa-exclamation-circle pb-2"></button>
        <a href="../pingip.php/?ip='.$ip.'"><button type="submit" class="btn btn-info fas fa-wifi pb-2"></button><a>
       <a href="https://'.$ip.':88"><button type="submit" class="btn btn-warning fas fa-server pb-2"></button></a>
     
    </div>';
    }
}

function renderizePing2($ip){
    $status = pingAddress($ip);
    if($status == true){
        $teste = '<div class="col-md-8 text-align-center pb-1 mt-2">
        <button type="submit" class="btn btn-success fas fa-thumbs-up pb-2 pr-4 pl-4"></button>
        <a href="https://'.$ip.':88"><button type="submit" class="btn btn-warning fas fa-server pb-2 pr-4 pl-4"></button></a>
        </div>';
        return $teste;
        }else if($status == false){
        return $teste = '<div class="col-md-7 text-align-center pr-2 pb-1 mt-2">
        <button type="submit" class="btn btn-danger fas fa-exclamation-circle pb-2 pl-2"></button>
       <a href="https://'.$ip.':88"><button type="submit" class="btn btn-warning fas fa-server pb-2"></button></a>
     
    </div>';
    }

}

//$separado = parseSchool($csv[0][0]);
//pingSchool($array);
function getSchool(){
        global $conexao;
        $sql = "select distinct(Escola) from relacao";
        return $escolas = $conexao->query($sql);
    
}

function getIp($escola){
    global $conexao;
    $sql = "select Ip from relacao where Escola like '%".$escola."%'";
    return $escolas = $conexao->query($sql);

}