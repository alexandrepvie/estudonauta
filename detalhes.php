<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estilo.css">
    <title>Título da página</title>
</head>
<body>
<?php
    require_once"includes/banco.php";
    require_once"includes/funcoes.php";
?>
    <div id="corpo">
        <?php
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
                        echo "<tr><td rowspan='3'>foto</td><td>$reg->nome</td></tr>";
                        echo "<tr> <td>Descrição</td></tr>";
                        echo "<tr><td>Adm</td></tr>";
                    } else {
                        echo"<tr><td> Nenhum registro encontrado";
                    } 
                }
            ?>
        </table>
    </div>
</body>
</html>