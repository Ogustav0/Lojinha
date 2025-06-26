<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<?php
include('conexao.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];
$data_nasc = $_POST['data_nasc'];
$endereco = $_POST['endereco'];


//aqui esta sendo feito o uso de prepared statements para evitar sql injection, por isso os values ai passados como '?'
$sql = "INSERT INTO clientes (nome,email,telefone,cpf,data_nasc,endereco) values(?,?,?,?,?,?)";
$stmt=mysqli_prepare($conexao, $sql); 

//liga os paramentros
mysqli_stmt_bind_param($stmt,"ssssss",
$nome,$email,$telefone,$cpf,$data_nasc,$endereco);

//executa a query 
if(mysqli_stmt_execute($stmt)){
    echo "<h1> Cadastrado com sucesso!>";
    echo "<a href='index.html' class='btn btn-primary w-100'>Voltar</a>";
}else {
    echo "erro ao cadastrar" . mysqli_error($conexao);
}
//fecha a preparação 
mysqli_stmt_close($stmt);
?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

