$(document).ready(function(){
    $("#section-menu").addClass("mbr-navbar--absolute");


//     var isDown = false;
//     var oldScrooll = $(window).scrollTop();
//     var scrollTop = $(window).scrollTop();
//     var limitedSection1 = 1;
//
//     $('.mbr-navbar--sticky').each(function(){
//         var method = scrollTop >= limitedSection1 ? 'addClass' : 'removeClass';
//         $(this)[method]('mbr-navbar--stuck')
//             .not('.mbr-navbar--open')[method]('mbr-navbar--short');
//     });
//
//     $(window).scroll(function(){
//         limitedSection1 = 1;
//         scrollTop = $(window).scrollTop();
//
//         if (oldScrooll < scrollTop) {
//             isDown = true;
//             //Falta esto
//         }
//         //Si va para arriba
//         else
//         {
//             isDown = false;
//             if (scrollTop < limitedSection1) {
//                 $('.mbr-navbar--sticky').each(function(){
//                     var method = 'removeClass';
//                     $(this)[method]('mbr-navbar--stuck')
//                         .not('.mbr-navbar--open')[method]('mbr-navbar--short');
//                 });
//             }
//         }
//
//         oldScrooll =  scrollTop;
//     });
});