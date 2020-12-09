<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Cadastrar Novo Usuário</title>
</head>
<body>
<?php
    require_once"includes/banco.php";
    require_once"includes/login.php";
    require_once"includes/funcoes.php";
?>
    <div id="corpo">
        <?php
            if (!is_admin()){
                echo msg_erro("Área restrita! Você não é administrador!");
            } else {
                if(!isset($_POST['usuario'])){
                    require "user-new-form.php";
                } else {
                    $nome = "";
                    $usuario = $_POST['usuario'] ?? null;
                    $nome = $_POST['nome'] ?? null;
                    $senha1 = $_POST['senha1'] ?? null;
                    $senha2 = $_POST['senha2'] ?? null;
                    $tipo = $_POST['tipo'] ?? null;

                    if($senha1 === $senha2){
                        if (empty($usuario) || empty($nome) || empty($senha1) || empty($senha2) || empty($tipo)){
                            echo msg_erro("Todos os dados são obrigatórios!");
                        } else {
                            $senha = gerarHash($senha1);
                            $q = "INSERT INTO usuarios (usuario, nome, senha, tipo) VALUES ('$usuario', '$nome', '$senha', '$tipo')";
                            if ($banco->query($q)){
                                echo msg_sucesso("Usuário $nome cadastrado com sucesso!");
                            } else {
                                echo msg_erro("Não foi possível criar o usuário $usuario. Talve o login já esteja sendo usado.");
                            }
                        }
                    } else {
                        echo msg_erro("Senhas não conferem!. Repita o procedimento.");
                    }
                    echo "Pronto para salvar dados";
                }
            }
            echo voltar();
        ?>
    </div>
</body>
</html>