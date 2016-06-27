$(document).ready(function(){
	//BURGE MENU
	$('#header .opener').click(function(e){
		e.preventDefault();
		$(this).toggleClass('active');
		$('.header-holder').slideToggle(500);
	});
});
$(window).resize(function(){
	//WINDOW WIDTH
	var win_width = $(window).width();
	if( win_width>767 ){
		$('.header-holder').slideDown(500);
	}
	else{
		$('.header-holder').slideUp();
	}
});