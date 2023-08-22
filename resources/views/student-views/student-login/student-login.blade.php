@extends('layouts.student-layout')
@section('content')
    <div class="login">
        <div class="inner">
            <div class="row">
                <div class="col-md-6 col-xs-12 left-info">
                    <div class="inner-info">
                        <div class="logo"><img src="{{asset('assets/student-assets/images/logo.png')}}" alt=""></div>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form">
                                <input type="hidden" name="role_id" value="0">
                                <p>
                                    <label>Username</label>
                                    <input type="text" class="text username" name="email" placeholder="Juan De La Cruz">
                                </p>
                                <p>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="forgot">Forgot Password</a>
                                    @endif
                                    <label>Password</label>
                                    <input type="password" name="password" class="text password">
                                </p>
                                <div class="btnset">
                                    <button type="submit" class="btn login-btn">Login</button>
                                    <submit class="btn register-btn">Register</submit>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 right-info">
                    <div class="logo-south">
                        <img src="{{('assets/student-assets/images/sout.png')}}" alt="">
                    </div>
                    <div class="featured-img">
                        <img src="{{('assets/student-assets/images/featured-img.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection