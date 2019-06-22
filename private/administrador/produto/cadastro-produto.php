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
        <link href="produto.css"
              rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
              crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
              rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah')
                            .attr('src', e.target.result)
                            .width(180)
                            .height(auto);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    </head>
<body>

<h1>Cadastro Produto</h1>

<form enctype="multipart/form-data" id="formulario" action="../../../consultora-joana/Controller/AnuncioDeProdutoController.php" method="post">
    <input type="hidden" name="method" value="CadastroDeProduto">
    <div id="mensagem">
    </div>

    <p>Nome do Produto: </p>
    <input type="text" name="nome_produto"/>
    <p>Descrição do Produto:</p>
    <input type="text" name="desc_produto"/>
    <br>
    <br>

    <div class="row">
        <label for="nome">Selecionar Logo</label>
        <div class="col-md-2">
            <a href="#" class="thumbnail">
                <img src="../../../imagens/produto/padrao.jpg" height="150" width="150" id="foto-cliente">
            </a>
        </div>
        <div class="form-group">
            <input type="file" name="foto" id="foto" value="foto"  onchange="loadFoto()">
        </div>
    </div>

    <a>
        <button id="salvar" class="btn btn-primary" type="submit" data-loading-text="Salvando...">
            Cadastrar
        </button>
    </a>
</form>

</body>

<script type="text/javascript" src="produto.js"></script>

</html>

