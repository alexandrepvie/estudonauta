<?php
    $q = "SELECT usuario, nome, senha, tipo FROM usuarios WHERE usuario ='". $_SESSION['user'] ."'";
    $busca = $banco->query($q);
    $reg = $busca->fetch_object();
?>
<h1>Alteração de Dados</h1>
<form action="user-edit.php" method="post">
    <table>
        <tr><td>Usuário:
        <td><input type="text" name="usuario" id="usuario" size="10" maxlength="10" readonly value="<?php echo $reg->usuario;?>">
        <tr><td>Nome
            <td><input type="text" name="nome" id="usuario" size="30" maxlength="30" value="<?php echo $reg->nome;?>">
        <tr><td>Tipo
            <td><input type="text" name="tipo" id="tipo" readonly value="<?php echo $reg->tipo;?>">
        <tr><td>Senha
            <td><input type="password" name="senha1" id="senha1" size="10" maxlength="10">
        <tr><td>Confirme a Senha
            <td><input type="password" name="senha2" id="senha2" size="10" maxlength="10">
        <tr><td><input type="submit" value="Salvar">
    </table>
</form>