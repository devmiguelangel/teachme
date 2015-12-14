$(document).ready(function() {
    $('.vote').click(function(e) {
        e.preventDefault();

        var vote   = $(this).data('vote');
        var id     = $(this).data('id');
        var form   = null;
        var button = '#';

        if (vote == 1) {
            form   = $('#form-vote');
            button = '#unvote-';
        } else if (vote == 0) {
            form = $('#form-unvote');
            button = '#vote-';
        }

        button += id;

        var action = form.prop('action');
        action     = action.replace(':id', id);

        $(this).addClass('hide');

        $.post(action, $(form).serialize(), function(response) {
            console.log($(this).closest(button));
            $(button).removeClass('hide');

        }).fail(function() {
            $(this).removeClass('hide');

            console.log('Error');
        });

    });
});
