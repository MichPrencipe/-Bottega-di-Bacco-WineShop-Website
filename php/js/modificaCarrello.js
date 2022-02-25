$(document).ready(function() {
    var numrighe = $('div#numrighe').attr('name');
    var numrows = parseInt(numrighe);
    for (let i = 0; i < numrows; i++) {
        $('form[name="modifica' + i + ']').submit(function(e) {
            e.preventDefault();
            const form = $(this);
            const url = form.attr("action");
            const metodo = form.attr("method");
            const idProdotto = $("[name='idProdotto']").val();
            const quantita = $("input[type='number']").val();
            const action = "modifica";
            const dati_form = { "idProdotto": idProdotto, "quantity": quantita, "action": action };
            const thisButton = $(this);
            $.ajax({
                url: url,
                type: metodo,
                data: dati_form,
                success: function(response) {
                    thisButton.blur();
                    const jsonData = JSON.parse(response);
                    $("#badge-carrello").text(jsonData["numProdotti"]);
                    $("#subtotale").text(jsonData["subtotale"] + " €");
                }
            });
        });
    }


    $("form.rimuovi").submit(function(event) {
        event.preventDefault();
        const url = $(this).attr("action");
        const metodo = $(this).attr("method");
        const idProdotto = $(this).children("[name='idProdotto']").val();
        const quantita = $(this).siblings("[type='number']").val();
        const action = "rimuovi";
        const dati_form = { "idProdotto": idProdotto, "action": action };
        const button = $(this).children(":submit");
        const rigaCarrello = $(this).parents(".riga-carrello");
        const hr = $(this).next();
        $.ajax({
            url: url,
            type: metodo,
            data: dati_form,
            success: function(response) {
                button.blur();
                const jsonData = JSON.parse(response);
                $("#badge-carrello").text(jsonData["numProdotti"]);
                $("#subtotale").text(jsonData["subtotale"] + " €");
                hr.remove();
                rigaCarrello.fadeOut("slow");
                if (jsonData["numProdotti"] == null) {
                    window.location.replace("index.php");
                }
            }
        });
    });
});