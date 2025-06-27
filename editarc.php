<?php
include('conexao.php');

$id = $_GET['id'] ?? '';
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
        <form method="GET" action="editarc.php">
            <label for="nome">Digite o id: </label>
                <input class="form-control" type="text" name="id" placeholder="Id:" required><br>
            <button class="btn btn-success w-50" type="submit">Procurar</button><br><br>
            <a href="index.html" class="btn btn-primary w-50">Voltar</a>
        </form>
<?php
    if(!empty($id)){
        $sql = "SELECT * FROM clientes where id = ?";
        $stmt = mysqli_prepare($conexao,$sql);
        mysqli_stmt_bind_param($stmt,"i",$id);

        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($resultado) > 0){
            
            while($cliente = mysqli_fetch_assoc($resultado)){
               ?>
                <div class="container text-center">
                    <h1>Editar Cliente</h1>
                    <form action="atualizac.php" method="POST">
                        <input type="hidden" name="id" value="<?= $cliente['id'] ?>">
                        <label for="nome">Nome:</label>
                            <input class="form-control" type="text" name="nome" placeholder="Nome:" value="<?= $cliente['nome']?>" required><br>
                        <label for="email">Email:</label>
                            <input class="form-control" type="email" name="email" placeholder="Email:" value="<?= $cliente['email']?>" required><br>
                        <label for="telefone">Telefone:</label>
                            <input class="form-control" type="text" name="telefone" placeholder="Telefone:" maxlength="15" value="<?= $cliente['telefone']?>" required><br>
                        <label for="cpf">CPF:</label>
                            <input class="form-control" type="text" name="cpf" maxlength="14" placeholder="CPF:" value="<?= $cliente['cpf']?>" required><br>
                        <label for="data_nasc">Data de nascimento:</label>
                            <input class="form-control" type="date" name="data_nasc" value="<?= $cliente['data_nasc']?>" required><br>
                        <label for="endereco">Endereço:</label>
                            <input class="form-control" type="text" name="endereco" placeholder="Endereço:" value="<?= $cliente['endereco']?>" required><br><br>
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