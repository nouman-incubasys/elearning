@extends('layouts.main')

@section('content')

        <div id="main">
        	<div class="container">
            	<form action="#" class="login-form">
                	<fieldset>
                    	<strong class="title">Sign in to <span><b>PB</b> Live</span></strong>
                        <input type="text" placeholder="Username">
                        <input type="password" placeholder="Password">
                        <div class="forgot">
                        	<a href="forgot.html">Forgot Password?</a>
                        </div>
                        <div class="note">
                        	<input type="submit" value="Sign in">
                            <em>or, <a href="signup.html">Sign up</a> if you don't have an account.</em>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

@stop