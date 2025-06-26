<?php
include('conexao.php');

$sql = "SELECT * FROM clientes";
$resultado = mysqli_query($conexao,$sql);
if(mysqli_num_rows($resultado)>0){
    echo "<div class='container text-center'>";
    echo '<a href="index.html" class="btn btn-primary w-100">Voltar</a>';
    echo "<h2>Lista de Clientes</h2>";
    echo "<table class='table table-bordered w-auto mx-auto'>";
    echo "<tr><th>Id</th><th>Nome</th><th>Email</th><th>Telefone</th><th>CPF</th><th>Data Nasc.</th><th>Endereço</th></tr>";

    while ($cliente = mysqli_fetch_assoc($resultado)){
        echo "<tr>";
        echo "<td>" . htmlspecialchars($cliente['id']) . "</td>";
        echo "<td>" . htmlspecialchars($cliente['nome']). "</td>";
        echo "<td>" . htmlspecialchars($cliente['email']). "</td>";
        echo "<td>" . htmlspecialchars($cliente['telefone']) . "</td>";
        echo "<td>" . htmlspecialchars($cliente['cpf']) . "</td>";
        echo "<td>" . htmlspecialchars($cliente['data_nasc']) . "</td>";
        echo "<td>" . htmlspecialchars($cliente['endereco']) . "</td>";
        echo "</tr>";
    }
    echo "</form>";
    echo "</div>";
}else {
    echo "nenhum usuario cadastrado!";
    echo '<a href="index.html" class="btn btn-primary w-100">Voltar</a>';

}

mysqli_close($conexao);

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">