define('validator', [], function () {

	$("#contactForm").validate({
		errorElement: 'div',
		rules: {
      name:{
        required: true
      },
      email:{
        required: true,
        email: true
      },
      question:{
        required: true
      }
  	},

		messages: {
      name:{
        required: "Proszę się przedstawić"
      },
			email:{
				required: "Proszę podać adres e-mail",
				email: "Podany format jest nieprawidłowy"
			},
      question:{
        required: "Proszę podać treść pytania"
      }
    }
  });

  $("#form--contact").validate({
    errorElement: 'div',
    rules: {
      name:{
        required: true
      },
      email:{
        required: true,
        email: true
      },
      message:{
        required: true
      }
    },

    messages: {
      name:{
        required: "Proszę się przedstawić"
      },
      email:{
        required: "Proszę podać adres e-mail",
        email: "Podany format jest nieprawidłowy"
      },
      message:{
        required: "Proszę podać treść pytania"
      }
    }
  });


  $.validator.addMethod('checkUsername', function(value, element) {
    return this.optional(element) || /^[0-9-+_ ]+$/g.test(value);
  }, "np. 500 600 700");


});




