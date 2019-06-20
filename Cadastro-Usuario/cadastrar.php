
<doctype html>
    <html>
<head>
    <title>Cadastro de usuario</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

    <body>
        <h1>Faça o seu cadastro abaixo </h1>
        <form action="../consultora-joana/Controller/UsuarioController.php" method="post">
        <input type="hidden" name="method" value="cadastrar">

        <label>Login:</label>
        <input type="text" name="login">
        <br>
        <br>
        <label>Nome compelato:</label>
        <input type="text" name="nome">
        <br>
        <br>
        <label>senha:</label>
        <input type="text" name="senha">
        <br>
        <br>
        <label>Repetir senha:</label>
        <input type="text" name="repetiSenha">
        <br>
        <br>
        <label>CPF:</label>
        <input type="text" name="cpf">
        <br>
        <br>
        <label>E-mail:</label>
        <input type="text" name="email">
        <br>
        <br>
        <label>Cep:</label>
        <input type="text" name="cep">

        <button type="submit">Finalizar</button>
        </form>



    </body>

    </html>




</doctype>

