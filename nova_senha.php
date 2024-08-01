<?php

//verificar o email
//verificaro token
$email = $_GET['email'];
$token = $_GET['token'];

require_once "conexao.php";
$conexao = conectar();

$sql = "SELECT * FROM `recuperar-senha` WHERE email='$email' AND token='$token'";
$resultado = executarSQL($conexao, $sql);
$recuperar = mysqli_fetch_assoc($resultado);

if ($recuperar == null) {
    echo "<h2>Email ou token incorreto. Tente fazer um novo pedido de reurperar senha.</h2>";
    die();
} else {
    //verificar a validade do pedido (data_criacao)
    //verificar se o link já foi usado
    date_default_timezone_set('America/Sao_Paulo');
    $agora = new DateTime('now');
    $data_criacao = DateTime::createFromFormat(
        'Y-m-d H:i:s',
        $recuperar['data_criacao']);

    $UmDia = DateInterval::createFromDateString('1 day');
    $dataExpiracao = date_add($data_criacao, $UmDia);

    if ($agora > $dataExpiracao) {
        echo "<h2> Essa solicitação de recuperação de senha expirou! </h2> <br>
        <h3> Faça um novo pedido de recuperação de senha. </h3>";
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Senha</title>
</head>

<body>
    <form action="salvar_nova_senha" method="POST">
        <fieldset>
            <legend>
                <h1>Nova Senha</h1>
            </legend>
            <input type="hidden" name="email" value="<?= $email ?>">
            <input type="hidden" name="token" value="<?= $token ?>">
            <h3> Email: <?= $email ?> <br> <br> <br>
                <label>Senha: <input type="password" name="senha"></label> <br> <br>
                <label>Repita a senha: <input type="password" name="repetirSenha"></label> <br> <br>
                <input type="submit" value="Salvar nova senha">
            </h3>
        </fieldset>
    </form>
</body>

</html> 