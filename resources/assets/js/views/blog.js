$(document).ready(function () {
    $('.arrow-floating').click(function (node) {
        $('.container-signin-signout').slideToggle();
        $('.section-sigin-sigout .arrow-floating .arrow-toggle-line').toggleClass('open');

    })
});

