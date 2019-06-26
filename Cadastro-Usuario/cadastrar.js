function valid_cpf(cpf) {
    cpf = cpf.replace(/[^\d]+/g, '');
    if (cpf == '') return false;
    if (cpf.length != 11 ||
        cpf == "00000000000" ||
        cpf == "11111111111" ||
        cpf == "22222222222" ||
        cpf == "33333333333" ||
        cpf == "44444444444" ||
        cpf == "55555555555" ||
        cpf == "66666666666" ||
        cpf == "77777777777" ||
        cpf == "88888888888" ||
        cpf == "99999999999")
        return false;
    add = 0;
    for (i = 0; i < 9; i++)
        add += parseInt(cpf.charAt(i)) * (10 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(9)))
        return false;
    add = 0;
    for (i = 0; i < 10; i++)
        add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(10)))
        return false;
    return true;
}

function validarCPF(el) {
    if (!valid_cpf(el.value)) {

        document.getElementById("cpf").className = 'is-invalid form-control'

        // apaga o valor
        el.value = "";
    }
    if (valid_cpf(el.value)) {

        document.getElementById("cpf").className = 'is-valid form-control'
    }
}

function formatar(src, mask) {
    var i = src.value.length;
    var saida = mask.substring(0, 1);
    var texto = mask.substring(i)
    if (texto.substring(0, 1) != saida) {
        src.value += texto.substring(0, 1);
    }
}

function somenteNumerosCPF(obj, e) {
    var tecla = (window.event) ? e.keyCode : e.which;
    if (tecla == 8 || tecla == 0)
        return true;
    if (tecla != 45 && tecla != 46 && tecla < 48 || tecla > 57)
        return false;
}

$(document).ready(function() {

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
        $("#ibge").val("");
    }

    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#rua").val("...");
                $("#bairro").val("...");
                $("#cidade").val("...");
                $("#uf").val("...");
                $("#ibge").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
                        $("#ibge").val(dados.ibge);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });
});

$(document).ready(function(){
    document.getElementById("campos-endereco").style.display = 'none';
});

function AbrirEndereco(el) {
    var display = document.getElementById(el).style.display;
    if(display == "none")
        document.getElementById(el).style.display = 'flex';
    else
        document.getElementById(el).style.display = 'none';
}


function validarSenha() {

   var validarSenha = document.getElementById("senhaPegarClass").className;

    if (validarSenha == "is-invalid form-control") {
        document.getElementById("senhaPegarClass").className = 'is-valid form-control';
    }
}



function validarSenhaErepeteSenha() {

    var senha =  document.getElementById("senhaPegarClass").value;
    var Repsenha =  document.getElementById("rep_senha").value;

    if(senha == Repsenha){
        document.getElementById("rep_senha").className = 'is-valid form-control'
    }else{
        document.getElementById("rep_senha").className = 'is-invalid form-control'

    }

}

function validarEmail() {

    var validarEmail = document.getElementById("email").className;

    if (validarEmail == "is-invalid form-control") {
        document.getElementById("email").className = 'is-valid form-control';
    }
}



