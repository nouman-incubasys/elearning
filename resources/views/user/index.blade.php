@extends('layouts.main')

@section('content')

<div id="main">
        <div class="visual"><img src="images/img1.jpg" width="1134" height="407" class="img-responsive"></div>
        <div class="container">
        <div class="twocols">
                <div class="col">
                <a href="#" class="col-holder">
                    <img src="images/img2.png" width="463" height="398" alt="Bible" class="img-responsive">
                    <div class="caption">
                        <div class="cap-holder">
                            <div class="text">
                                <span>BIBLE</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
                <a href="daily-devotion.html" class="col">
                <div class="col-holder">
                    <img src="images/img3.png" width="463" height="398" alt="Bible" class="img-responsive">
                    <div class="caption">
                        <div class="cap-holder">
                            <div class="text">
                                <span>DAILY DEVOTION</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="msg-area">
                <div class="slogan"><img src="images/img4.png" width="121" height="135" alt="Pb" class="img-responsive"></div>
            <p>Get a free Bible for your phone, <span>tablet and computer.</span></p>
            <a href="#" class="btn-read">Read the Bible now</a>
        </div>
    </div>
</div>

@stop