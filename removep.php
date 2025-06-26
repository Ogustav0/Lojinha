<?php
include('conexao.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Remover Produto</title>
</head>
<body>
    <div class="container text-center">
        <form method="GET" action="removep.php">
            <h1>Remover Produto por Id</h1>
            <label for="id">Digite o Id:</label>        
                <input type="text" class="form-control" name="idprod" placeholder="Digite o Id:" required><br>
                    <button class="btn btn-danger w-50" type="submit">Remover</button><br><br>
                    <a href="index.html" class="btn btn-primary w-50">Voltar</a>
                </form>
        <?php
        if($_SERVER['REQUEST_METHOD']=== 'GET' && isset($_GET['idprod']) && $_GET['idprod'] !==''){
            $idprod = $_GET['idprod'];

            $sql = "DELETE FROM produtos WHERE idprod = ?";
            $stmt = mysqli_prepare($conexao,$sql);
            mysqli_stmt_bind_param($stmt,"i",$idprod);
            mysqli_stmt_execute($stmt);

            if(mysqli_stmt_affected_rows($stmt) > 0){
                echo "<script>";
                echo "alert('Excluido com sucesso')";
                echo "</script>";
            }else{
               echo "<script>";
                echo "alert('Nao foi possivel excluir')";
                echo "</script>";
            }
        }
        mysqli_close($conexao);
        ?>
    </div>
</body>
</html>
<?php
include('conexao.php');
$sql = "SELECT * FROM produtos";
$resultado = mysqli_query($conexao,$sql);

if(mysqli_num_rows($resultado) > 0){
    echo "<div class='container text-center'>";
    echo "<h2>Lista de produtos</h2>";
    echo "<table class='table table-bordered w-auto mx-auto'>";
    echo "<tr><th>Id</th><th>Nome do Produto</th><th>Descrição</th><th>Preço</th></tr>";

    while($produto = mysqli_fetch_assoc($resultado)){
        echo "<tr>";
        echo "<td>" . htmlspecialchars($produto['idprod']) . "</td>";
        echo "<td>" . htmlspecialchars($produto['nomep']) . "</td>";
        echo "<td>" . htmlspecialchars($produto['descricao']) . "</td>";
        echo "<td> R$" . htmlspecialchars($produto['preco']) . "</td>";
        echo "</tr>";
    }
    echo "</form>";
    echo "</div>";
}else{
    echo "Nenhum produto encontrado";
    echo '<a href="index.html" class="btn btn-primary w-100">Voltar</a>';
}
?>