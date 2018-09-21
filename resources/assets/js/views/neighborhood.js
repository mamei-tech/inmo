$(document).ready(function () {
    $('.arrow-floating').click(function (node) {
        if ($(node.currentTarget).hasClass('light-block')) {
            let hasClass = $('.arrow-floating.light-block .arrow-toggle-line').toggleClass('open').hasClass('open');
            if (hasClass)
                $('.container-open-ligh-gray').slideDown();
            else
                $('.container-open-ligh-gray').slideUp();
        }
        else{
            let hasClass = $('.arrow-floating.dark-block .arrow-toggle-line').toggleClass('open').hasClass('open');
            if (hasClass)
                $('.container-open-dark-gray').slideDown();
            else
                $('.container-open-dark-gray').slideUp();
        }
    })
});