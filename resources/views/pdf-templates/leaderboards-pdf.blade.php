@extends('layouts.pdf-layout')
@section('content')
    <div class="text-center" style="text-align: center;">
        <h1 class="text-center" >Leaderboards</h1>
    </div>
    <div>
        <h6>Grade: {{$grade->grade_name}}</h6>
        <h6>Subject: {{$subject->subject_name}}</h6>
        <h6>Room Name: {{$room->room_name}}</h6>
    </div>
    <div class="page-break">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Rank</th>
                <th scope="col">First</th>
                <th scope="col">Last Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Age</th>
                <th scope="col">Score</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <th scope="row">{{$rank++}}</th>
                    <td>{{$student->first_name}}</td>
                    <td>{{$student->last_name}}</td>
                    @if($student->gender == 1)
                        <td>Male</td>
                    @else
                        <td>Female</td>
                    @endif
                    <td>{{$student->age}}</td>
                    <td>{{$student->score->score}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
