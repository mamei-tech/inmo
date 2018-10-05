$(document).ready(function () {
    $('.box').click(function (e) {
        $(e.currentTarget).children().toggleClass('check');
    })



});

function guideSelected(){
    var result = [];
    $('.guide-item .check').each(function (i, e) {
        result.push(e.id);
    });

    return result;
}