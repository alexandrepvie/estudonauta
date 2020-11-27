<?php
    //acesso ao banco $banco = new mysqli(host, usuario, senha, banco);
    $banco = new mysqli("localhost","root","", "bd_games");
    if($banco->connect_errno){
        echo"<p>Encontrei em erro $banco->errno  --> $banco->connect_error</p>";
        die();
    }
    $banco->query("SET NAMES 'utf8");
    $banco->query("SET character_set_conection=utf8");
    $banco->query("SET character_set_client=utf8");
    $banco->query("SET character_set_results=utf8");

    /*$busca = $banco->query("select * from generos");
    if (!$busca) {
        echo"<p>Falha na busca! $banco->error</p>";
    } else {
        while ($reg = $busca->fetch_object()){
            print_r($reg);
        }
    }*/