<?php
include('conexao.php');

$nomep = $_POST['nome_prod'];
$descricao = $_POST['descricao'];
$preco = (float) $_POST['preco'];

//aqui esta sendo feito o uso de prepared statements para evitar sql injection, por isso os values ai passados como '?'
$sql = "INSERT INTO produtos (nomep,descricao,preco) values(?,?,?)";
$stmt=mysqli_prepare($conexao, $sql); 

//liga os paramentros
mysqli_stmt_bind_param($stmt,"ssd",
$nomep,$descricao,$preco);

//executa a query 
if(mysqli_stmt_execute($stmt)){
    echo "<div class='container text-center'>";
    echo "<h1>Cadastrado com sucesso!</h1><br><br>";
    echo '<a href="index.html" class="btn btn-primary w-100">Voltar</a>';
    echo "</div>";
}else {
    echo "erro ao cadastrar" . mysqli_error($conexao);
}
//fecha a preparação 
mysqli_stmt_close($stmt);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">