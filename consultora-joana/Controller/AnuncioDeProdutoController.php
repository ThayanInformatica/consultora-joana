<?php
require_once __DIR__ . '/../repository/AnuncioDeProdutoRepository.php';
require_once __DIR__ . '/../repository/ImagemDeAnuncioRepository.php';
require_once __DIR__ . '/../domain/AnuncioDeProduto.php';
require_once __DIR__ . '/../domain/ImagemDeAnuncio.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['method'] == 'CadastroDeProduto') {
    $cadastroProdutoMethod = $_POST['method'];
    if (method_exists('AnuncioDeProdutoController', $cadastroProdutoMethod)) {
        $anuncioDeProdutoController = new AnuncioDeProdutoController;
        $anuncioDeProdutoController->CadastroDeProduto($cadastroProdutoMethod);
    } else {
        echo 'Metodo incorreto';
    }
}

//if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['method'] == 'Deslogar') {
//    $login = $_POST['method'];
//    if(method_exists('UsuarioController', $login)) {
//        $usuarioController = new UsuarioController;
//        $usuarioController->Deslogar();
//    } else {
//        echo 'Metodo incorreto';
//    }
//}

class AnuncioDeProdutoController
{

    public function CadastroDeProduto()
    {
        $cadastroProduto = null;
        $anuncioDeProduto = new AnuncioDeProduto();
        $imagemDeAnuncio = new ImagemDeAnuncio();
        $anuncioDeProdutoRepository = new AnuncioDeProdutoRepository();
        $imagemDeAnuncioRepository = new ImagemDeAnuncioRepository();

        $anuncioDeProduto->setNomeProduto($_POST['nome_produto']);
        $anuncioDeProduto->setDescProduto($_POST['desc_produto']);
        $foto = $_FILES['foto'];

        if (!isset($_FILES['foto'])) {
            echo retorno('Selecione uma imagem');
            exit;
        }


        if (strcmp($cadastroProduto, 'CadastroDeProduto')) {
           $anuncioDeProdutoRepository->CadastrarProduto($anuncioDeProduto);

        }

        if (isset($_FILES['foto'])) {

            $imagemDeAnuncio->setNome($foto['name']);
            $imagemDeAnuncio->setTipo($foto['type']);
            $imagemDeAnuncio->setTamanho($foto['size']);

            define('TAMANHO_MAXIMO', (2 * 1024 * 1024));

            if (!preg_match('/^image\/(pjpeg|jpeg|png|gif|bmp)$/', $imagemDeAnuncio->getTipo())) {
                echo retorno('Isso não é uma imagem válida');
                exit;
            }

// Tamanho
            if ($imagemDeAnuncio->getTamanho() > TAMANHO_MAXIMO) {
                echo retorno('A imagem deve possuir no máximo 2 MB');
                exit;
            }

            $conteudo = file_get_contents($foto['tmp_name']);
            $imagemDeAnuncio->setConteudo($conteudo);

            $imagemDeAnuncioRepository->SalvarImagem($imagemDeAnuncio);

        }

        header('Location: ../../index/index.php?cadastrado');

    }
}

?>