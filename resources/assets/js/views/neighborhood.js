$(document).ready(function () {
    $('.arrow-floating').click(function (node) {
        if ($(node.currentTarget).hasClass('light-block')) {
            $('.container-open-ligh-gray').slideToggle();
            $('.arrow-floating.light-block .arrow-toggle-line').toggleClass('open');
        }
        else{
            $('.container-open-dark-gray').slideToggle();
            $('.arrow-floating.dark-block .arrow-toggle-line').toggleClass('open');
        }

        try {
            parallax();
        } catch (e) {
        }
    })
});