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

    $("#arrow-section-1").click(function(){
        if ($("#section-2").css("display") == "none") {
            $("#section-2").fadeIn();
            $("#arrow-section-1").removeClass("glyphicon-menu-down");
            $("#arrow-section-1").addClass("glyphicon-menu-up");
        }
        else{
            $("#section-2").fadeOut();
            $("#arrow-section-1").removeClass("glyphicon-menu-up");
            $("#arrow-section-1").addClass("glyphicon-menu-down");
        }
    });

    $("#arrow-section-3").click(function(){
        if ($("#section-4").css("display") == "none") {
            $("#section-4").fadeIn();
            $("#arrow-section-3").removeClass("glyphicon-menu-down");
            $("#arrow-section-3").addClass("glyphicon-menu-up");
        }
        else{
            $("#section-4").fadeOut();
            $("#arrow-section-3").removeClass("glyphicon-menu-up");
            $("#arrow-section-3").addClass("glyphicon-menu-down");
        }
    });

    $(".container-data-house").click(function(){
        // TODO Ver esto bien
        window.location = "house";
    });
});