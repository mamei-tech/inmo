$(document).ready(function () {
    $('.box').click(function (e) {
        $(e.currentTarget).children().toggleClass('check');
    })


});

function guideSelected() {
    var result = [];
    $('.guide-item .check').each(function (i, e) {
        result.push(e.id);
    });

    return result;
}

function downloadGuide() {
    var validate = $('#form-send-email')[0].reportValidity();
    if (validate)
    {
        $.ajax({
            type: "post",
            url: urlSendEmail,
            data: {
                guides : guideSelected(),
            },
            success: function (r, s, o) {
                if (r.success){
                    console.log(r)
                    $('#form-send-email')[0].reset();
                }
            },
            error: function () {

            }
        });
    }


}