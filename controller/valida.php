<?php

include '../model/conecta.inc'; 

session_cache_expire(60);
session_start();

function verifica($user1,$pass1){
    global $conexao;
    $go = false ;
    $sql = "select * from users where usuario = '$user1' and senha = '$pass1'";
    //echo ("50");
    $result = $conexao->query($sql);
    //echo ("60");
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            if($row['usuario'] == $user1 && $row['senha']==$pass1){
                $go = true;
                //echo ("30");
            }
        }
    }

    if($go == true){
        $sql = "select * from users where rg = '".$user1."'";
        $consultas = $conexao->query($sql);
        //echo ("40");
        foreach($consultas as $consulta){
            $_SESSION['nome'] = $consulta['nome'];
            $_SESSION['acesso'] = $consulta['acesso'];
            $_SESSION['id'] = $consulta['idUser'];
        }
        //echo ("10");
        header('location: ../0');

    }else{
        $_SESSION["nome"] = null;
        //echo ("20");
        header('location: ../login');
    }


    $conexao->close();



}

$user = $_POST['username'];
$pass = $_POST['password'];
verifica($user,$pass);
//Começa validação

