<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PB Web</title>
    <link href="css/all.css" media="all" type="text/css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
</head>
<body>
    <div id="wrapper">
        <header id="header">
        	<div class="container">
            	<div class="logo">
                	<a href="{{url('/')}}"><img src="images/logo.png" width="152" height="50" alt="PB LIVE"></a>
		        	<a href="#" class="opener"><span>Menu Opener</span></a>
                </div>
                <div class="header-holder">
                    <ul class="client-btns list-none">
                        @if(Auth::guest())
                        <li><a href="{{url('/signup')}}" id="signup">Sign up</a></li>
                        <li><a href="{{url('/login')}}" id="login">Sign in</a></li>
                        @else
                        <li>
                            <a href="#" class="drop_opener">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="drop_down">
                                <li><a href="{{ url('logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                    <nav id="nav">
                        <ul class="list-none">
                            <li class="active"><a href="{{url('/')}}">Home</a></li>
                            <li><a id="read" href="#">PB Library</a></li>
                            <li><a id="radio" href="#">PB Radio</a></li>
                            <li><a id="video" href="#">PB TV</a></li>
                            <li><a id="devotion" href="#">Daily Devotion</a></li>
                            <li><a id="donate" href="#">Donate</a></li>
                            <li><a id="livestream" href="#">PB Live</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <div class="loader"></div>
		<!--<div id="loading">
        	<div class="loader-holder">
            	<div class="img-holder">
		        	<img src="images/loader2.gif">
                </div>
           </div>
        </div>-->
        <div id="main">
        @yield('content')
        </div>
        
       	<div class="footer-holder">
            <footer id="footer">
                <div class="container">
                    <div class="column">
                        <strong class="title">Download our app from:</strong>
                        <ul class="social-icons list-none">
                            <li><a href="#">google play</a></li>
                            <li><a href="#" class="apple-store">apple store</a></li>
                        </ul>
                    </div>
                    <div class="column">
                        <ul class="list-none">
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Contact us</a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>

    <script type="text/javascript" src="js/custom.js"></script>
</body>
<script>
$(document).ready(function(){
	$('#loading').hide();
	$(this)
	//	.hide()
		.ajaxStart(function() {
//			$('#loading').show();
			$('.loader').addClass('add');
			$('.loader').show(500);
		})
		.ajaxStop(function() {
//			$('#loading').hide();
			$('.loader').removeClass('add');
			$('.loader').css('display', 'none');
		});
});
</script>
</html>