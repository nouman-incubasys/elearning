$(document).ready(function(){
	//BURGE MENU
	$('#header .opener').click(function(e){
		e.preventDefault();
		$(this).toggleClass('active');
		$('.header-holder').slideToggle(500);
	});
	
	//Add remove Class on nav anchors
	$('#nav ul a').click(function(){
		$('#nav ul li').removeClass('active');
		$(this).closest('li').addClass('active');
	});
	
	//Get clicked song name
$('.songs h2 a').each(function(){
  $(this).click(function(e){
	  	alert();
    e.stopImmediatePropagation();
    var abc = $('.songs h2 a').attr('value');
	console.log(abc);
    $('#audio').attr('src',abc);
  });
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
	
	//Ajax calling the content from diffrent pages
	
	$('#read').click(function(e){
		e.preventDefault();
		$.ajax({
			url: 'api/books/all',
			method: "GET",
			dataType: "json",
			success: function (response) {
				console.log(response.message);
				var data = response.message.data;
				$.each(data,function(key,value){
						//console.log(key);
						console.log(value);
						
					
					});
				var html = '<div class="visual add">' +
							'<img src="images/img5.jpg" width="813" height="332" class="img-responsive">'+
							'<span class="name">The Bible</span>'+
						'</div>'+
						'<div class="container">'+
							'<div class="twocols add">';
							
							$.each(data,function(key,value){
								html += '<div class="col">'+
								'<div class="col-holder">'+
									'<a href="'+value.book_file+'" target="blank" class="photo-holder"><img src="'+value.file_icon+'" width="398" height="313" alt="image description" class="img-responsive"></a>'+
									'<span class="name">'+value.title+'<em class="author">By '+value.author+'</em></span>'+
								'</div></div>';
							});
								
								
						html +=	'</div>'+
						'</div>';
						$('#main').text('');
						$('#main').append(html);
	
	
			}
		});
	});
		
	
function clicked(){
	$('.info h2 .audio-tag').on('click',function(e){
		e.preventDefault();
		var audio_path = $(this).attr('value');
console.log(audio_path);		
		$('.audio_player').attr('src',audio_path);
	});
}	
		
	$('#radio').click(function(e){
		e.preventDefault();
		$.ajax({
			url: 'api/audio/all',
			method: "GET",
			dataType: "json",
			success: function (response) {
				console.log(response.message);
				var data = response.message.data;
				$.each(data,function(key,value){
						//console.log(key);
						console.log(value);
						
					
					});
				var html = '<ul class="list-none songs">';
							
							$.each(data,function(key,value){
				
								file = value.audio_file;
								html += '<li class="songs-li">'+
									'<div class="song-photo"><img src="'+value.album_art+'" width="398" height="313" alt="image description" class="img-responsive"></div>'+
									'<div class="info">'+
										'<h2 class="active"><a class="audio-tag" onclick="clicked();" value="'+file+'">'+value.title+'</a></h2>'+
										'<span class="author">'+value.vocalist +'</span>'+
										'<em class="time">30:00 min</em>'+
									'</div>'+
								'</li>';
							});
								
								
						html +=	'</ul>';
						html += '<div class="player-holder">'+
									'<audio autoplay="false" type="audio/mpeg" controls="" tabindex="0" preload="auto" id="audio" src='+ file +'>'+
										'<source class="audio_player" src="songs/1.mp3" type="audio/mp3"></source>'+
										"Sorry, your browser does not support HTML5 audio."+
									'</audio>'+
								'</div>';
						$('#main').text('');
						$('#main').append(html);
	
	
			}
		});
		
		//clicked();	
	});
	
	
		
