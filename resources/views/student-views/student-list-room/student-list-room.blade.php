@extends('layouts.student-layout')
@section('content')
    <div class="tournament login">
        <div class="inner">
            <div class="border">
                <div class="main-logo">
                    <img src="images/logo.png" alt="">
                </div>
                <div class="select-section">
                    @if(session('message'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <span><b> Error!!! </b> {{session('message')}}</span>
                        </div>
                    @endif
                    <h1>Select Room</h1>
                    <p>Welcome to the Online Quiz Bee Tournament of Bulan South Central School. Where the strength of your brain, fast thinking and knowledge would be needed. The faster you get the correct answer, the more you get points added to your score. Each point will be recorded and will be determined who'll be the champion in this competition. Goodluck! </p>
                    <form action="{{route('student.quiz')}}" method="GET">
                        @csrf
                        <div class="select-default">
                            <select name="room_id" data-placeholder="Select Room" >
                                @foreach($subject->rooms as $room)
                                    <option value="{{$room->id}}">{{$room->room_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br><br><br><br>
                        <div class="form">
                            <p>
                                <label class="h3">Room Code</label>
                                <input type="text" class="text password" style="width:65%; margin:auto" name="code" placeholder="Room Password">
                            </p>
                        </div>
                        <div class="btn-proceed">
                            <button type="submit" class="submit">Enter Room</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection