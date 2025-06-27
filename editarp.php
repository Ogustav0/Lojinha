<?php
include('conexao.php');

$idprod = $_GET['id'] ?? '';
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
        <h1>Busca de cliente por ID</h1>
        <form method="GET" action="editarp.php">
            <label for="nome">Digite o id: </label>
                <input class="form-control" type="text" name="id" placeholder="Id:" required><br>
            <button class="btn btn-success w-50" type="submit">Procurar</button><br><br>
            <a href="index.html" class="btn btn-primary w-50">Voltar</a>
        </form>
<?php
    if(!empty($idprod)){
        $sql = "SELECT * FROM produtos where idprod = ?";
        $stmt = mysqli_prepare($conexao,$sql);
        mysqli_stmt_bind_param($stmt,"i",$idprod);

        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($resultado) > 0){
            
            while($produtos = mysqli_fetch_assoc($resultado)){
               ?>
                <div class="container text-center">
                    <h1>Editar Produtos</h1>
                    <form action="atualizap.php" method="POST">
                        <input type="hidden" name="idprod" value="<?= $produtos['idprod'] ?>">
                        <label for="nome">Nome do Produto:</label>
                            <input class="form-control" type="text" name="nomep" placeholder="Nome:" value="<?= $produtos['nomep']?>" required><br>
                        <label for="descricao">Descrição:</label>
                            <input class="form-control" type="descricao" name="descricao" placeholder="Descricao:" value="<?= $produtos['descricao']?>" required><br>
                        <label for="preco">Preço em R$:</label>
                            <input class="form-control" type="text" name="preco" placeholder="Preco:" maxlength="15" value="<?= $produtos['preco']?>" required><br>
                            <button class="btn btn-success w-50" type="submit">Atualizar</button>
                    </form>
                </div>
                <?php
            }
        }else{
            echo "Nenhum resultado encontrado!";
        }
}
mysqli_close($conexao);
?>
</div>
</body>
</html>