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

function reloadPage() {
    window.location.reload();
}

function CarregarCategoriaPorIDMarca(id){

    $.ajax({
        type: "GET",
        dataType: "json",
         url: "../../../consultora-joana/Controller/MarcasController.php?id=" + id,
        success:
          function (categoria) {

              document.getElementById("idCategorias").innerHTML = '';

              for (var i=0;i< categoria.length; i++) { //vai passar por todos os objetos dentro do array
                 var html = "<ul>";
                  html +="<li><a style='cursor: pointer; !important; background: transparent !important;' id='pegariD' onclick='MudarBackGroundDoClick(this);CarregarSubCategoriaPorIDCategoria("+categoria[i].id_categoria+");'>"+categoria[i].nome_categoria+"" +
                      "<input required type='hidden' id='categoria' value="+categoria[i].id_categoria+"></a></li>";
                  html +="</ul>";
                  $('#idCategorias').append(html);

              }
          }
    })
};

function CarregarSubCategoriaPorIDCategoria(id){

    $.ajax({
        type: "GET",
        dataType: "json",
        url: "../../../consultora-joana/Controller/MarcasController.php?id_sub_cat=" + id,
        success:
            function (sub_categoria) {

                document.getElementById("idSUBCategorias").innerHTML = '';

                for (var i=0;i< sub_categoria.length; i++) { //vai passar por todos os objetos dentro do array
                    var html = "<ul>";
                    html +="<li><a style='cursor: pointer; !important; background: transparent !important;' id='pegariDSubCat' onclick='MudarBackGroundDoClickSubCat(this);pegarValorDeSubCat("+sub_categoria[i].id_sub_categoria+");'>"+sub_categoria[i].nome_sub_categoria+"" +
                        "<input type='hidden' name='id_sub_categoria' id='categoria' required value="+sub_categoria[i].id_sub_categoria+"></a></li>";
                    html +="</ul>";
                    $('#idSUBCategorias').append(html);

                }
            }
    })
};

function pegarValorDeSubCat(id) {

    var html2 = "<input type='hidden' name='id_sub_categoria' id='id_sub_categoria' required value="+id+" >";

    $('#idCategorias').append(html2);


};

var controle = 0;
var controle1 = 0;
var controle2 = 0;


function MudarBackGroundDoClick(el) {

    if(controle ==0){
        document.getElementById(el.style.background = "#0069d9");
        document.getElementById(el.style.color = "#ffffff");
        document.getElementById(el.style.borderRadius = "8px");
        document.getElementById(el.style.paddingTop = "2px");
        document.getElementById(el.style.paddingBottom = "4px");
        document.getElementById(el.style.paddingRight = "10px");
        document.getElementById(el.style.paddingLeft = "10px");
        controle++;
    }
    else{
        document.getElementById(el.style.background = "transparent");
        document.getElementById(el.style.color = "black");
        controle--;
    }
}

function MudarBackGroundDoClickSubCat(el) {

    if(controle1 ==0){
        document.getElementById(el.style.background = "#0069d9");
        document.getElementById(el.style.color = "#ffffff");
        document.getElementById(el.style.borderRadius = "8px");
        document.getElementById(el.style.paddingTop = "2px");
        document.getElementById(el.style.paddingBottom = "4px");
        document.getElementById(el.style.paddingRight = "10px");
        document.getElementById(el.style.paddingLeft = "10px");
        controle1++;
    }
    else{
        document.getElementById(el.style.background = "transparent");
        document.getElementById(el.style.color = "black");
        controle1--;
    }
}

function MudarBackGroundDoClickMarcas(el) {

    if(controle2 ==0){
        document.getElementById(el.style.background = "#0069d9");
        document.getElementById(el.style.color = "#ffffff");
        document.getElementById(el.style.borderRadius = "8px");
        document.getElementById(el.style.paddingTop = "2px");
        document.getElementById(el.style.paddingBottom = "4px");
        document.getElementById(el.style.paddingRight = "10px");
        document.getElementById(el.style.paddingLeft = "10px");
        controle2++;
    }
    else{
        document.getElementById(el.style.background = "transparent");
        document.getElementById(el.style.color = "black");
        controle2--;
    }
}

function somenteNumeros(obj, e) {
    var tecla = (window.event) ? e.keyCode : e.which;
    if (tecla == 8 || tecla == 0)
        return true;
    if (tecla != 44 && tecla != 46 && tecla < 48 || tecla > 57)
        return false;
}

function alteraPonto(valorInput) {
    $(valorInput).val(valorInput.val().replace(".", ","));
}

function AbrirPromoçao(el) {
    var display = document.getElementById(el).style.display;
    if(display == "none")
        document.getElementById(el).style.display = 'block';
    else
        document.getElementById(el).style.display = 'none';
}


