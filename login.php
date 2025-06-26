<?php
include('conexao.php');

$user = $_POST['user'] ?? '';
$senha = $_POST['senha'] ?? '';

if(!empty($user) && !empty($senha)){
$sql = "SELECT * FROM usuarios WHERE user = ? and senha = ?";
$stmt = mysqli_prepare($conexao,$sql);
mysqli_stmt_bind_param($stmt, "ss", $user, $senha);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($resultado) > 0 ){
    header("Location: index.html");
    exit();
}else {
echo "<div style='text-align:center; margin-top: 50px; font-family: sans-serif;'>
                <h3 style='color: crimson;'>Usuário ou senha inválidos!</h3>
                <a href='login.html' class='btn btn-danger mt-3'>Voltar</a>
              </div>";
}
mysqli_stmt_close($stmt);
mysqli_close($conexao);

}else{
    header("Location: login.html");
    exit();
}
?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
