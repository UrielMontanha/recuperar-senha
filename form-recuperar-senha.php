<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Formulário de Recuperação de Senha </title>
</head>
<body>
    <form action="recuperar.php" method="post">
        <fieldset> 
            <legend> <h1> Recuperação de Senha </h1> </legend>
            Digite o seu email para que você possa criar uma nova senha. <br>
            Será um email com um link que você usará para criar uma nova senha. <br>
            <label>Email: <input type="email" name="email"></label> <br>
            <input type="submit" value="Enviar email de recuperação"> 
    </fieldset>
    </form>
</body>
</html>