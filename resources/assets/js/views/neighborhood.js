$(document).ready(function () {
    $('.arrow-floating').click(function (node) {
        if ($(node.currentTarget).hasClass('light-block')) {
            let hasClass = $('.arrow-floating.light-block .arrow-toggle-line').toggleClass('open').hasClass('open');
            if (hasClass)
                $('.container-open-ligh-gray').fadeIn();
            else
                $('.container-open-ligh-gray').fadeOut();
        }
        else{
            let hasClass = $('.arrow-floating.dark-block .arrow-toggle-line').toggleClass('open').hasClass('open');
            if (hasClass)
                $('.container-open-dark-gray').fadeIn();
            else
                $('.container-open-dark-gray').fadeOut();
        }


    })
});