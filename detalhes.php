<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Detalhes do Jogo</title>
</head>
<body>
<?php
    require_once"includes/banco.php";
    require_once"includes/login.php";
    require_once"includes/funcoes.php";
?>
    <div id="corpo">
        <?php
            include_once"topo.php";
            $c = $_GET['cod']??0;
            $busca = $banco->query("select * from jogos where cod='$c'")
            
        ?>
        <h1>Detalhes do jogo</h1>
        <table class='detalhes'>
            <?php
                if (!$busca){ 
                    echo"<tr><td>Busca Falhou! $banco->error";
                } else {
                    if($busca->num_rows == 1) {
                        $reg = $busca->fetch_object();
                        $t = thumb($reg->capa);
                        echo "<tr><td rowspan='3'><img src='$t' class='full'/>";
                        echo"<td><h2>$reg->nome</h2>";
                        echo"Nota: $reg->nota/10";
                        if(is_admin()){
                            echo " <i class='material-icons'>add_circle</i>";
                            echo "<i class = 'material-icons'>edit</i> ";
                            echo "<i class = 'material-icons'>delete</i>";
                        } elseif (is_editor()){
                            echo " <i class='material-icons'>edit</i>";
                        }
                        echo "<tr><td>$reg->descricao";
                        echo "<tr><td>Adm";
                    } else {
                        echo"<tr><td> Nenhum jogo encontrado";
                    } 
                }
            ?>
        </table>
        <?php echo voltar(); ?>
    </div>
    <?php require_once"rodape.php";?>
</body>
</html>