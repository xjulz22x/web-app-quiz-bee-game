@extends('layouts.student-layout')
@section('content')
    <div class="tournament quiz">
        <div class="inner">
            <div class="border">
                <div class="main-logo">
                    <img src="{{asset('assets/student-assets/images/logo.png')}}" alt="">
                </div>
                <div class=" mt-2">
                    @if(session('message'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <span><b> Error!!! </b> {{session('message')}}</span>
                        </div>
                    @endif
                    <form action="{{route('submit.answer')}}" method="POST">
                    <div class="d-flex justify-content-center row">
                        <div class="col-md-10 col-lg-10">
                            <div class="border2" style="height: 500px; width: 500px; " ss-container>
                                <div class="question  p-3 border-bottom">
                                    <div class="d-flex flex-row align-items-center mcq jcenter">
                                        <h4>BSCS - QUIZ TOURNAMENT</h4>
                                    </div>
                                </div>
                                    @csrf
                                    @foreach($questions as $question)
                                        <div class="question  p-3 border-bottom">
                                            <div class="d-flex flex-row align-items-center question-title">
                                                <h3 class="text-danger">Q.</h3>
                                                <h5 class="mt-1 ml-2">{{$question->question_name}}</h5>
                                            </div>
                                            <div class="choices">
                                                @foreach($question->answers as $answer)
                                                    <div class="ans ml-2">
                                                        <label class="radio"> <input type="radio"  name="{{$question->id}}" value="{{$answer->status}}" class="radioValue"> <span>{{$answer->answer_name}}</span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                <div class="btn-proceed-quiz">
                                    <button type="submit" >Submit Quiz</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
