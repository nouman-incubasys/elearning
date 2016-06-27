@extends('layouts.main')

@section('content')

<div id="main">
        <div class="container">
        <form action="#" class="login-form donate">
                <fieldset>
                <img src="images/img12.png" width="151" height="151" alt="image description" class="donate-img">
                <strong class="title">Enter the amount you want to donate</strong>
                <input type="text"><span class="currency-type">USD</span>
                <div class="note">
                        <input type="submit" value="Donate">
                </div>
            </fieldset>
        </form>
    </div>
</div>

@stop