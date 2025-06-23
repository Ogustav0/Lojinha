<?php
$host="localhost";
$usuario = "root";
$senha ="";
$banco = "loja";
$conexao = mysqli_connect($host,$usuario,$senha,$banco);

if (!$conexao){
    die("erro de conexao:". mysqli_connect_error());

}
?>


