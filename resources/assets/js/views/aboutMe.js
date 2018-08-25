$(document).ready(function(){
    var marginRightAuto = $(".container").css('margin-right');
    var marginLeftAuto = $(".container").css('margin-left');
    $(".edupaddingslider").css('padding-right', marginRightAuto);
    $(".edupaddingsliderleft").css('padding-left', marginLeftAuto);


    $(window).smartresize(function(){
        var marginRightAuto = $(".container").css('margin-right');
        var marginLeftAuto = $(".container").css('margin-left');

        $(".edupaddingslider").css('padding-right', marginRightAuto);
        $(".edupaddingsliderleft").css('padding-left', marginLeftAuto);
        $(window).scroll();
    });

    $('.mbr-navbar--sticky').each(function(){
        var method = 'addClass';
        $(this)[method]('mbr-navbar--stuck')
            .not('.mbr-navbar--open')[method]('mbr-navbar--short');
    });
});
