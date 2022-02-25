const pattern = /^(?:[0-9]+[a-z]|[a-z]+[0-9])[a-z0-9]*$/i;

$(document).ready(function() {


    const input_username = $("input#username");
    const input_password = $("input#password");
    const input_confermaPassword = $("input#confermaPassword");

    $("form#loginForm").submit(function(e) {
        e.preventDefault();
        let isFormOk = true;

        input_username.next().remove();
        if (input_username.val().length < 5) {
            input_username.parent().append('<span class="alert alert-danger delay-alert p-0 mt-2" role="alert">Username deve essere almeno 5 caratteri</span>')
            isFormOk = false;
        }
        input_password.next().remove();
        if (input_password.val().length < 8 || !pattern.test(input_password.val())) {
            input_password.parent().append('<span class="alert alert-danger delay-alert p-0 mt-2" role="alert"> La password deve essere almeno 8 caratteri e contenere almeno un numero e una lettera</span>');

            isFormOk = false;
        }
        if (isFormOk) {
            e.currentTarget.submit();
        }
    });


    $("form#registrazione").submit(function(e) {
        e.preventDefault();
        let isFormOk = true;

        input_username.next().remove();
        if (input_username.val().length < 5) {
            input_username.parent().append('<div class="col-md-12 col-12 mt-2 px-0"><span class="alert alert-danger delay-alert p-0" role="alert"> Username deve essere almeno 5 caratteri</span></div>')
            isFormOk = false;
        }


        input_password.next().remove();
        if (input_password.val().length < 8 || !pattern.test(input_password.val())) {
            input_password.parent().append('<div class="col-md-12 col-12 mt-2 px-0"><span class="alert alert-danger delay-alert p-0" role="alert"> La password deve essere almeno 8 caratteri e contenere almeno un numero e una lettera</span></div>');
            isFormOk = false;
        }

        if (input_confermaPassword.val() != input_password.val()) {
            input_confermaPassword.next().remove();
            input_confermaPassword.parent().append('<div class="col-md-12 col-12 mt-2 px-0"><span class="alert alert-danger delay-alert p-0" role="alert">Errore! Le password non corrispondono</span></div>')
            isFormOk = false;
        }

        if (isFormOk) {
            e.currentTarget.submit();
        }
    });

    $("form#modifica").submit(function(e) {
        e.preventDefault();
        let isFormOk = true;

        input_username.next().remove();
        if (input_username.val().length < 5) {
            input_username.parent().append('<div class="col-md-12 col-12 mt-2 px-0"><span class="alert alert-danger delay-alert p-0" role="alert"> Username deve essere almeno 5 caratteri</span></div>')
            isFormOk = false;
        }


        input_password.next().remove();
        if (input_password.val().length < 8 || !pattern.test(input_password.val())) {
            input_password.parent().append('<div class="col-md-12 col-12 mt-2 px-0"><span class="alert alert-danger delay-alert p-0" role="alert"> La password deve essere almeno 8 caratteri e contenere almeno un numero e una lettera</span></div>');
            isFormOk = false;
        }

        if (input_confermaPassword.val() != input_password.val()) {
            input_confermaPassword.next().remove();
            input_confermaPassword.parent().append('<div class="col-md-12 col-12 mt-2 px-0"><span class="alert alert-danger delay-alert p-0" role="alert">Errore! Le password non corrispondono</span></div>')
            isFormOk = false;
        }

        if (isFormOk) {
            e.currentTarget.submit();
        }
    })
});