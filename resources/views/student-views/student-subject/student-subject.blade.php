@extends('layouts.student-layout')
@section('content')
    <div class="tournament">
        <div class="inner">
            <div class="border">
                <div class="main-logo">
                    <img src="{{asset('assets/student-assets/images/logo.png')}}" alt="">
                </div>
                <div class="select-section">
                    <h1>Select Subject</h1>
                    <p>Welcome to the Online Quiz Bee Tournament of Bulan South Central School. Where the strength of your brain, fast thinking and knowledge would be needed. The faster you get the correct answer, the more you get points added to your score. Each point will be recorded and will be determined who'll be the champion in this competition. Goodluck! </p>
                    <form action="{{route('room.list')}}" method="GET">
                        @csrf
                        <div class="select-default">
                            <select name="subject" data-placeholder="Select Subjects">
                                @foreach($grade->subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="btn-proceed">
                          <button type="submit">Enter Subject </button>
                        </div>
                    </form>
                    <div class="btn-exit">
                        <a href="{{route('student.grade')}}"><button class="submit">Back</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection