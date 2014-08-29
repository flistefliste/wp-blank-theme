(function($) {
	
	jQuery('.cycle-header').on( 'cycle-after', function(event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag) {
	    var now = jQuery(incomingSlideEl) ;
	    var link = now.attr('data-link');
	   now.css('cursor','pointer').on('click',function(){
	    	window.location.href=link;
	    });

	  
	});


	//sujet form de contact
	var jQuery_GET = {};

	document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
	    function decode(s) {
	        return decodeURIComponent(s.split("+").join(" "));
	    }

	    jQuery_GET[decode(arguments[1])] = decode(arguments[2]);
	});


	if( jQuery('textarea[name=your-message]').length > 0 && typeof(jQuery_GET["about"]) != 'undefined'){

		jQuery('textarea[name=your-message]').val('Je souhaite recevoir des informations au sujet de '+jQuery_GET["about"]);

		jQuery('input[name=your-company]').focus();
	}

})(jQuery);