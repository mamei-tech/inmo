var pageActive = 0;
$(document).ready(function () {
    $('.box').click(function (e) {
        $(e.currentTarget).children().toggleClass('check');
    });

    $('#form-send-email').submit(function (e) {
        e.preventDefault();
    });

    $('#form-add-subcriptor').submit(function (e) {
        e.preventDefault();
    });

    $('#btn-add-subcriptor').click(function(){
        addSubcriptor();
    });

    $('.btn-download-guide').click(function(e){
        downloadGuide(e.currentTarget);
    });

    $('.text-previous').html(window.messages.previous);
    $('.text-next').html(window.messages.next);
    // nextPage();
});

function nextPage(){
    var total = $('.total-guides').html() * 1;
    if (pageActive + 1 > total){
        return;
    }

    var guides = $('#container-guides').children();
    var limit = (pageActive + 1) * 4;
    var start = pageActive * 4;

    $.each(guides, function(i,o){
        if (i >= start && i < limit){
            $(o).css('display', 'flex');
        }
        else{
            $(o).css('display', 'none');
        }
    })

    pageActive++;
    $('.page-active').html(pageActive);
}
function previousPage(){

    if (pageActive == 1){
        return;
    }

    pageActive--;
    var guides = $('#container-guides').children();
    var start = (pageActive - 1) * 4;
    var limit = (pageActive) * 4;

    $.each(guides, function(i,o){
        if (i >= start && i < limit){
            $(o).css('display', 'flex');
        }
        else{
            $(o).css('display', 'none');
        }
    })

    $('.page-active').html(pageActive);
}

function downloadGuide(obj) {
    var guide = obj.id.split('-')[1];
    var validate = $('#form-send-email')[0].reportValidity();
    if (validate)
    {
        $.ajax({
            type: "post",
            url: urlSendEmail,
            data: {
                _token: window._token,
                guide : guide,
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
function addSubcriptor() {
    var validate = $('#form-add-subcriptor')[0].reportValidity();
    if (validate)
    {
        $.ajax({
            type: "post",
            url: urlAddSubcriptor,
            data: {
                _token: window._token,
                email: $('#form-add-subcriptor [name=email-suscribe]').val()
            },
            success: function (r, s, o) {
                if (r.success){
                    $('#form-add-subcriptor')[0].reset();
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
