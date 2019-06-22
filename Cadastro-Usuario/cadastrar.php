
<doctype html>
    <html>
<head>
    <title>Cadastro de usuario</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

    <script type="application/javascript" src="cadastrar.js" ></script>

</head>

    <body>
        <h1>Faça o seu cadastro abaixo </h1>

        <div class="container">
            <hr>

            <?php
            if (isset($_GET['erro'])) {
                echo '<div class="alert alert-danger">Sua senha nao e igual</div>';
            }

            ?>

            <form action="../consultora-joana/Controller/UsuarioController.php" method="post">
                <input type="hidden" name="method" value="cadastrar">

                <div class="centralizandoFormulario">
                    <div class="col-sm-5" class="tamanho-campoLogin">
                        <div class="form-group">
                            <label id="login" for="login" style="">Login: </label>
                            <input type="text" class="form-control" id="login" name="login" required autofocus>
                        </div>
                    </div>


                    <div class="col-sm-5" class="tamanho-campoNome">
                        <div class="form-group ">
                            <label for="nome">Nome: </label>
                            <input id="nome" type="text" class="form-control" name="nome" required>
                        </div>
                    </div>
                    <div class="col-sm-5" class="tamanho-campoSenha">
                        <div class="campo-senha" class="form-group">
                            <label for="senha">Senha:</label>
                            <input type="password" class="form-control" id="senha" name="senha" minlength="6" required>
                        </div>
                    </div>

                    <div class="col-sm-5" class="tamanho-campoRepita">
                        <div class="form-group">
                            <label for="rep_senha">Repita a Senha:</label>
                            <input type="password" class="form-control" id="rep_senha" name="repetiSenha"
                                   minlength="6" required>
                        </div>
                    </div>

                    <div class="col-sm-5" class="tamanho-campocpf">
                        <div class="form-group" class="form-horizontal">
                            <label for="cpf">CPF:</label>
                            <input size=30 maxlength="14"

                                   pattern="(^[0-9]+[.\-]+([0-9]+)?" onblur="validarCPF(this)"
                                   onkeyup="formatar(this,'000.000.000-00')"
                                   onkeypress="return somenteNumerosCPF( this , event );" type="text"

                                   class="form-control" id="cpf" name="cpf" >
                        </div>
                    </div>

                    <div class="col-sm-5" class="tamanho-campoEmail">
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <div class="input-group">
                                <div class="input-group-addon">@</div>
                                <input type="email" class="form-control" id="email" name="email" required

                            </div>
                        </div>

                        <div>
                            <button type="button" onclick="AbrirEndereco('campos-endereco')">
                                Adicionar Endereço
                            </button>
                        </div>

                        <div id="campos-endereco" class="col-sm-5" class="tamanho-campoNome" style="display: none;">
                            <div class="form-group ">
                                <label for="CEP">CEP: </label>
                                <input name="cep" type="text" id="cep" value="" size="10" maxlength="9"
                            </div>

                            <label>Rua:
                                <input name="rua" type="text" id="rua" size="60" /></label><br />
                            <label>Bairro:
                                <input name="bairro" type="text" id="bairro" size="40" /></label><br />
                            <label>Numero:
                                <input name="numero" type="numbe" id="numero" size="40" /></label><br />
                            <label>Complementação:
                                <input name="complemento" type="text" id="compelemento" size="60" /></label><br />

                            <label>Cidade:
                                <input name="cidade" type="text" id="cidade" size="40" /></label><br />
                            <label>Estado:
                                <input name="uf" type="text" id="uf" size="2" /></label><br />
                        </div>
                    </div>

                            <button type="submit">Finalizar</button>
                            </form>

    </body>

    </html>




</doctype>

