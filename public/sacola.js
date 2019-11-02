
//floate action buttom
const emensBtns = document.querySelectorAll(".fixed-action-btn");
const floatingBtn = M.FloatingActionButton.init(emensBtns, {
    direction: "top"
});
//floate action buttom

$("#form").validate({
    rules: {
        matricula: {
            required: true,
            number: true,
            minlength: 6,
            maxlength: 6
        },
        sacola: {
            required: true,
            number: true,
            min: 20,
            max: 100
        },
        cgender:"required",
		cagree:"required",
    },
    //For custom messages
    messages: {
        matricula:{
            required: "Ops, você esqueceu de digitar a matricula",
            maxlength: "Ops, matricula so possui 6 digitos",
            minlength: "Ops, acho que esqueceu algum número",
            number: "Ops, acho que você digitou uma letra ai"
        },
        sacola:{
        	min: "Ops, o minimo são 20 sacolas",
        	max: "Ops, o maximo são 100 sacolas",
        	number: "Ops, acho que você digitou uma letra ai"
        },
        curl: "Enter your website",
    },
    errorElement : 'div',

    errorPlacement: function(error, element) {
    	var placement = $(element).data('error');
    	if (placement) {
       		$(placement).append(error)
    	} else {
        	error.insertAfter(element);
     	}
    }
 });
