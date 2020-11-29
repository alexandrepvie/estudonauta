<?php
echo"<footer>";
echo"<p>Acessdo por ".$_SERVER['REMOTE_ADDR']." em ".date('d/m/Y')."</p>";
echo"<p>Desenvolvido por Alexandre Vieira &copy; dez 2020</p>";
echo"</footer>";
$banco->close();