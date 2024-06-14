<?php

require_once "conexao.php";
$conexao = conectar();

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

//Todo armazenar a senha de modo seguro
$sql = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

$resultado = mysqli_query($conexao, $sql);

if ($resultado === false) {
    if (mysqli_errno($conexao) == 1062){
        echo "<h3> Email já cadastrado no sistema!
        Tente fazer o login, ou a recuperação de senha. <br> <br> <a href='index.php'>Voltar para o início</a> </h3>";
    }
    echo " <br> <br> Erro ao inserir novo usuário!" . mysqli_errno($conexao) . ": " . mysqli_error($conexao);
    die();
}
header("location: index.php");