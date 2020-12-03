<?php
session_start();
//Testando para ver se tem usuario logado, saida usuario ou vazio
if (!isset($_SESSION['user'])){
    $_SESSION['user'] ="";
    $_SESSION['nome'] ="";
    $_SESSION['tipo'] ="";
}

function cripto($senha){
    $c = '';
    for($pos = 0; $pos < strlen($senha);$pos++) {
        $letra = ord($senha[$pos]) +1;
        $c .= chr($letra); 
    }
}

function gerarHash($senha){
    $txt = cripto($senha);
    $hash = password_hash($senha, PASSWORD_DEFAULT);
    return $hash;
}

function testarHash($senha, $hash){
    $ok = password_verify(cripto($senha),$hash);
    return $ok;
}
