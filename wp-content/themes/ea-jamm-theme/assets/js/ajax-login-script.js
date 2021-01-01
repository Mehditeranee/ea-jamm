jQuery(document).ready(function($) {

    // Perform AJAX login on form submit
    $('form#login_form').on('submit', function(e){
     console.log("IN JQUERY");

     if(!$('form#login_form #username').val() && !$('form#login_form #password').val())
     {
        e.preventDefault();
        $('form#login_form p.status_pseudo').text("Veuillez vérifier que votre Nom d'utilisateur est correcte");
        $('form#login_form p.status_password').text("Votre mot de passe doit contenir 8 caractères minimum");

     }
     else if(!$('form#login_form #username').val()){
        e.preventDefault();
        $('form#login_form p.status_password').text("");
        $('form#login_form p.status_pseudo').text("Veuillez vérifier que votre Nom d'utilisateur est correcte");
     }
     else if (!$('form#login_form #password').val()){
        e.preventDefault();
        $('form#login_form p.status_pseudo').text("");
        $('form#login_form p.status_password').text("Votre mot de passe doit contenir 8 caractères minimum");
     }
     else
     {
        $('form#login_form p.status_password').text("");
        $('form#login_form p.status_pseudo').text("");
        $('form#login_form p.status').show().text(ajax_login_object.loadingmessage);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_login_object.ajaxurl,
            dataType: 'json',
                //contentType: 'json',
                data: { 
                    'action': 'ajaxlogin', //calls wp_ajax_nopriv_ajaxlogin
                    'username': $('form#login_form #username').val(), 
                    'password': $('form#login_form #password').val(), 
                    'security': $('form#login_form #security').val() },
                    success: function(data){
                        
                        if (data.loggedin == true){
                            $('form#login_form p.status').css('color', 'black');
                            $('form#login_form p.status').text(data.message);
                            document.location.href = ajax_login_object.redirecturl;
                            console.log("in success");
                        }else
                        {
                            $('form#login_form p.status').css('color', 'rgb(232, 93, 74)');
                            $('form#login_form p.status').text(data.message);
                        }
                    },
                    error: function(data){
                        $('form#login_form p.status').text(data.message);

                    }
            });
            e.preventDefault();
        }
    });


    // Perform AJAX forget password on form submit
    $('form#lostPasswordForm').on('submit', function(e){

        if(!$('input#username').val())
         {
            e.preventDefault();
            $('form p.status_pseudo').text("Veuillez vérifier que votre e-mail (ou nom d'utilisateur) est correcte");
         }
         else
        {

            if (!$(this).valid()) return false;
            $('p.status', this).show().text(ajax_login_object.loadingmessage);
            ctrl = $(this);
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: ajax_login_object.ajaxurl,
                data: { 
                    'action': 'ajaxforgotpassword', 
                    'user_login': $('input#username').val(), 
                    'security': $('#forgotsecurity').val(), 
                },
                success: function(data){  
                    console.log(data);
                    document.body.innerHTML = document.body.innerHTML.replace('Quel est votre nom d\'utilisateur ou adresse mail ?', 'Merci');
                    $('p.login_suggest_registration').html('Si votre compte est associé à cette adresse e-mail, vous recevrez un message contenant votre nouveau mot de passe. </br> <a href="'+ajax_login_object.connexion+'">← Revenir sur la page de connexion</a>');
                    $("#lostPasswordForm").remove();
               }
            });
            e.preventDefault();
            return false;
        }
    });
     
        // Client side form validation
        if($('#lostPasswordForm').length)
            $('#lostPasswordForm').validate();
        

        var value = $("#password").val();

        $.validator.addMethod("checklower", function(value) {
          return /[a-z]/.test(value);
      });
        $.validator.addMethod("checkupper", function(value) {
          return /[A-Z]/.test(value);
      });
        $.validator.addMethod("checkdigit", function(value) {
          return /[0-9]/.test(value);
      });

        $.validator.addMethod("pwcheckspechars", function (value) {
            return /[!@#$%^&*()_=\[\]{};':"\\|,.<>\/?+-]/.test(value)
        });

    $('form#register_form').on('submit', function (e) {
        e.preventDefault();
    }).validate({
        // Specify validation rules
        rules: 
        {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            firstname: "required",
            lastname: "required",
            username: {
                required: true,
                maxlength: 15
            },
            email: {
                required: true,
                // Specify that email should be validated
                // by the built-in "email" rule
                email: true
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 30,
                //pwcheck: true,
                pwcheckspechars: true,
                checklower: true,
                checkupper: true,
                checkdigit: true
            }
        },
            // Specify validation error messages
        messages: {
            firstname: "Merci de renseigner votre prénom",
            lastname: "Merci de renseigner votre nom",
            username:{
                required: "Merci de renseigner votre Nom d'utilisateur",
                maxlength: "Votre nom d'utilisateur ne doit pas dépasser 15 caractères.",
                remote: "Ce nom d'utilisateur est pris. Choisissez-en un autre."
            },
            password: {
                required: "Veuillez fournir un mot de passe",
                minlength: "Votre mot de passe doit comporter au moins 8 caractères",
                //pwcheck: "Password is not strong enough",
                pwcheckspechars: "Nécessite au moins 1 caractère spécial",
                checklower: "Nécessite au moins 1 minuscule",
                checkupper: "Nécessite au moins 1 majuscule",
                checkdigit: "Nécessite au moins 1 chiffre"
            },
            email: "Merci de renseigner une adresse mail valide"
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form,event) {
           // Perform AJAX login/register on form submit
           // $('form#register_form').on('submit', function (e) {
                $('p.status', form).show().text(ajax_login_object.loadingmessage);
                if (!$(form).valid()) return false;
                action = 'ajaxregister';
                firstname = $('#firstname').val();
                lastname = $('#lastname').val();
                username = $('#username').val();
                password = $('#password').val();
                email = $('#email').val();
                security = $('#signonsecurity').val();    
                ctrl = $(form);
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: ajax_login_object.ajaxurl,
                    data: {
                        'action': action,
                        'firstname':firstname,
                        'lastname':lastname,
                        'username': username,
                        'password': password,
                        'email': email,
                        'security': security
                    },
                    success: function (data) {
                        console.log("IN SUCCESS");

                        
                        if (data.loggedin == true) {
                            $('form#login_form p.status').css('color', 'black');
                            document.location.href = ajax_login_object.redirecturl;
                        }
                        else
                        {
                            $('form#login_form p.status').css('color', 'rgb(232, 93, 74)');
                            $('p.status', ctrl).text(data.message);
                        }
                    }
                });
                 event.preventDefault();
        //   });
        }
    });

   
});
