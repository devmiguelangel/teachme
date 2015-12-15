$(document).ready(function() {
    $.notifyDefaults({
        type: 'success',
        allow_dismiss: false,
        delay: 5000,
        timer: 1000,
        placement: {
            from: "top",
            align: "center"
        },
        animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
        }
    });

    $('.btn-vote').click(function(e) {
        e.preventDefault();

        var ticket = $(this).closest('.ticket');

        var vote   = $(this).data('vote');
        var id     = $(this).data('id');
        var form   = null;
        var button = '';

        if (vote == 1) {
            form   = $('#form-vote');
            button = '.unvote';
        } else if (vote == 0) {
            form = $('#form-unvote');
            button = '.vote';
        }

        var action = form.prop('action');
        action     = action.replace(':id', id);

        $(this).addClass('hide');

        $.post(action, $(form).serialize(), function(response) {
            $(ticket).find(button).removeClass('hide');

            var votes = response.votes;
            votes     += votes == 1 ? ' voto' : ' votos';

            $(ticket).find('.votes-count').html(votes);

            $.notify({
                message: 'Gracias por tu voto'
            });

        }).fail(function() {
            $(this).removeClass('hide');

            $.notify({
                message: 'Oops a ocurrido un error :('
            }, {
                type: 'danger'
            });
        });

    });
});
