$(document).ready(function(){
    $("#section-menu").addClass("mbr-navbar--absolute");

    var isDown = false;
    var oldScrooll = $(window).scrollTop();
    var scrollTop = $(window).scrollTop();
    var limitedSection1 = 1;

    $('.mbr-navbar--sticky').each(function(){
        var method = scrollTop >= limitedSection1 ? 'addClass' : 'removeClass';
        $(this)[method]('mbr-navbar--stuck')
            .not('.mbr-navbar--open')[method]('mbr-navbar--short');
    });

    $(window).scroll(function(){
        limitedSection1 = 1;
        scrollTop = $(window).scrollTop();

        if (oldScrooll < scrollTop) {
            isDown = true;
            //Falta esto

        }
        //Si va para arriba
        else
        {
            isDown = false;
            if (scrollTop < limitedSection1) {
                $('.mbr-navbar--sticky').each(function(){
                    var method = 'removeClass';
                    $(this)[method]('mbr-navbar--stuck')
                        .not('.mbr-navbar--open')[method]('mbr-navbar--short');
                });
            }
        }

        oldScrooll =  scrollTop;
    });
});



$(document).ready(function(){
    $("#section-menu").addClass("mbr-navbar--absolute");

    var marginRightAuto = $(".container").css('margin-right');
    var marginLeftAuto = $(".container").css('margin-left');

    $(".edupaddingslider").css('padding-right', marginRightAuto);
    $(".edupaddingsliderleft").css('padding-left', marginLeftAuto);

    // .mbr-navbar--sticky
    var completedMove = true;
    var isDown = false;
    var oldScrooll = $(window).scrollTop();
    var doNothing = false;
    var scrollTop = $(window).scrollTop();
    var limitedSection1 = $('#section-1').offset() == undefined ? 0 : $('#section-1').offset().top - 64;

    $('.mbr-navbar--sticky').each(function(){
        var method = scrollTop >= limitedSection1 ? 'addClass' : 'removeClass';
        $(this)[method]('mbr-navbar--stuck')
            .not('.mbr-navbar--open')[method]('mbr-navbar--short');
    });

    $(window).smartresize(function(){
        var marginRightAuto = $(".container").css('margin-right');
        var marginLeftAuto = $(".container").css('margin-left');

        $(".edupaddingslider").css('padding-right', marginRightAuto);
        $(".edupaddingsliderleft").css('padding-left', marginLeftAuto);
        $(window).scroll();

        // var heightRow = $('.row-calc-edu').css('height');
        // $('.col-calc-edu').css('height', heightRow);

        // $('.btn-index-section-features').addClass('last');
    });

    $(window).scroll(function(){
        limitedSection1 = $('#section-1').offset() == undefined ? 0 :$('#section-1').offset().top - 64;
        scrollTop = $(window).scrollTop();

        if (completedMove == true) {
            //Si va para abajo el scroll
            if (oldScrooll < scrollTop) {
                isDown = true;
                //Si esta x debajo del limite muevo el scroll a la section
                if (scrollTop < limitedSection1) {
                    completedMove = false;
                    doNothing = false;
                    $('.mbr-navbar--sticky').each(function(){
                        var method = 'addClass';
                        $(this)[method]('mbr-navbar--stuck')
                            .not('.mbr-navbar--open')[method]('mbr-navbar--short');
                    });
                    $("#moveToDown").click();
                }
                else{
                    doNothing = true;
                }
            }
            //Si va para arriba
            else
            {
                isDown = false;
                //Si esta x debajo del limite muevo el scroll al inicio
                if (scrollTop < limitedSection1) {
                    completedMove = false;
                    doNothing = false;
                    $('.mbr-navbar--sticky').each(function(){
                        var method = 'removeClass';
                        $(this)[method]('mbr-navbar--stuck')
                            .not('.mbr-navbar--open')[method]('mbr-navbar--short');
                    });
                    $("#moveToUp").click();
                }
                else{
                    doNothing = true;
                }
            }
        }
        else{
            if (!doNothing) {
                if (isDown) {
                    if (scrollTop >= limitedSection1) {
                        completedMove = true;
                    }
                }
                else{
                    if (scrollTop <= 0) {
                        completedMove = true;
                    }
                }
            }
        }

        oldScrooll =  scrollTop;
    });
});