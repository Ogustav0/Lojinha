<?php
include('conexao.php');

$nome = $_GET['nome'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Busca filtrada</title>
</head>
<body>
      <div class="container text-center">
        <h1>Busca de cliente por Nome</h1>
        <form method="GET" action="buscacf.php">
            <label for="nome">Digite o Nome: </label>
                <input class="form-control" type="text" name="nome" placeholder="Nome:" required><br>
            <button class="btn btn-success w-50" type="submit">Procurar</button><br><br>
            <a href="index.html" class="btn btn-primary w-50">Voltar</a>
        </form>
<?php
    if(!empty($nome)){
        $sql = "SELECT * FROM clientes where nome LIKE ?";
        $stmt = mysqli_prepare($conexao,$sql);

        $param = "%" . $nome . "%";
        mysqli_stmt_bind_param($stmt,"s",$param);

        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($resultado) > 0){
            echo '<div class="container text-center mt-5">';
            echo "<h3>Resultado da busca:</h3>";
            echo "<table class='table table-bordered w-auto mx-auto'>";
            echo "<tr><th>Id</th><th>Nome</th><th>Email</th><th>Telefone</th><th>CPF</th><th>Data Nasc.</th><th>Endereço</th></tr>";
            
            while($cliente = mysqli_fetch_assoc($resultado)){
                echo "<tr>";
                echo "<td>" . htmlspecialchars($cliente['id']) . "</td>";
                echo "<td>" . htmlspecialchars($cliente['nome']) . "</td>";
                echo "<td>" . htmlspecialchars($cliente['email']) . "</td>";
                echo "<td>" . htmlspecialchars($cliente['telefone']) . "</td>";
                echo "<td>" . htmlspecialchars($cliente['cpf']) . "</td>";
                echo "<td>" . htmlspecialchars($cliente['data_nasc']) . "</td>";
                echo "<td>" . htmlspecialchars($cliente['endereco']) . "</td>";
                
            }
            echo "</form>";
            echo "</div>";
        }else{
            echo "Nenhum resultado encontrado!";
        }
}
mysqli_close($conexao);
?>
</div>
</body>
</html>