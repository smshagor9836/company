 (function($) {
 	"use strict";
 	/*----------------------------
        Product load more
        ------------------------------*/
 	if($('*').hasClass('products-row')){
 		var elem = document.querySelector('.products-row');
 		var infScroll = new InfiniteScroll( elem, {
            // options
            path: "?page={{#}}",
            append: '.produ',
            history: false,
            status: '.page-load-status'
        });
 	}
})(jQuery);

