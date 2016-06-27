@extends('layouts.main')

@section('content')

 <div id="main">
    <ul id="playlist" class="list-none songs">
        <li>
                <div class="song-photo">
                <img src="images/img15.png" width="72" height="71" alt="image description" class="img-responsive">
            </div>
            <div class="info">
                <h2><a href="songs/1.mp3">The Good, the bad and the ugly</a></h2>
                <span class="author">By Diarmaid MacCulloch</span>
                <em class="time">30:00 min</em>
            </div>
        </li>
        <li>
                <div class="song-photo">
                <img src="images/img15.png" width="72" height="71" alt="image description" class="img-responsive">
            </div>
            <div class="info">
                <h2><a href="songs/1.mp3">The Good, the bad and the ugly</a></h2>
                <span class="author">By Diarmaid MacCulloch</span>
                <em class="time">30:00 min</em>
            </div>
        </li>
        <li>
                <div class="song-photo">
                <img src="images/img15.png" width="72" height="71" alt="image description" class="img-responsive">
            </div>
            <div class="info">
                <h2><a href="songs/1.mp3">The Good, the bad and the ugly</a></h2>
                <span class="author">By Diarmaid MacCulloch</span>
                <em class="time">30:00 min</em>
            </div>
        </li>
        <li>
                <div class="song-photo">
                <img src="images/img15.png" width="72" height="71" alt="image description" class="img-responsive">
            </div>
            <div class="info">
                <h2><a href="songs/1.mp3">The Good, the bad and the ugly</a></h2>
                <span class="author">By Diarmaid MacCulloch</span>
                <em class="time">30:00 min</em>
            </div>
        </li>
    </ul>
    <div class="player-holder">
        <audio id="audio" preload="auto" tabindex="0" controls="" type="audio/mpeg" autoplay="false">
            <source type="audio/mp3" src="songs/1.mp3">
            Sorry, your browser does not support HTML5 audio.
        </audio>
    </div>
</div>

@stop
