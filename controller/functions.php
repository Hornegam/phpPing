<?php
include '../model/conecta.inc';
function pingAddress($ip) {
   $pingresult = exec("ping -n 3 -w 1 $ip", $outcome, $status);
   //$status = true;
   //echo "status";
    if (0 == $status) {
        //echo "ping1";
        //$status = " está funcionando";
        //echo "O roteador com IP : $ip da escola $nome".$status;
        return true;
    } else {
        //echo "ping1.errado";
        //$status = "não está funcionando.";
        //echo "O roteador com IP $ip da escola $nome ".$status;
        return false;
    }
    
}

function socketServer($ip){
    $conectado = @ fsockopen($ip.':88', 135, $numeroDoErro, $stringDoErro, 5); // Este último é o timeout, em segundos
    
    if ($conectado) {
        //print 'A máquina está online! :)';
        return true;
      } else {
        //print 'A máquina NÃO está online! :(';
        return false;
      }
}

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

function renderizePing($ip){
    $status = pingAddress($ip);
    if($status == true){
        $teste = '<div class="col-md-3 text-align-center pb-1 mt-2">
        <button type="submit" class="btn btn-success fas fa-thumbs-up pb-2"></button>
        <a href="../pingip.php/?ip='.$ip.'"><button type="submit" class="btn btn-info fas fa-wifi pb-2"></button></a>
        <a href="http://'.$ip.':88"><button type="submit" href="http://'.$ip.':88" class="btn btn-warning fas fa-server pb-2"></button></a>
        </div>';
        return $teste;
        }else if($status == false){
        return $teste = '<div class="col-md-2 text-align-center pr-2 pb-1 mt-2">
        <button type="submit" class="btn btn-danger fas fa-exclamation-circle pb-2"></button>
        <a href="../pingip.php/?ip='.$ip.'"><button type="submit" class="btn btn-info fas fa-wifi pb-2"></button><a>
       <a href="http://'.$ip.':88"><button type="submit" class="btn btn-warning fas fa-server pb-2"></button></a>
     
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

function getSchool(){
        global $conexao;
        $sql = "select distinct(nome) from escola order by nome";
        return $escolas = $conexao->query($sql);
    
}

function getIp($escola){
    global $conexao;
    $sql = "select escola.nome, ip.ip from escola inner join ip on (escola.idEscola = ip.idNome) where escola.nome like '%$escola%'";
    return $escolas = $conexao->query($sql);

}