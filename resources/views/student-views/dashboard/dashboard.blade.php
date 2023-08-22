@extends('layouts.student-layout')
@section('content')
    <div class="tournament login">
        <div class="inner">
            <div class="border">
                <div class="main-logo">
                    <img src="{{('assets/student-assets/images/logo.png')}}" alt="">
                </div>
                <div class="select-section">
                    <h1>Welcome</h1>
                    <p>Welcome to the Online Quiz Bee Tournament of Bulan South Central School. Where the strength of your brain, fast thinking and knowledge would be needed. The faster you get the correct answer, the more you get points added to your score. Each point will be recorded and will be determined who'll be the champion in this competition. Goodluck!  </p>
                    @guest
                        @if(Route::has('login'))
                            <div class="btn-proceed">
                                <a href="{{route('student.login')}}"><button class="submit">Enter the Tournament</button></a>
                            </div>
                        @endif
                    @else
                        <h1>{{Auth::user()->full_name}}</h1>
                        @role('student')
                        <div class="btn-proceed">
                            <a href="{{route('student.grade')}}"><button class="submit">Enter The Room</button></a>
                        </div>
                        @endrole
                        @role('teacher')
                        <div class="btn-proceed">
                            <a href="{{route('teacher.dashboard')}}"><button class="submit">Continue to Dashboard</button></a>
                        </div>
                        @endrole
                        <div class="btn-proceed">
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <a href="{{route('logout')}}" onclick="event.preventDefault();
                                    this.closest('form').submit();"> <button type="submit">Exit</button></a>
                            </form>
                        </div>
                    @endguest

                </div>
            </div>
        </div>
    </div>
@endsection