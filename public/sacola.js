
//floate action buttom
const emensBtns = document.querySelectorAll(".fixed-action-btn");
const floatingBtn = M.FloatingActionButton.init(emensBtns, {
    direction: "top"
});
//floate action buttom

//validação do formulario sacola
$("#form").validate({
    rules: {
        matricula: {
            required: true,
            number: true,
            minlength: 9,
            maxlength: 9
        },
        sacola: {
            required: true,
            number: true,
            max: 100
        },
        cgender:"required",
		cagree:"required",
    },
    //mesnsagens de erro
    messages: {
        matricula:{
            required: "Ops, você esqueceu de digitar a matricula",
            maxlength: "Ops, matricula so possui 6 digitos",
            minlength: "Ops, acho que esqueceu algum número",
            number: "Ops, acho que você digitou uma letra ai"
        },
        sacola:{
        	max: "Ops, o maximo são 100 sacolas",
        	number: "Ops, acho que você digitou uma letra ai"
        },
        curl: "Enter your website",
    },
    errorElement : 'div',
    //define onde sera mostrada a mensagem de erro
    errorPlacement: function(error, element) {
        console.log('valido');
    	var placement = $(element).data('error');
    	if (placement) {
       		$(placement).append(error)
    	} else {
        	error.insertAfter(element);
     	}
    },
    //função que abre a modal de confirmação (modal2)
    submitHandler: function(form) {
            $('#modal2').modal();
            $('#modal2').modal('open');
            $('#modal2').css({"width" : "573px","border-radius" : "18px"});
    }
 });

 //validação formulario adionar operador
 $("#form2").validate({
    rules: {
        matricula2: {
            required: true,
            number: true,
            minlength: 9,
            maxlength: 9
        },
        nome: {
            required: true,
            number: false,
        },
        cgender:"required",
		cagree:"required",
    },
    //mesnsagens de erro
    messages: {
        matricula2:{
            required: "Ops, você esqueceu de digitar a matricula",
            maxlength: "Ops, matricula so possui 6 digitos",
            minlength: "Ops, acho que esqueceu algum número",
            number: "Ops, acho que você digitou uma letra ai"
        },
        nome:{
            required: "Ops, você esqueceu de digitar o nome",
        	number: "Ops, acho que você digitou um numero ai"
        },
        curl: "Enter your website",
    },
    errorElement : 'div',
    //define onde sera mostrada a mensagem de erro
    errorPlacement: function(error, element) {
        console.log('valido');
    	var placement = $(element).data('error');
    	if (placement) {
       		$(placement).append(error)
    	} else {
        	error.insertAfter(element);
     	}
    }
 });

//abre a modal para adicionar operador (modal1)
 $(document).ready(function(){
    $('.modal').modal();
  });
//ao clicar en cancelar cancela o submit
  function cancelaEnvio(){
    $('#form2').submit(function (e) {
        e.preventDefault();
        window.location.replace = "http://10.127.236.100:8080/sacola/public/"

    });
  };
//ao clicar em cancelar, cancela o submit
  function cancelaEnvio2(){
    $('#form').submit(function (e) {
        e.preventDefault();
        window.location.replace = "http://10.127.236.100:8080/sacola/public/"
    });
  };
//coloca o valor 1 no campo operação
function retirada(){
    $("#operacao").val('1');
};
//coloca o valor 0 no campo operação
function devolucao(){
    $("#operacao").val('0');
};

//envia o formulario
function enviarForm(){
    document.getElementById("form").submit();
};

$(".dropdown-trigger").dropdown();

function printDiv() {
    var printContents = document.getElementById('retirar').innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;

}
