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