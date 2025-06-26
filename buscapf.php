<?php
include('conexao.php');
$nomep = $_GET['nomep'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Busca Filtrada</title>
</head>
<body>
    <div class="container text-center">
    <form method="GET" action="buscapf.php">
    <label for="nomep">Digite o nome do Produto:</label>
    <input type="text" name="nomep" class="form-control" placeholder="Nome do Produto:"><br><br>
    <button type="submit" class="btn btn-success w-50">Procurar</button><br><br>
    <a href="index.html" class="btn btn-primary w-50">Voltar</a>
    </form>

    <?php 
    if(!empty($nomep)){
        $sql = "SELECT * FROM produtos WHERE nomep Like ?";
        $stmt = mysqli_prepare($conexao,$sql);
        
        $param = "%" . $nomep . "%";
        mysqli_stmt_bind_param($stmt, "s", $param );

        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($resultado) > 0){
            echo '<div class="container text-center mt-5">';
            echo "<h3>Resultado da busca:</h3>";
            echo "<table class='table table-bordered w-auto mx-auto'>";
            echo "<tr><th>Id</th><th>Nome do Produto</th><th>Descrição</th><th>Preço</th></tr>";
        while($produto = mysqli_fetch_assoc($resultado)){

            echo "<tr>";
            echo "<td>" . htmlspecialchars($cliente['id']) . "</td>";
            echo "<td>" . htmlspecialchars($produto['nomep']) . "</td>";
            echo "<td>" . htmlspecialchars($produto['descricao']) . "</td>";
            echo "<td> R$ " . htmlspecialchars($produto['preco']) . "</td>";
        }
        echo "</form>";
        echo "</div>";
        }else{
            echo "usuario não encontrado!";
            }
        }
        mysqli_close($conexao);
     ?>
    </div>
</body>
</html>