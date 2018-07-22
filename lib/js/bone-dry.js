var $ = jQuery.noConflict();




// Swap alignment at mobile
    var $window = $(window);
         function checkWidth() {
            if ($window.width() < 753) {
                //$('.apiName').addClass('d-none');
            };
            if ($window.width() >= 753) {
               // $('.apiName').removeClass('d-none');
            }
        }
        // Execute on load
        checkWidth();
        // Bind event listener
$(window).resize(checkWidth); 
