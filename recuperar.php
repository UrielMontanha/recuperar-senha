<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMaile\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "conexao.php";
$conexao = conectar();

$email = $_POST['email'];
$sql = "SELECT *FROM usuario WHERE email='$email'";
$resultado = executarSQL($conexao, $sql);

$usuario = mysqli_fetch_assoc($resultado);
if ($usuario == null) {
    echo "<h2> Email não cadastrado! Faça o cadastro e em seguida realize o login. </h2>";
    die();
}
//gerar um token único
$token = bin2hex(random_bytes(50));

require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
require_once 'PHPMailer/src/Exception.php';
echo "YESSS 🧔🤟";

$mail = new PHPMailer(true);
try {
    //configurações
    $mail ->CharSet = 'UTF-8';
    $mail ->Encoding = 'base64';
    $mail ->setLanguage('br');
    //$mail ->SMTPDebug = SMTP::DEBUG_OFF; //tira as mensagens de erro
    $mail ->SMTPDebug = SMTP::DEBUG_SERVER; //imprime as mensagens de erro
    $mail ->isSMTP();                       //envia o email usando SMTP
    $mail ->Host = 'smtp.gamil.com';        //
    $mail ->SMTPAuth = TRUE;
    $mail ->Username = 'programacaoiii2021@gmail.com';
    $mail ->Password = '';
    $mail ->SMTPSecure = PHPMailer::ENCRYPITON_STARTTLS;
    $mail ->Port = 587;

} catch (Exception $e) {
    echo "<h2> Não foi possível enviar o email.
    Mailer Error: {$mail->ErrorInfo} </h2>";
}
