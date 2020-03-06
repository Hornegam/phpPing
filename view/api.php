
<?php 
    include '../model/conecta.inc';

    


    function getIp($id){
        global $conexao;
        $sql = "select * from job where idIp = $id";
        return $tudo = $conexao->query($sql);
    }

    function tratar(){
        $id =  (object) json_decode(file_get_contents('php://input'), true);
        $ip = getIp($id->id);
        $sla = [];
        while($row = $ip->fetch_assoc()) {
            $sla[] = $row;
        }
        echo json_encode($sla);
        //header('Content-Type: application/json');
        //header('location: teste.php');
        
    }
    
    tratar();
?>
    
