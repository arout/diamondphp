jQuery(document).ready(function($) {
	$.post('js/twitter/index.php', { test: "vars" }, function(data) {
	  	obj = JSON.parse(data);
	
	  	if(obj.message != "not_set"){
		  	// Footer Twitter Feed
		  	if($('.latest-tweet').length){
			  	$('.latest-tweet').tweet({
				  	modpath: 'js/twitter/index.php',
				  	count: 2,
				  	loading_text: 'loading twitter feed...',
				  	username: 'envato'
			  	});
		  	}
	  	}
	});
});