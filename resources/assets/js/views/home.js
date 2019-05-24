$(document).ready(function(){
    function setPormotionImage(){
        var widht = window.innerWidth;
        $(".promotion-background").each(function (i,e) {
            if (widht > 1249){
                e.style.backgroundImage = "url("+e.dataset.imageLg+")";
            }
            else if (widht > 960){
                e.style.backgroundImage = "url("+e.dataset.imageMd+")";
            }
            else {
                e.style.backgroundImage = "url("+e.dataset.imageSm+")";
            }
        })
    };

    function setSliderImage(){
        var widht = window.innerWidth;

        $(".slide-item").each(function (i,e) {
            if (widht > 1249){
                e.style.backgroundImage = "url("+e.dataset.imageLg+")";
            }
            else if (widht > 960){
                e.style.backgroundImage = "url("+e.dataset.imageMd+")";
            }
            else {
                e.style.backgroundImage = "url("+e.dataset.imageSm+")";
            }
        })
    };



    $(window).resize(function(){
        setPormotionImage();
        setSliderImage();
    });

    setPormotionImage();
    setSliderImage();
})


$(".container-widget-idx").hide();

function test2(){
    $("#IDX-quicksearchForm-15691").attr('action','http:'+$("#IDX-quicksearchForm-15691").attr('action'));
    $("#IDX-quicksearchForm-15691").prepend($("#IDX-qsCityListWrap-15691"))
    $("#IDX-qsPtWrap-15691").addClass("col-sm-6");
    $("#IDX-qsCityListWrap-15691").addClass("col-sm-6");
    $("#IDX-qsMinPriceWrap-15691").addClass("col-sm-3");
    $("#IDX-qsMaxPriceWrap-15691").addClass("col-sm-3");
    $("#IDX-qsMinBedWrap-15691").addClass("col-sm-3");
    $("#IDX-qsMinBathWrap-15691").addClass("col-sm-3");

    $("#IDX-quicksearchForm-15691 input").addClass("form-control");
    $("#IDX-quicksearchForm-15691 select").addClass("form-control");

    $("#IDX-qsMinPrice-15691").attr("placeholder","min price");
    $("#IDX-qsMaxPrice-15691").attr("placeholder","max price");
    $("#IDX-qsMinBed-15691").attr("placeholder","beds");
    $("#IDX-qsMinBath-15691").attr("placeholder","baths");

    $("#IDX-qsSubmit-15691").removeClass("form-control").addClass("btn btn-white");

    $("#IDX-quicksearchForm-15691").addClass("row");

    $("#IDX-qsSubmitWrap-15691").prepend('<a href="http://jehidalgorealestate.idxbroker.com/idx/map/mapsearch" class="btn btn-white">MAP SEARCH</a>');
    $("#IDX-qsSubmitWrap-15691").prepend('<a href="http://jehidalgorealestate.idxbroker.com/idx/search/advanced" class="btn btn-white">ADVANCED SEARCH</a>');

    $(".container-widget-idx").show();
}
var test = function () {
    if (window.idx && window.idx.fn) {
        test2();
    } else {
        setTimeout(function() {
            test();
        }, 500);
    }
};
test();