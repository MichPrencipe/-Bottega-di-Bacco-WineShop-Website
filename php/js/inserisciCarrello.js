$(document).ready(function() {
    $("form.carrello").submit(function(e) {
        e.preventDefault();
        const url = $(this).attr("action");
        const metodo = $(this).attr("method");
        const dati_form = $(this).serialize();
        const submit = $(this).find(":submit");
        const divInfo = $(this).find(".info");
        $.ajax({
            url: url,
            type: metodo,
            data: dati_form,
            success: function(response) {
                const jsonData = JSON.parse(response);
                $("#badge-carrello").text(jsonData["numProdottiCarrello"]);
                submit.blur();
            }
        });
    });
});