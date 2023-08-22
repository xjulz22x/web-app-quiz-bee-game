@extends('layouts.student-layout')
@section('content')
    <div class="tournament login">
        <div class="inner">
            <div class="border">
                <div class="main-logo">
                    <img src="{{('assets/student-assets/images/logo.png')}}" alt="">
                </div>
                <div class="select-section">
                    <h1>Leaderboards</h1>
                    <p>Welcome to the Online Quiz Bee Tournament of Bulan South Central School. Where the strength of your brain, fast thinking and knowledge would be needed. The faster you get the correct answer, the more you get points added to your score. Each point will be recorded and will be determined who'll be the champion in this competition. Goodluck! </p>
                    <table class="table text-center">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Scores</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($leaders as $leader)
                        <tr>
                            <th scope="row">{{$rank++}}</th>
                            <td>{{$leader->first_name}}</td>
                            <td>{{$leader->last_name}}</td>
                            <td>{{$leader->score->score}}</td>
                        </tr>
                        </tbody>
                        @endforeach
                    </table>
                    <div class="btn-proceed">
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <a href="{{route('logout')}}" onclick="event.preventDefault();
                                    this.closest('form').submit();"> <button type="submit">Exit</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection