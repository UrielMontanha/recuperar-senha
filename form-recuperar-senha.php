<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Formulário de Recuperação de Senha </title>
</head>

<body>
    <form action="recuperar.php" method="POST">
        <fieldset>
            <legend>
                <h1> Recuperação de Senha </h1>
            </legend>
            <h3> Digite o seu email para que você possa criar uma nova senha. <br>
                Será um email com um link que você usará para criar uma nova senha. </h3> <br>
            <label>
                <h3> Email: <input type="email" name="email"> </h3>
            </label> <br>
            <input type="submit" value="Enviar email de recuperação">
        </fieldset>
    </form>
</body>

</html>