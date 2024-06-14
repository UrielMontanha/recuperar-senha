<?php
$email = $_POST['email'];
$senha = $_POST['senha'];

require_once "conexao.php";
$conexao = conectar();

$sql = "SELECT * FROM usuario WHERE email='$email'";
$resultado = mysqli_query($conexao, $sql);

if ($resultado === false) {
    echo "Erro ao inserir novo usuário!" . mysqli_errno($conexao) . ": " . mysqli_error($conexao);
    die();
}
$usuario = mysqli_fetch_assoc($resultado);

if ($usuario == null) {
    echo "<h3> Email não existe no sistema!
    Por favor, primeiro realize o cadastro no sistema.
    <br> <br> <a href='index.php'>Voltar para o início</a> </h3>";
}

if ($senha == $usuario['senha']) {
    header("Location: principal.php");
} else {
    echo "<h3> Senha inválida! Tente novamente. 
    <br> <br> <a href='index.php'>Voltar para o início</a> </h3>";
}