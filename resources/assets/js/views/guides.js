$(document).ready(function () {
    $('.box').click(function (e) {
        $(e.currentTarget).children().toggleClass('check');
    });

    $('#form-send-email').submit(function (e) {
        e.preventDefault();
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
                _token: window._token,
                guides : guideSelected(),
                email: $('#form-send-email [name=email]').val()
            },
            success: function (r, s, o) {
                if (r.success){
                    $('#form-send-email')[0].reset();
                    alertify.log(r.message);
                }
                else
                    alertify.error(r.message);
            },
            error: function () {

            }
        });
    }
}