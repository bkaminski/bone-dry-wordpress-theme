var $ = jQuery.noConflict();


//Hover effect on Ben's logo
$("img.a").hover(
    function() {
        $(this).stop().animate({"opacity": "0"}, "slow");
    },
    function() {
        $(this).stop().animate({"opacity": "1"}, "slow");
});

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
