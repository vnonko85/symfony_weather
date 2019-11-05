$(function($) {
    $("form").submit(function(event) {
        event.preventDefault();
        let form = $(event.target);

        $.ajax({
            type: "POST",
            url: form.attr('action'),
            data: form.serialize(),
            success: function(response) {
                let body = $("#weather table tbody");
                body.html("");
                $.each(response, function(index, value) {
                    let row = $('<tr></tr>');

                    $.each(value, function(a,b) {
                        row.append($('<td></td>').text(b));
                    });

                    body.append(row);
                })
            },
            dataType: 'json'
        });
    });
});