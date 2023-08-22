@extends('layouts.student-layout')
@section('content')
    <div class="tournament login">
        <div class="inner">
            <div class="border">
                <div class="main-logo">
                    <img src="{{('assets/student-assets/images/logo.png')}}" alt="">
                </div>
                <div class="select-section">
                    <h1>Join Room</h1>
                    <p>Welcome to the Online Quiz Bee Tournament of Bulan South Central School. Where the strength of your brain, fast thinking and knowledge would be needed. The faster you get the correct answer, the more you get points added to your score. Each point will be recorded and will be determined who'll be the champion in this competition. Goodluck! </p>
                    <div class="form">
                        <p>
                            <label>Room Code</label>
                            <input type="text" class="text username" name="email"placeholder="Room Password">
                        </p>
                    </div>
                    <div class="btn-proceed">
                        <a href="{{route('student.quiz')}}"><button class="submit">Enter the Room</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection