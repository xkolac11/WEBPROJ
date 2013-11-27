$(".section-toggle").click(function () {
	$toggle = $(this);
	//getting the next element 
	$content = $toggle.parent().next();
	$content.slideToggle(300, function(){
		
		$toggle.addClass(function(){
			return $content.is(":visible") ? "on" : "off";
		});

		$toggle.removeClass(function(){
			return $content.is(":visible") ? "off" : "on";
		}) ;
	
	});
	$content.addClass(function(){
			return $content.is(":visible") ? "visible" : "invisible";
		});

	$content.removeClass(function(){
		return $content.is(":visible") ? "invisible" : "visible";
	}) ;
});


$('html').click(function() {	
	$('#settings').hide(100);	
 })

 $('#settings-btn').click(function(e){
     e.stopPropagation();
 });

$('#toggle-settings').click(function(e) {
	$('#settings').toggle(100);
});



