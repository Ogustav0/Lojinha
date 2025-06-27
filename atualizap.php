<?php
include('conexao.php');
$idprod = $_POST['idprod'];
$nomep = $_POST['nomep'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];

if($idprod && $nomep && $descricao && $preco){
    $sql = "UPDATE produtos SET nomep=?,descricao=?,preco=? WHERE idprod=?";
    $stmt = mysqli_prepare($conexao,$sql);
    mysqli_stmt_bind_param($stmt,"sssi",$nomep,$descricao,$preco,$idprod);
    mysqli_stmt_execute($stmt);

    if(mysqli_stmt_affected_rows($stmt)>0){
        echo "<script>alert('Atualizado com sucesso'); window.location='buscap.php';</script>";

    }else{
        echo "<script>alert('Nada foi alterado ou erro na atualização'); window.location='editarp.php'</script>";

    }
}else{
    echo "<script>alert('Preencha todos os campos!');</script>";
}
?>