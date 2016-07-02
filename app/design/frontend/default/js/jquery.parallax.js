(function($) {

    $.fn.parallax = function(options) {

        var windowHeight = $(window).height();
		
        var settings = $.extend({
            velocity: 0.15,
			offset:   0
        }, options);

        return this.each(function() {

            var element    = $(this);
			var velocity   = ($(this).data("velocity") ? $(this).data("velocity") : settings.velocity);
			var img_offset = ($(this).data("offset") ? $(this).data("offset") : settings.offset);
			var no_repeat  = ($(this).data("no-repeat") ? $(this).data("no-repeat") : false);

			// background image
			if($(this).data('image')){
				$(this).css("background-image", "url(" + $(this).data('image') + ")");
			}

            // if no repeat is set then get height
            if(no_repeat){
                var image_url = $(element).css("background-image").replace('url(','').replace(')','');
                $("<img/>").attr("src", image_url).load(function() {
                    image_height = this.height;
                    div_height   = element.height();
                });
            }

            $(document).scroll(function() {

                var scrollTop  = $(window).scrollTop();
                var offset     = element.offset().top;
                var out_height = element.outerHeight();
				var height     = $(window).height();

                if (offset + out_height <= scrollTop || offset >= scrollTop + windowHeight) {
                    return;
                }

                //var new_position = Math.round(((offset - (scrollTop + height)) * velocity) + img_offset);
                var new_position = Math.round(((scrollTop + ( height - offset ) ) * velocity) + img_offset);

                if((typeof image_height != "undefined") && (Math.abs(new_position) + div_height) > image_height){
                    return;
                }

                element.css('background-position', '50% ' + new_position + 'px');

            });
        });
    }
}(jQuery));