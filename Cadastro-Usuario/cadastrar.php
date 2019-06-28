<doctype html>
    <html>
    <head>
        <title>Cadastro de usuario</title>
        <!--        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">-->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"
                integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
                crossorigin="anonymous"></script>
        <script type="application/javascript" src="cadastrar.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">
    </head>

    <body>
    <div class="container">
    <h1>Faça o seu cadastro abaixo </h1>


    <?php
    if (isset($_GET['erro'])) {
        echo '<div class="alert alert-danger">Sua senha nao e igual</div>';
    }

    ?>

    <form action="../consultora-joana/Controller/UsuarioController.php" method="post">
        <input type="hidden" name="method" value="cadastrar">

        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="validationServerUsername">Email</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend3">@</span>
                    </div>
                    <input type="email" class="is-invalid form-control" id="email" onblur="validarEmail();"
                           onkeypress="validarEmail();" name="email" placeholder="Digite seu email..."
                           aria-describedby="inputGroupPrepend3" required>
                    <?php
                    if (isset($_GET['Emailerro'])) {
                        echo ' <div class="invalid-feedback"> Email existente
                            </div>';
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <label for="validationServer02">Nome Completo</label>
                <input type="text" class="form-control is-valid" id="nome" name="nome"
                       placeholder="Digite o seu nome..." required>
                <div class="valid-feedback">

                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="validationServerUsername">Senha</label>
                <div class="input-group">
                    <!---->
                    <input type="password" class="is-invalid form-control" id="senhaPegarClass" name="senha"
                           onkeypress="validarSenha();" onkeyup="validarSenhaErepeteSenha()"
                           onblur="validarSenhaErepeteSenha()" placeholder="Digite sua senha..."
                           aria-describedby="inputGroupPrepend3" required>
                    <?php
                    if (isset($_GET['erro'])) {
                        echo ' <div class="invalid-feedback"> Senhas devem ser iguais.
                            </div>';
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationServer03">Repete Senha</label>
                <input type="password" class="form-control is-invalid" id="rep_senha"
                       onkeyup="validarSenhaErepeteSenha()" onblur="validarSenhaErepeteSenha()" name="repetiSenha"
                       placeholder="Digite a senha..."
                       required>
                <div class="invalid-feedback">
                    Senhas devem ser iguais.
                </div>
            </div>


            <div class="col-md-6 mb-3">
                <label for="validationServer04">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite CPF" required
                       size="60" maxlength="14"
                       pattern="(^[0-9]+[.\-]+([0-9]+)?" onblur="validarCPF(this)"
                       onkeyup="formatar(this,'000.000.000-00'); "
                       onkeypress="return somenteNumerosCPF( this , event );">

                <div class="invalid-feedback">
                    Apenas CPF valido.
                </div>
            </div>

        </div>


        <div class="col-md-12 mb-3">
            <button class="form-control" type="button" onclick="AbrirEndereco('campos-endereco')">
                Adicionar Endereço
            </button>
        </div>

        <div class="form-row" id="campos-endereco">

            <div class="col-md-3 mb-3">
                <label for="validationServer03">CEP</label>
                <input type="txt" class="form-control" id="cep"
                       name="cep" placeholder="Digite a CEP..."
                       required>
                <div class="invalid-feedback">
                    Senhas devem ser iguais.
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <label for="validationServer03">Rua</label>
                <input type="txt" class="form-control" id="rua"
                       name="rua" placeholder="Rua..."
                       required>
                <div class="invalid-feedback">
                    Senhas devem ser iguais.
                </div>
            </div>


            <div class="col-md-4 mb-3">
                <label for="validationServer03">Bairro</label>
                <input type="txt" class="form-control" id="bairro"
                       name="bairro" placeholder="Digite a Bairro..."
                       required>
                <div class="invalid-feedback">
                    Senhas devem ser iguais.
                </div>
            </div>

            <div class="col-md-2 mb-3">
                <label for="validationServer03">Numero</label>
                <input type="txt" class="form-control" id="numero"
                       name="numero" placeholder="Numero residencia..."
                       required>
                <div class="invalid-feedback">
                    Senhas devem ser iguais.
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="validationServer03">Complemento</label>
                <input type="txt" class="form-control" id="complemento"
                       name="complemento" placeholder="Complemento..."
                       required>
                <div class="invalid-feedback">
                    Senhas devem ser iguais.
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <label for="validationServer03">Cidade</label>
                <input type="txt" class="form-control" id="cidade"
                       name="cidade" placeholder="Sua cidade..."
                       required>
                <div class="invalid-feedback">
                    Senhas devem ser iguais.
                </div>
            </div>


            <div class="col-md-2 mb-3">
                <label for="validationServer03">UF</label>
                <input type="txt" class="form-control" id="uf"
                       name="uf" placeholder="Digite a UF..."
                       required>
                <div class="invalid-feedback">
                    Senhas devem ser iguais.
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Cadastrar</button>
    </form>

    </div>

    </body>

    </html>


</doctype>

