@extends('layouts.main')

@section('content')

<div id="main">
    <div class="container">
        <form action="#" class="login-form signup-form">
                <fieldset>
                <strong class="title">Sign up to <span><b>PB</b> Live</span></strong>
                <input type="text" placeholder="Name">
                <div class="row radio-btns">
                        <strong>Gender</strong>
                    <label for="male">
                        <input type="radio" id="male" name="gender">Male
                    </label>
                    <label for="female">
                        <input type="radio" id="female" name="gender">Female
                    </label>
                </div>
                <div class="row">
                        <strong>Date of birth</strong>
                        <select>
                        <option selected>Day</option>
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                    </select>
                        <select>
                        <option selected>Month</option>
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                    </select>
                        <select>
                        <option selected>Year</option>
                        <option>2000</option>
                        <option>2001</option>
                        <option>2002</option>
                        <option>2003</option>
                    </select>
                </div>
                <input type="email" placeholder="Email">
                <textarea placeholder="Address"></textarea>
                <div class="row region">
                    <select>
                        <option selected>City</option>
                        <option>Lahore</option>
                        <option>Islamabad</option>
                        <option>Karachi</option>
                    </select>
                    <select>
                        <option selected>Country</option>
                        <option>Pakistan</option>
                        <option>Saudi Arabia</option>
                        <option>Dubai</option>
                    </select>
                </div>
                <div class="forgot">
                        <a href="forgot.html">Forgot Password?</a>
                </div>
                <div class="note">
                        <input type="submit" value="Sign up">
                    <em>or, <a href="login.html">Sign in</a> if you already have an account.</em>
                </div>
            </fieldset>
        </form>
    </div>
</div>

@stop