<?php
include 'conexao.php';

$resultado = mysqli_query($conexao, "SELECT * FROM clientes");

while ($linha = mysqli_fetch_assoc($resultado)) {
    echo "NomeCli: " . $linha['NomeCli'] . "<br>";
}
?>
