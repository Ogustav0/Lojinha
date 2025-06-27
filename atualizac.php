<?php
include('conexao.php');
$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];
$data_nasc = $_POST['data_nasc'];
$endereco = $_POST['endereco'];

if($id && $nome && $telefone && $cpf && $data_nasc && $endereco){
$sql = "UPDATE clientes SET nome = ?, email = ?, telefone  = ?, cpf = ?, data_nasc = ?, endereco = ? WHERE id=?";
$stmt = mysqli_prepare($conexao,$sql);
mysqli_stmt_bind_param($stmt,"ssssssi",$nome,$email,$telefone,$cpf,$data_nasc,$endereco,$id);
mysqli_stmt_execute($stmt);

if(mysqli_stmt_affected_rows($stmt)>0){
            echo "<script>alert('Atualizado com sucesso'); window.location='buscac.php';</script>";
}else{
            echo "<script>alert('Nada foi alterado ou erro na atualização');</script>";
}

}else{
        echo "<script>alert('Preencha todos os campos!');</script>";
}
?>