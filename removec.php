<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Remover Cliente</title>
</head>
<body>
      <div class="container text-center">
        <h1>Remoção do Cliente por Id</h1>
        <form method="GET" action="removec.php">
            <label for="id">Digite o Id: </label>
                <input class="form-control" type="text" name="id" placeholder="Digite o id a ser removido:" required><br>
            <button class="btn btn-danger w-50" type="submit">Remover</button><br><br>
            <a href="index.html" class="btn btn-primary w-50">Voltar</a>
        </form>
<?php
    if($_SERVER['REQUEST_METHOD']=== 'GET' && isset($_GET['id']) && $_GET['id'] !=='' ){
        $id = $_GET['id'];
        
        $sql = "DELETE FROM clientes where id = ?";
        $stmt = mysqli_prepare($conexao,$sql);
        mysqli_stmt_bind_param($stmt,"i",$id);
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
$sql = "SELECT * FROM clientes";
$resultado = mysqli_query($conexao,$sql);
if(mysqli_num_rows($resultado)>0){
    
    echo "<div class='container text-center'>";
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
    

}
?>