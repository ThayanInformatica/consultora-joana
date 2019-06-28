<?php
	 require_once __DIR__ .'/../repository/UsuarioRepository.php';
	 require_once __DIR__ .'/../domain/Usuario.php';
    require_once __DIR__ .'/../domain/Endereco.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['method'] == 'Login') {
    $login = $_POST['method'];
    if (method_exists('UsuarioController', $login)) {
        $usuarioController = new UsuarioController;
        $usuarioController->Login($login);
    }
} else {
    echo 'Metodo incorreto';
}

//echo md5('id_usuario: 25'); gerador de Token


if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['method'] == 'cadastrar'){
    $metoCadastrar = $_POST['method'];
    if(method_exists('UsuarioController', $metoCadastrar)) {
        $usuarioController = new UsuarioController;
        $usuarioController->Cadastrar($metoCadastrar);
    }
} else {
    echo 'Metodo incorreto';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['method'] == 'Deslogar') {
    $login = $_POST['method'];
    if (method_exists('UsuarioController', $login)) {
        $usuarioController = new UsuarioController;
        $usuarioController->Deslogar();
    } else {
        echo 'Metodo incorreto';
    }
}

class UsuarioController
{

    public function Login()
    {
        $logon = null;
        $usuario = new Usuario();
        $usuarioRepository = new UsuarioRepository();

        $usuario->setLogin($_POST['login']);
        $usuario->setSenha($_POST['senha']);


        if (strcmp($logon, 'Logar')) {
            $userPass = $usuarioRepository->Logar($usuario);

            if ($userPass == true) {
                session_start();
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['senha'] = $_POST['senha'];
                header('Location: ../../index/index.php?logado=sucesso');
                return $userPass;

            }
            if ($userPass == false) {
                header('Location: ../../index/index.php?error=senha');
                return $userPass;
            }
        }
    }

    public function Deslogar()
    {

        $logon = null;
        if (strcmp($logon, 'Deslogar')) {

            session_start();

            session_destroy();
            header('Location: ../../index/index.php?deslogado=sucesso');
        }

    }

    public function Cadastrar()
    {

        $metodo = null;

        $pegarUsuario = new UsuarioController();

        $usuarioRepository = new UsuarioRepository();

        $usuario = $pegarUsuario->Usuario();

        $endereco = $pegarUsuario->Endereco();

        if ($usuario->getSenha() == $usuario->getRepeteSenha()) {
            if (strcmp($metodo, 'cadastrar')) {

              $cpfok =  $usuarioRepository->ValidarCpf($usuario);

              $recebeEmail = $usuarioRepository->validaEmail($usuario);

                if($cpfok == true && $recebeEmail == true){
                 $id = $usuarioRepository->CadastrarUsuario($usuario);

                if (!empty($endereco->getCep())) {
                    $endereco->setId_usuario($id);
                    $usuarioRepository->salvarEndereco($endereco);
                }
                }

                if($cpfok == true && $recebeEmail == true){
                    header('Location: ../../index.php');
                }

            }
        }

        if($cpfok == true && $recebeEmail == false){
            header('Location: ../../cadastro-usuario/cadastrar.php?Emailerro=invalido');
        }

        if($cpfok == false && $recebeEmail == true){
            header('Location: ../../cadastro-usuario/cadastrar.php?erro=cpfinvalido');
        }

        if ($usuario->getSenha() !== $usuario->getRepeteSenha()) {
            header('Location: ../../cadastro-usuario/cadastrar.php?erro=senha-diferentes');
        }

    }

    public function Usuario(){

        $usuario = new Usuario();

        $usuario->setNome($_POST['nome']);
        $usuario->setSenha($_POST['senha']);
        $usuario->setRepeteSenha($_POST['repetiSenha']);
        $usuario->setCpf($_POST['cpf']);
        $usuario->setEmail($_POST['email']);

                return $usuario;
            }

    public function Endereco(){

        $endereco = new Endereco();

        $endereco->setcep($_POST['cep']);
        $endereco->setrua($_POST['rua']);
        $endereco->setbairro($_POST['bairro']);
        $endereco->setcidade($_POST['cidade']);
        $endereco->setcomplementacao($_POST['complemento']);
        $endereco->setnumero($_POST['numero']);
        $endereco->setuf($_POST['uf']);

        return $endereco;
    }




}


?>