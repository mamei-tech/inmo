$(document).ready(function () {

    var calcTextBio = function () {

        var caractersPorLinea = 29;

        var height = $('.bio').height();
        $('.bio > p').height(height);

        var columns = $('.bio > p').css('column-count');
        console.log(columns * 1);

        var text = $('#biography').text();
        var totalCaracteres = height / 20 * caractersPorLinea * columns * 1;

        var page1 = text.substring(0, totalCaracteres);

        $('.bio > p').text(page1);
        console.log(totalCaracteres);
    };



    $(window).resize(function () {
        calcTextBio();
    })

    calcTextBio();
});
