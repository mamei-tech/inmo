let tagaux = 0;

$(document).ready(function () {

    // Handle direct url to register
    if ($('input#dr').val()*1 === 1)
    {
        $('div#su').show();
        $('div#su').addClass('open');

        $('div#si').hide();
        $('div#si').removeClass('open');
    }

    // Open form section when error
    if($('span.invalid-feedback').length !== 0)
    {
        $('div#si').show();
        $('div#si').addClass('open');

        $('div#su').hide();
        $('div#su').removeClass('open');
    }

    // Events Handles
    $('.section-sigin-sigout-text').click(function (node) {
        if(!tagaux)
        {
            $('div#si').slideToggle();
            $('div#si').toggleClass('open');
            $('.section-sigin-sigout .section-sigin-sigout-text .arrow-toggle-line').toggleClass('open');

            tagaux = 1;
        }
        else
        {
            $('.container-signin-signout').slideUp();
            $('.section-sigin-sigout .section-sigin-sigout-text .arrow-toggle-line').removeClass('open');

            tagaux = 0;
        }

        // Cleaning forms inputs
        $('div#su input:visible').val('');
        $('div#si input:visible').val('');

        // Hiding invalid feedback
        $('span.invalid-feedback').hide();
    });

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
