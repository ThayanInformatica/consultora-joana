<?php
session_start();

?>

<!DOCTYPE html>
<head>
    <head>
        <title>
            Consultora Joana
        </title>
        <meta charset="utf-8">
    </head>
<body>

<h1>Logar</h1>

<?php
if (isset($_GET['error'])) {
    echo '<div class="alert alert-danger">Senha Incorreta</div>';
}
if (isset($_GET['logado'])) {
    echo '<div class="alert alert-success">Logado</div>';
}

if (!isset($_SESSION['login']) && !isset($_SESSION['senha'])) {

    ?>
    <form action="../consultora-joana/Controller/UsuarioController.php" method="post">
        <input type="hidden" name="method" value="Login">
        <p>Seu Login: <input type="text" name="login"/></p>
        <p>Sua Senha: <input type="password" name="senha"/></p>
        <p><input type="submit"/></p>
    </form>
    <?php
}

if (isset($_SESSION['login']) && isset($_SESSION['senha'])) {

?>
<h2>
    Bem vindo <?php echo $_SESSION['login']; ?>
</h2>

<form action="../consultora-joana/Controller/UsuarioController.php" method="post">
    <input type="hidden" name="method" value="Deslogar">
    <button>
        Deslogar
    </button>
</form>

    <?php
}
?>
</body>
</html>

