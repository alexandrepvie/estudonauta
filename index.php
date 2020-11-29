<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="estilos/estilo.css">-->
    <link rel="stylesheet" href="estilos/style.css">
    <?php
        
    ?>
    <title>Listagem de Jogos</title>
</head>
<body>
    <?php
        require_once"includes/banco.php";
        require_once"includes/funcoes.php";
    ?>
    <div id="corpo">
        <h1>Escolha seu jogo</h1>
        <table class="listagem">
            <?php
                $busca = $banco->query("select * from jogos order by nome");
                if (!$busca) {
                    echo"<tr><td>Infelizmente a busca deu errado</td></tr>";
                } else {
                    if ($busca->num_rows == 0){
                        echo "<tr><td>Nenhum registro encontrado</td></tr>";
                    } else {
                        while($reg=$busca->fetch_object()){
                            $t = thumb($reg->capa);
                            //passando a referencia da imagem
                            echo "<tr><td><img src='$t' class='mini'/>";
                            //nome
                            echo"<td><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a>";
                            //parte  adiministrativa
                            echo "<td>Adm";
                            
                            #echo <img src='fotos/reg->capa'>;
                            
                        }
                    }
                }
            ?>
            
            <!--<tr><td>Foto</td><td>Nome</td><td>Adm</td></tr>
            <tr><td>Foto</td><td>Nome</td><td>Adm</td></tr>
            <tr><td>Foto</td><td>Nome</td><td>Adm</td></tr>
            <tr><td>Foto</td><td>Nome</td><td>Adm</td></tr>-->
        </table>
    </div>
    <?php $banco->close();?>
</body>
</html>
