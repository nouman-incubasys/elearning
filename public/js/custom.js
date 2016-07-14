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
	//Dropdown for Logout
	$('.drop_opener').click(function(e){
		e.preventDefault();
		$('.drop_down').slideToggle(500);
	});
	//Loader top padding
	var header_height = $('#header').outerHeight();
	$('.loader-holder .img-holder').css('padding-top', header_height);
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
/****************************************************************/
/****************************************************************/
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
							'<a href="#" onclick="bibleBooks()" ><img src="images/img5.jpg" width="813" height="332" class="img-responsive"></a>'+
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
			var title = $(this).text();
			var author = $(this).closest('li').find('.author').text();
			var audio_path = $(this).attr('value');
			var current_icon = $(this).attr('file_art');
			$('#audio').attr('src',audio_path);
			$('.album_icon img').attr('src',current_icon);
			$('.txt strong').text(title);
			$('.txt span').text(author);
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
				
				var html = '<ul class="list-none songs">';
							title = new Array();
							file = new Array();
							art = new Array();
							author = new Array();
							
							$.each(data,function(key,value){
				
								file[key] = value.audio_file;
								title[key] = value.title;
								author[key] = value.vocalist;
								art[key] = value.album_art;
								html += '<li class="songs-li">'+
									'<div class="song-photo"><img src="'+value.album_art+'" width="398" height="313" alt="image description" class="img-responsive"></div>'+
									'<div class="info">'+
										'<h2 class="active"><a class="audio-tag" onclick="clicked();" file_art="'+value.album_art+'" value="'+file[key]+'">'+value.title+'</a></h2>'+
										'<span class="author">'+value.vocalist +'</span>'+
										'<em class="time">30:00 min</em>'+
									'</div>'+
								'</li>';
							});
								
								
						html +=	'</ul>';
						html += '<div class="player-holder">'+
									'<div class="container">'+
										'<audio type="audio/mpeg" id="audio_player" controls="" autoplay type="audio/mpeg" tabindex="0" preload="auto" id="audio" src='+ file[0] +'>'+
											'<source class="audio_player" src="songs/1.mp3" type="audio/mp3"></source>'+
											"Sorry, your browser does not support HTML5 audio."+
										'</audio>'+
										'<div class="current_song">'+
											'<div class="album_icon">'+
												'<img id="album_art" src="'+ art[0] +'" >'+
											'</div>'+
											'<div class="txt">'+
												'<strong>'+title[0]+'</strong>'+
												'<span>'+author[0]+'</span>'
											'</div>'+
										'</div>'
									'</div>'+
								'</div>';
						$('#main').text('');
						$('#main').append(html);
	console.log(title);
	
			}
		});
	});
	var date = $('#date_time').val();
	$('#devotion').click(function(e){
		e.preventDefault();
		$.ajax({
			url: 'api/dailyprayer/search',
			method: "GET",
			dataType: "json",
			data: {date: date},
			success: function (response) {
				console.log(response.message);
			if(response.message != 'Not Found any Prayer for the date'){
				var html = '<div class="visual devotion">' +
							'<img width="1131" height="214" class="img-responsive" src="images/img11.jpg">'+
								'<div class="visual-holder">'+
									'<div class="visual-text">'+
										'<div class="text">'+
											'<h2>Daily Devotion</h2>'+
										'</div>'+
									'</div>'+
								'</div>'+
						'</div>'+
						'<div class="container">'+
							'<article class="post">'+
								'<header class="header">'+
                    				 '<time datetime="">'+date+'</time>'+
                       				 '<h3>'+response.message.prayer+'</h3>'+
                       				 '<span class="title">'+response.message.reference+'</span>'+
                       				 '<p>'+response.message.verse+'</p>'+
                    			'</header>';
								html += '<div class="txt">'+
											'<p>'+response.message.content+'</p>'+
										'</div>';
							html+= '</article>'+
						'</div>'+
					'</div>';
			}else{
					 var html = '<div class="visual devotion">' +
							'<img width="1131" height="214" class="img-responsive" src="images/img11.jpg">'+
								'<div class="visual-holder">'+
									'<div class="visual-text">'+
										'<div class="text">'+
											'<h2>Daily Devotion</h2>'+
										'</div>'+
									'</div>'+
								'</div>'+
						'</div>'+
					'<center><h2>'+response.message+'</h2></center>';			
			}
			
			
					$('#main').text('');
					$('#main').append(html);
			}
			
		});
	});
	
	
	$('#signup').click(function(e){
		e.preventDefault();
		// Countries
var country_arr = new Array("Afghanistan", "Albania", "Algeria", "American Samoa", "Angola", "Anguilla", "Antartica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Ashmore and Cartier Island", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "British Virgin Islands", "Brunei", "Bulgaria", "Burkina Faso", "Burma", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Clipperton Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo, Democratic Republic of the", "Congo, Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czeck Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Europa Island", "Falkland Islands (Islas Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "French Guiana", "French Polynesia", "French Southern and Antarctic Lands", "Gabon", "Gambia, The", "Gaza Strip", "Georgia", "Germany", "Ghana", "Gibraltar", "Glorioso Islands", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard Island and McDonald Islands", "Holy See (Vatican City)", "Honduras", "Hong Kong", "Howland Island", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Ireland, Northern", "Israel", "Italy", "Jamaica", "Jan Mayen", "Japan", "Jarvis Island", "Jersey", "Johnston Atoll", "Jordan", "Juan de Nova Island", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Man, Isle of", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Midway Islands", "Moldova", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcaim Islands", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romainia", "Russia", "Rwanda", "Saint Helena", "Saint Kitts and Nevis", "Saint Lucia", "Saint Pierre and Miquelon", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Scotland", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and South Sandwich Islands", "Spain", "Spratly Islands", "Sri Lanka", "Sudan", "Suriname", "Svalbard", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Tobago", "Toga", "Tokelau", "Tonga", "Trinidad", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "Uruguay", "USA", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands", "Wales", "Wallis and Futuna", "West Bank", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
var newHTML = [];
for (var i = 0; i < country_arr.length; i++) {
newHTML.push('<option>' + country_arr[i] + '</option>');
}

var days_arr = new Array("1", "2","3", "4","5", "6","7", "8","9", "10","11", "12","13", "14","15", "16","17", "18","19", "20","21", "22","23", "24","25", "26","27", "28","29", "30","31");
var newVAR = [];
for (var i = 0; i < days_arr.length; i++) {
newVAR.push('<option value='+days_arr[i]+'>' + days_arr[i] + '</option>');
}

var month_arr = new Array("January", "February","March", "April", "May","June", "July","August", "September","October", "Novermber","December");
var newMONTH = [];
for (var i = 0; i < month_arr.length; i++) {
newMONTH.push('<option value='+(i+1)+'>' + month_arr[i] + '</option>');
}
	var html = '<div class="container">'+
					'<form class="login-form signup-form" action="" method="post">'+
						'<fieldset>'+
							'<strong class="title">Sign up to <span><b>PB</b> Live</span></strong>'+
							'<input id="name" type="text" placeholder="Name" name="name" required="required">'+
							'<div class="row radio-btns">'+
								'<strong>Gender</strong>'+
								'<label for="male" name="male" id="male">'+
									'<input type="radio" name="gender" id="gender">Male'+
								'</label>'+
								'<label for="female" name="female" id="female">'+
									'<input type="radio" name="gender">Female'+
								'</label>'+
							'</div>'+
							'<div class="row bday">'+
								'<strong>Date of birth</strong>'+
								'<select name="day" class="day" id="day" required="required">'+
									'<option value="" selected="">Day</option>'+
								'</select>'+
								'<select name="month" class="month" id="month" required="required">'+
									'<option selected="">Month</option>'+
								'</select>'+
								'<select name="year" id="year" required="required">'+
									'<option selected="">Year</option>'+
								'</select>'+
							'</div>'+
							'<input type="email" placeholder="Email" name="email" id="email" required="required">'+
							'<input type="password" placeholder="Password" name="password" id="password" required="required">'+
							'<textarea placeholder="Address" name="address" id="address" required="true"></textarea>'+
							'<div class="row region">'+
								'<select name="country" id="country" required="true">'+
									'<option selected>Country</option>'+
								'</select>'+
								'<input type="text" name="city" placeholder="City" id="city" required="required">'+
							'</div>'+
							'<div class="forgot">'+
								'<a href="forgot.html">Forgot Password?</a>'+
							'</div>'+
							'<div class="note">'+
								'<input type="submit" value="Sign up">'+
								'<em>or, <a href="login.html">Sign in</a> if you already have an account.</em>'+
							'</div>'+
						'</fieldset>'+
					'</form>';
			html+= '</div>';
			
		$('#main').text('');
		$('#main').append(html);
		$('.region select').append(newHTML);
		$('.day').append(newVAR);
		$('.month').append(newMONTH);
		function myFunction() {
			var years = ""
			var i = 1900;
			do {
				years += "<option value="+i+">"+i+ "</option>";
				i++;
			}
			while (i <= 3000);
			document.getElementById("year").innerHTML = years;
		}
		myFunction();
		
		$('.signup-form :submit').click(function(e){
			e.preventDefault();
			
			var name = $('#name').val();
			var password = $('#password').val();
			var gender = $('#gender').val();
			var day = $('#day').val();
			var month = $('#month').val();
			var year = $('#year').val();
			var birthday = year +'-'+month+'-'+day;
			var email = $('#email').val();
			var address = $('#address').val();
			var city = $('#city').val();
			var country = $('#country').val();
			
                        if(name=='' || password=='' || gender=='' || day=='' || month=='' || year=='' || email=='' || address=='' || city=='' || country==''){
                            alert('All fields are required to fill');
                            return false;
                        }
			
			
			$.ajax({
				url: 'api/users/register',
				method: "POST",
				dataType: "json",
				data:{
					name: name,
					password: password,	
					gender: gender,
					birthday: birthday,
					email: email,
					address: address,
					city: city,
					country: country
				},
				success: function (response) {
					//window.location.href = "http://localhost/elearning/public";
					location.reload();
					console.log(response);
				}
			});
		});
});


	$('#login').click(function(e){
		e.preventDefault();
	var html = '<div class="container">'+
					'<form class="login-form" action="#" method="post">'+
						'<fieldset>'+
							'<strong class="title">Sign in to <span><b>PB</b> Live</span></strong>'+
							'<input type="text" placeholder="Email" id="email">'+
							'<input type="password" placeholder="Password" id="password">'+
							'<div class="forgot">'+
								'<a href="forgot.html">Forgot Password?</a>'+
							'</div>'+
							'<div class="note">'+
								'<input type="submit" value="Sign in">'+
								'<em>or, <a href="signup.html">Sign up</a> if you dont have an account.</em>'+
							'</div>'+
						'</fieldset>'+
					'</form>'+
				'</div>';
			
		$('#main').text('');
		$('#main').append(html);
		
		$('.login-form :submit').click(function(e){
			e.preventDefault();
			
			var email = $('#email').val();
			var password = $('#password').val();
			
			$.ajax({
				url: 'api/users/login',
				method: "POST",
				dataType: "json",
				data:{
					email: email,
					password: password
				},
				success: function (response) {
					location.reload();
					console.log(response);
				}
			});
		});
});

//Get all videos of this channel
$('#video').click(function(e){
	e.preventDefault();
	$.ajax({
		url: 'https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=UCrsnAHn3coN8gZD8WkJ66gg&type=video&key=AIzaSyBjlWl7HLLxgNnUvmmihnge0ZcalgNIoe8',
		method: "GET",
		dataType: "json",
		data: {date: date},
		success: function (response) {
			console.log(response.items);
			var data = response.items;
			var html = '';/*'<div class="visual add">'+
						'<img src="images/img13.png" class="img-responsive">'+
						'<span class="name">Live Streaming</span>'+
						'</div>';*/
			html+= '<div class="container">'+
					   	'<div class="twocols add">';
			$.each(data,function(key,value){		
			
			html += '<div class="col">'+
						'<div class="col-holder">'+
								'<div class="img-holder">'+
							'<iframe width="560" height="315" src="https://www.youtube.com/embed/'+value.id.videoId+'" frameborder="0" allowfullscreen></iframe>' +
							'</div>';
				html += '<span class="name">'+value.snippet.title+'</span>' +
							'</div>' + 
						'</div>';
						
				});
				html+='</div>' +
				 '</div>';
			
			$('#main').text('');
			$('#main').append(html);


		}
	
	});
});

function bibleBooks(){
	$.ajax({
		url: 'api/bible/books',
		method: "GET",
		dataType: "json",
		success: function (response) {
			
			var data = response.message;
				var html = '<div class="container">'+
				'<div class="twocols add books">';
				
					$.each(data,function(key,value){
					html += '<div class="col">'+
								'<div class="col-holder">'+
									'<div class="name-area">'+
										'<div class="name-holder">'+
											'<h2>'+value.n+'</h2>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>';
					});
			html +=	'</div>'+
			'</div>';
			$('#main').text('');
			$('#main').append(html);	
		}
		
		
		
		
		
	});
	


}