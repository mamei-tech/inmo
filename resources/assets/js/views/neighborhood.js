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

    // $.ajax({ url: e, dataType: "script", type: 'GET' , async: false, success: function (r) { } });
    //
    // buildPaging: function (config){
    //     var target = $('#paging ul');
    //     if (!config.total) return;
    //     target.empty();
    //     var pagesToShow = 8;
    //     var totalPages = Math.ceil(config.total / 8);
    //     var currentPage = (config.page || 1) * 1;
    //
    //     if (totalPages == 1) return;
    //
    //     totalPages = totalPages > 20 ? 20 : totalPages;
    //     var x = currentPage > 5 ? -5 : 1 - currentPage;
    //
    //     if (currentPage > 1)
    //         target.append('<li class="pageNumber clickable" page="' + (currentPage - 1) + '"><a><b>Anterior</b></a></li>');
    //
    //     //Paginas anteriores
    //     while (x < 0 && pagesToShow > 0) {
    //         target.append('<li class="pageNumber clickable" page="' + (currentPage + x) + '"><a>' + (currentPage + x) + '</a></li>');
    //         x++;
    //         pagesToShow--;
    //     }
    //
    //     //Pagina actual
    //     target.append('<li class="pageNumber"><a><b>' + currentPage + '</b></a></li>');
    //     x++;
    //     pagesToShow--;
    //
    //     //Paginas siguientes
    //     while (currentPage + x <= totalPages && pagesToShow > 0) {
    //         target.append('<li class="pageNumber clickable" page="' + (currentPage + x) + '"><a>' + (currentPage + x) + '</a></li>');
    //         x++;
    //         pagesToShow--;
    //     }
    //
    //     if (currentPage < totalPages)
    //         target.append('<li class="pageNumber clickable" page="' + (currentPage + 1) + '"><a><b>Siguiente</b></a></li>');
    //
    //     var _that = this;
    //     $('.pageNumber.clickable').click(function () {
    //         _that.loadPage($(this).attr('page'));
    //     });
    // }
});