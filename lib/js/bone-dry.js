var $ = jQuery.noConflict();




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
