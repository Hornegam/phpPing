<?php
session_start();
if(!isset($_SESSION['nome'])){
    header('location: ../login');
};

include '../model/conecta.inc';
//include '../load/api.php';
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

function renderizePing($ip,$id,$nome){
    $status = socketServer($ip);
    if($status == true){
        $teste = '<td>
        <div>
        <i class="fa fa-check-circle  fa-2x ok pd"></i>
       <a href="http://'.$ip.':88" target="_blank"><i class="fa fa-list fa-2x AR pd"></i></a>
       <form action="grafico.php" method="post" target="_blank">     
       <button type="submit" name="id" id="id" value="'.$id.'"class="fas fa-chart-bar btn btn-light pt-4">
       <input type="hidden" value="'.$nome.'" id="nome">
       <input type="hidden" value="'.$ip.'" id="ip">
       </form>
       <form action="grafreal.php" method="post" target="_blank">  
       <input type="hidden" value="'.$nome.'" id="nome">
       <button type="submit" name="id" id="id" value="'.$ip.'"class="fas fa-satellite-dish btn btn-light pt-4">
       </form>
       <script>
        console.log(document.getElementById(id));
       </script>
       </div>
    </td>';
        return $teste;
        }else if($status == false){
        return $teste = '<td>
        <i class="fa fa-exclamation-circle fa-2x td pd"></i>
       <a href="http://'.$ip.':88" target="_blank"><i class="fa fa-list fa-2x AR pd"></i></a>
       <form action="grafico.php" method="post" target="_blank">     
       <button type="submit" name="id" id="id" value="'.$id.'"class="fas fa-chart-bar btn btn-light pt-4">
       <input type="hidden" value="'.$nome.'" id="nome" name="nome">
       <input type="hidden" value="'.$ip.'" id="ip" name="ip">
       </form>
       <form action="grafreal.php" method="post" target="_blank">     
       <button type="submit" name="id" id="id" value="'.$ip.'"class="fas fa-satellite-dish btn btn-light pt-4">
       <input type="hidden" value="'.$nome.'" id="nome">
       </form>
       <script>
        console.log(document.getElementById(id));
       </script>
    </td>';
    }
}

function renderizePing2($ip){
    $status = pingAddress($ip);
    if($status == true){
        $teste = '<div class="col-md-8 text-align-center pb-1 mt-2">
        <button type="submit" class="btn btn-success fas fa-thumbs-up pb-2 pr-4 pl-4"></button>
        <a href="http://'.$ip.':88"><button type="submit" class="btn btn-warning fas fa-server pb-2 pr-4 pl-4"></button></a>
        </div>';
        return $teste;
        }else if($status == false){
        return $teste = '<div class="col-md-7 text-align-center pr-2 pb-1 mt-2">
        <button type="submit" class="btn btn-danger fas fa-exclamation-circle pb-2 pl-2"></button>
       <a href="http://'.$ip.':88"><button type="submit" class="btn btn-warning fas fa-server pb-2"></button></a>
     
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
    $sql = "select escola.nome, ip.ip, ip.id from escola inner join ip on (escola.idEscola = ip.idNome) where escola.nome like '%$escola%' ORDER BY INET_ATON(ip.ip)";
    return $escolas = $conexao->query($sql);

}

function getLastMinute($escola){
    global $conexao;
    $sql = "select escola.nome, ip.ip, ip.id, job.hora, job.funciona from escola inner join ip on (escola.idEscola = ip.idNome) inner join job on (job.idIp = ip.id) WHERE job.hora >= DATE_SUB(NOW(), INTERVAL 10 MINUTE) AND escola.nome like '%$escola%'";
    return $hour = $conexao->query($sql);
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
       echo '<td>
       <i class="fa fa-exclamation-circle fa-2x red"></i>
       </td>';
    }else if($funciona == 1){
        echo '<td>
        <i class="fa fa-exclamation-triangle fa-2x yl"></i>
     </td>';
    }else if($funciona == 0){
        echo '<td>
        <i class="fa fa-check-circle ok fa-2x"></i>
   </td>';
    }else{
        echo 'Revise seu código';
    }
}


//select escola.nome, ip.ip, ip.id from escola inner join ip on (escola.idEscola = ip.idNome) inner join job on (job.idIp = ip.id) where escola.nome like 'Adolfina' and job.hora >= DATE_SUB(NOW(), INTERVAL 10 MINUTE)