 $('document').ready(function(){

			$('#contact_us').validate({
                    rules:{
                        "name":{
                            required:true,
                            maxlength:40
                        },

                        "email":{
                            required:true,
                            email:true,
                            maxlength:100
                        },

                        "message":{
                            required:true
                        }},

                    messages:{
                        "name":{
                            required:"This field is required"
                        },

                        "email":{
                            required:"This field is required",
                            email:"Please enter a valid email address"
                        },

                        "message":{
                            required:"This field is required"
                        }},

                    submitHandler: function(form){
                      $(form).ajaxSubmit({
        target: '#preview', 
        success: function() { 
        $('#formbox').slideUp('fast'); 
        } 
    }); 
			
                    }
                
            })
						
        });