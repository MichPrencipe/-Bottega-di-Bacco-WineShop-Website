$(document).ready(function() {
    $('#immagine , #nuovoImmagine').on('change', function() {
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        fileName = $(this).val().replace('C:\\fakepath\\', " ");
        $(this).next('.custom-file-label').html(fileName);
    })
});