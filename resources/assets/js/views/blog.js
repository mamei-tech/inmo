let tagaux = 0;

$(document).ready(function () {

    $('.arrow-floating').click(function (node) {

        if(!tagaux)
        {
            $('div#si').slideToggle();
            $('div#si').toggleClass('open');

            tagaux = 1;
        }
        else
        {
            $('.container-signin-signout').slideUp();
            $('.section-sigin-sigout .arrow-floating .arrow-toggle-line').removeClass('open');

            tagaux = 0;
        }
    });

    // Events Handles

    $('form#frm-singup h3.changecontext').click(function (e) {

        $('div#su').hide();
        if ($('div#su').hasClass('open')) $('div#su').removeClass('open');

        $('div#si').show();
        $('div#si').addClass('open');

    });

    $('form#frm-singin h3.changecontext').click(function (e) {

        $('div#su').show();
        $('div#su').addClass('open');

        $('div#si').hide();
        $('div#si').removeClass('open');

    });

});

