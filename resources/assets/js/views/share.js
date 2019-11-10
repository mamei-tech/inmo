$(document).ready(function () {

    // populating the mail text area
    $('textarea#mail_textarea').val('\n\r'+window.location.href);
    $('input#mail_input').val('');
    $('input#mail_subject').val('');

    let popupSize = {
        width: 780,
        height: 550
    };


    $(document).on('click', '.social-media a.social-media-link', function (e) {

        let
            verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
            horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

        let popup = window.open($(this).prop('href'), 'social',
            'width=' + popupSize.width + ',height=' + popupSize.height +
            ',left=' + verticalPos + ',top=' + horisontalPos +
            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            e.preventDefault();
        }

    });

    $(document).on('click', '.social-media a.social-media-mail', function (e) {
        $('input#mail_subject').val($('h1.blog-section-3').html());
        $("div#sharebymail_modal").modal('show')
    });

    $(document).on('click', 'button#mail_btnSend', function (e) {

        let $form = $('form#form-send-mail');
        let $mail = $('input#mail_input');
        let pattern = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

        if (pattern.test($mail.val()) && $('textarea#mail_textarea').val().length > 0)
        {
            $form.attr('action', 'mailto:'+$mail.val());
            $form.submit();

            $('button#mail_btnCancel').click();
        }
        else
        {
            $mail.focus();
            alert('email error');
        }
    });

    $(document).on('hidden.bs.modal', 'div#sharebymail_modal', function (e) {
        $('input#mail_input').val('');
        $('input#mail_subject').val('');
        $('textarea#mail_textarea').val('\n\r'+window.location.href);
        $('form#form-send-mail').attr('action', 'mailto:');
    });

    // TODO Iconos, animacion de los botones


});
