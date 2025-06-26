<?php
include('conexao.php');

$sql = "SELECT * FROM produtos";
$resultado = mysqli_query($conexao,$sql);

if(mysqli_num_rows($resultado) > 0){
    echo "<div class='container text-center'>";
    echo '<a href="index.html" class="btn btn-primary w-100">Voltar</a>';
    echo "<h2>Lista de Produtos</h2>";
    echo "<table class='table table-bordered w-auto mx-auto'>";
    echo "<tr><th>Id</th><th>Nome</th><th>Descrição</th><th>Preço</th></tr>";

    while ($produto = mysqli_fetch_assoc($resultado)){
        echo "<tr>";
        echo "<td>" . htmlspecialchars($cliente['id']) . "</td>";
        echo "<td>" . htmlspecialchars($produto['nomep']) . "</td>";
        echo "<td>" . htmlspecialchars($produto['descricao']) . "</td>";
        echo "<td> R$" . htmlspecialchars($produto['preco']) . "</td>";
        echo "</tr>";
    }
    echo "</form>";
    echo "</div>";
}else {
    echo "nenhum produto encontrado!";
    echo '<a href="index.html" class="btn btn-primary w-100">Voltar</a>';
}

mysqli_close($conexao)

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">