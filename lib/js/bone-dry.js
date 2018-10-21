var $ = jQuery.noConflict();


//Hover effect on Ben's logo
$("img.a").hover(
    function() {
        $(this).stop().animate({"opacity": "0"}, "slow");
    },
    function() {
        $(this).stop().animate({"opacity": "1"}, "slow");
});
    
// card text sizing
$(".card-body p").addClass('card-text social-card');
$(".blog").find('.btn-api-social').addClass('news-button mt-4');
$(".archive").find('.btn-api-social').addClass('tag-button mt-4');


// Swap alignment at mobile
    var $window = $(window);
         function checkWidth() {
            if ($window.width() < 574) {
                //$('.card-deck').addClass('invisible');
            };
            if ($window.width() >= 574) {
                //$('.card-deck').removeClass('invisible');
            }
        }
        // Execute on load
        checkWidth();
        // Bind event listener
$(window).resize(checkWidth); 
