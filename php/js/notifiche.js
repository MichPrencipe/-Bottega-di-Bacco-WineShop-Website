$(document).ready(function() {
    $("div.dettaglio-notifica").hide();

    $(".visualizza-notifica").click(function() {
        $(this).children("i.fa-eye").toggleClass("fa-eye-slash");
        const dettaglio = $(this).parents("div.notifica-intestazione").siblings("div.dettaglio-notifica");
        if (dettaglio.is(":visible")) {
            dettaglio.hide();

        } else {
            dettaglio.show();
        }
    })

    $("form.visualizza").submit(function(event) {
        event.preventDefault();
        const url = $(this).attr("action");
        const metodo = $(this).attr("method");
        const dati_form = $(this).serialize();
        const submit = $(this).find(":submit");
        const badgeNotifica = $(this).parents(".notifica-intestazione").children(".badge-notifica");
        $.ajax({
            url: url,
            type: metodo,
            data: dati_form,
            success: function(response) {
                const jsonData = JSON.parse(response);
                if (jsonData["numNotifiche"] != 0) {
                    $("#badge-notifiche").text(jsonData["numNotifiche"]);
                } else {
                    $("#badge-notifiche").remove();
                }
                submit.blur();
                badgeNotifica.remove();
            }
        });
        $(this).children(":submit").attr("type", "button");
        $(this).siblings(".elimina").children(":submit").removeClass("d-none");
    });

    $("form.elimina").submit(function(event) {
        event.preventDefault();
        const url = $(this).attr("action");;
        const metodo = $(this).attr("method");
        const dati_form = $(this).serialize();
        $.ajax({
            url: url,
            type: metodo,
            data: dati_form
        });
        if ($(this).parents(".card-notifica").siblings().length == 0) {
            window.location.replace("notifiche.php");
        } else {
            $(this).parents(".card-notifica").fadeOut("slow");
        }
    });
});