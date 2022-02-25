$(document).ready(function() {
    const input_cvv = $('input#cc-cvv');
    const input_cc = $('input#cc-number');
    const input_cc_name = $('input#cc-name');
    const input_cc_data = $('div#cc-data');
    const input_cc_mese = $('input#cc-mese');
    const input_cc_anno = $('input#cc-anno');

    $("form#pagamento").submit(function(e) {
        e.preventDefault();
        let isFormOk = true;

        input_cvv.next().remove();
        if (input_cvv.val().length != 3) {
            input_cvv.parent().append('<div class="col-md-12 col-12 mt-2 px-0"><span class="alert alert-danger delay-alert p-0" role="alert">Sintassi non corretta</span></div>')
            isFormOk = false;
        }

        input_cc.next().remove();
        if (input_cc.val().length != 9) {
            input_cc.parent().append('<div class="col-md-12 col-12 mt-2 px-0"><span class="alert alert-danger delay-alert p-0" role="alert">Il numero della carta deve essere di 9 caratteri</span></div>')
            isFormOk = false;
        }

        input_cc_name.next().remove();
        if (input_cc_name.val().length < 6) {
            input_cc_name.parent().append('<div class="col-md-12 col-12 mt-2 px-0"><span class="alert alert-danger delay-alert p-0" role="alert">Il nome deve essere di almeno 6 caratteri</span></div>')
            isFormOk = false;
        }

        input_cc_data.next().remove();
        if (input_cc_anno.val().length != 2 && input_cc_mese.val().length != 2) {
            input_cc_data.parent().append('<div class="row mt-2"><span class="alert alert-danger delay-alert p-0" role="alert">Sintassi non corretta</span></div>')
            isFormOk = false;
        }


        if (isFormOk) {
            e.currentTarget.submit();
        }
    });
});