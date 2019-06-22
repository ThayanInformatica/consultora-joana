// Quando enviado o formulário
$('#formulario').on('submit', function () {

    // Armazenando objetos em variáveis para utilizá-los posteriormente
    var formulario = $(this);
    var botao = $('#salvar');
    var mensagem = $('#mensagem');

    // Exibindo indicador de carregamento (Bootstrap)
    // Docs: http://getbootstrap.com/javascript/#buttons
    botao.button('loading');

    // Enviando formulário
    $(this).ajaxSubmit({

        // Definindo tipo de retorno do servidor
        dataType: 'json',

        // Se a requisição foi um sucesso
        success: function (retorno) {

            // Se cadastrado com sucesso
            if (retorno.sucesso) {
                // Definindo estilo da mensagem (sucesso)
                mensagem.attr('class', 'alert alert-success');

                // Limpando formulário
                formulario.resetForm();
            }
            else {
                // Definindo estilo da mensagem (erro)
                mensagem.attr('class', 'alert alert-danger');
            }

            // Exibindo mensagem
            mensagem.html(retorno.mensagem);

            // Escondendo indicador de carregamento
            botao.button('reset');

        },

        // Se houver algum erro na requisição
        error: function () {

            // Definindo estilo da mensagem (erro)
            mensagem.attr('class', 'alert alert-danger');

            // Exibindo mensagem
            mensagem.html(retorno.mensagem);

            // Escondendo indicador de carregamento
            botao.button('reset');
        }

    });

    // Retorna FALSE para que o formulário não seja enviado de forma convencional
    return false;

});


var inputFile = document.getElementById("foto");
var foto_cliente = document.getElementById("foto-cliente");
if (inputFile != null && inputFile.addEventListener) {
    inputFile.addEventListener("change", function(){loadFoto(this, foto_cliente)});
} else if (inputFile != null && inputFile.attachEvent) {
    inputFile.attachEvent("onchange", function(){loadFoto(this, foto_cliente)});
}

function loadFoto(file, img){
    if (file.files && file.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            img.src = e.target.result;
        }
        reader.readAsDataURL(file.files[0]);
    }
}