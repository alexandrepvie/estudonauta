<!DOCTYPE html>
<?php
        require_once"includes/banco.php";
        require_once"includes/login.php";
        require_once"includes/funcoes.php";
        $ordem = $_GET['o'] ?? "n";
        $chave = $_GET['c'] ?? "";
    ?>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="estilos/estilo.css">-->
    <link rel="stylesheet" href="estilos/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Listagem de Jogos</title>
</head>
<body>
    <div id="corpo">
        <?php include_once"topo.php";?>
        <h1>Escolha seu jogo</h1>
        <form id="busca" action="index.php" method="get">
            Ordenar: 
             <a href="index.php?o=n&c=<?php echo $chave;?>">Nome</a> |
             <a href="index.php?o=p&c=<?php echo $chave;?>">Produtora</a> |
             <a href="index.php?o=n1&c=<?php echo $chave;?>">Nota Alta</a> |
             <a href="index.php?o=n2&c=<?php echo $chave;?>">Nota Baixa</a> |
             <a href="index.php">Mostrar Todos</a> |
            Buscar: <input type="text" name="c" size="10" maxlength="40">
            <input type="submit" value="Ok">
        </form>
        <table class="listagem">
            <?php
                $q = "select j.cod, j.nome, g.genero, p.produtora, j.capa from jogos j join generos g on j.genero = g.cod join produtoras p on j.produtora = p.cod ";
                if (!empty($chave)) {
                    $q .="WHERE j.nome like '%$chave%' OR p.produtora like '%$chave%' OR g.genero like '%$chave%' ";
                }
                switch ($ordem) {
                    case 'p':
                        $q .= "ORDER BY p.produtora";
                        break;
                    case 'n1': 
                        $q .= "ORDER BY j.nota DESC";
                        break;
                    case 'n2':
                        $q .= "ORDER BY j.nota ASC";
                        break;
                    default:
                        $q .= "ORDER BY j.nome"; 
                        break;
                }
                $busca = $banco->query($q);
                if (!$busca) {
                    echo"Falhou $banco->error";
                } else {
                    if ($busca->num_rows > 0){
                        
                        while($reg=$busca->fetch_object()){
                            //carregando thumb
                            $t = thumb($reg->capa);
                            echo "<tr><td><img src='$t' class='mini'/>";
                            //mostrar jogo
                            echo"<td><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a>";
                            echo"<br>[$reg->genero][$reg->produtora] ";
                            //opções de usuários
                            if(is_admin()){
                                echo"<td> <i class='material-icons'>add_circle</i>";
                                echo "<i class = 'material-icons'>edit</i> ";
                                echo "<i class = 'material-icons'>delete</i>";
                            } elseif (is_editor()){
                                echo "<td><i class='material-icons'>edit</i>";
                            }
                        }
                            
                    } else {
                        echo "<tr><td>Nenhum registro encontrado";
                            
                            #echo <img src='fotos/reg->capa'>;
                            
                        }
                    }
            ?>
            
            <!--<tr><td>Foto</td><td>Nome</td><td>Adm</td></tr>
            <tr><td>Foto</td><td>Nome</td><td>Adm</td></tr>
            <tr><td>Foto</td><td>Nome</td><td>Adm</td></tr>
            <tr><td>Foto</td><td>Nome</td><td>Adm</td></tr>-->
        </table>
    </div>
    <?php require_once"rodape.php";?>
</body>
</html>
