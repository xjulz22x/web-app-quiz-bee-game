@extends('layouts.student-layout')
@section('content')
    <div class="tournament">
        <div class="inner">
            <div class="border">
                <div class="main-logo">
                    <img src="{{asset('assets/student-assets/images/logo.png')}}" alt="">
                </div>
                <div class="select-section">
                    <h1>Your Final Score!</h1>
                        <p class="h1">{{$score}}</p>
                        <div class="btn-proceed">
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <a href="{{route('logout')}}" onclick="event.preventDefault();
                                    this.closest('form').submit();"> <button type="submit">Exit</button></a>
                            </form>
                        </div>
                        <div class="btn-proceed">
                            <a href="{{route('student.leaders')}}"><button class="submit">Proceed to Leaderboards</button></a>
                        </div>
                </div>
            </div>
        </div>

    </div>
@endsection