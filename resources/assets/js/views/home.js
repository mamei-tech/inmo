$(document).ready(function(){
    function setPormotionImage(){
        var widht = window.innerWidth;
        document.querySelectorAll(".promotion-background").forEach(function (e) {
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

        document.querySelectorAll(".slide-item").forEach(function (e) {
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