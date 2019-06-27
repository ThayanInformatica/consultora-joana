<?php
session_start();

?>

<!DOCTYPE html>
<head>
    <head>
        <title>
            Cadastro de Produto
        </title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="produto.css"
              rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
              rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    </head>
<body>

<h1>Cadastro Produto</h1>

<div class="container">

    <div class="row">

        <form enctype="multipart/form-data" id="formulario"
              action="../../../consultora-joana/Controller/AnuncioDeProdutoController.php" method="post">
            <input type="hidden" name="method" value="CadastroDeProduto">
            <div id="mensagem">
            </div>

            <div class="col-md-12 mb-3">
                <label class=" control-label">Nome do Produto: </label>
                <input class="form-control" type="text" name="nome_produto" required/>
            </div>

            <div class="col-md-12 mb-3 control-group">
                <div class="editandoResumo" class="control-group"
                <label class=" control-label
                ">Descrição de Produto:</label>
                <div class="controls">
                                    <textarea size="40" class="form-control" name="desc_produto" type="text" required
                                    ></textarea>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="nome">Selecionar Imagem de Produto</label>
                <div class="col-md-2">
                    <a href="#" class="thumbnail">
                        <img src="../../../imagens/produto/padrao.jpg" height="150" width="150" id="foto-cliente">
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                    <input type="file" name="foto" id="foto" value="foto" onchange="loadFoto()" required>
                </div>

            <br>
            <div class="aAlinha col-md-12 mb-3">
                <div class="col-md-4 mb-3">
                <label>
                    Marcas:
                </label>
                <ul>
                    <?php
                    include_once '../../../consultora-joana/Controller/MarcasController.php';
                    $marca = new MarcasController();
                    $marcas = $marca->listarTodasAsMarcas();

                    foreach ($marcas as $row) {
                        ?>
                        <li>
                            <a class="idMarcas" style="cursor: pointer; background: transparent !important;"
                               onclick="CarregarCategoriaPorIDMarca(<?php echo $row['id_marca']; ?>); MudarBackGroundDoClickMarcas(this);">
                                <?php echo $row['nome_marca'];
                                ?>
                            </a>
                        </li>
                    <?php }
                    ?>
                </ul>

                </div>

                <div class="col-md-4 mb-3">
                <label >
                    Categorias:
                </label>
                <ul id="idCategorias" >
                    <li>
                        <a class="idCategorias" style="cursor: pointer; !important;">
                            <input type="hidden" id="categoria" required>
                        </a>
                    </li>
                </ul>

                </div>
                <div class="col-md-4 mb-3">
                <label>
                    Sub-Categorias:
                </label>
                <ul id="idSUBCategorias">
                    <li>
                        <a class="idSubCategorias" name="id_sub_categoria" style="cursor: pointer; !important;">
                            <input type="hidden" name="id_sub_categoria" id="categoria" required>
                        </a>
                    </li>
                </ul>
                    <?php
                    if (isset($_GET['falhadeid'])) {
                        echo '<div class="alert alert-danger">Você precisa escolher uma sub-categoria deste produto</div>';
                    }
                    ?>
                </div>
            </div>

            <a>
                <button id="salvar" class="btn btn-primary" type="submit" data-loading-text="Salvando...">
                    Cadastrar
                </button>
            </a>
    </div>

</div>

</form>

</body>

<script type="text/javascript" src="produto.js"></script>

</html>

<script src="https://kit.fontawesome.com/79a5042525.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
