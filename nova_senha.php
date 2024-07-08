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
    echo "Email ou token incorreto. Tente fazer um novo pedido de reurperar senha.";
    die();
} else {
    //verificar a validade do pedido (data_criacao)
    //verificar se o link já foi usado
    date_default_timezone_set('America/Sao_Paulo');
    $agora = new DateTime('now');
    $data_criacao = DateTime::createFromFormat(
        'Y-m-d H:i:s',
        $recuperar['data_criacao']
    );
    $UmDia = DateInterval::createFromDateString('1 day');
    $dataExpiracao = date_add($data_criacao, $UmDia);

    if ($agora < $dataExpiracao) {
        echo "<h2> Funcionou meu kiridu. </h2> <br>
        <h3> Apocalipse 3:20-21 <br>
        Eis que estou à porta, e bato; se alguém ouvir a minha voz, <br>
        e abrir a porta, entrarei em sua casa, e com ele cearei, e ele, comigo. <br>
        Ao que vencer lhe concederei que se assente comigo no meu trono, <br>
        assim como eu venci, e me assentei com meu Pai no seu trono. </h3>";
    }
}
