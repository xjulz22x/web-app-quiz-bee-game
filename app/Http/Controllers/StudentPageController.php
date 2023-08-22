<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerRequest;
use App\Models\Grade;
use App\Models\Room;
use App\Models\Score;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class StudentPageController extends Controller
{

    public function login(){
        return view('student-views.student-login.student-login');
    }

    public function roomList(Request $request){
        $subject = Subject::find($request->subject);
        return view('student-views.student-list-room.student-list-room', compact('subject'));
    }

    public function studentSubject(Request $request){

        if($request->grade_selector == null){
            return redirect()->back()->with('message', 'Please select your Grade Level');

        }
        else{
            $grade = Grade::find($request->grade_selector);
            return view('student-views.student-subject.student-subject', compact('grade'));

        }
    }

    public function studentGrade(){
        $grades = Grade::get();
        return view('student-views.student-grade.student-grade' ,compact('grades'));
    }

    public function studentQuiz(Request $request){

        $room = Room::where('id', $request->room_id)
            ->where('room_code', $request->code)->first();


        if($room){
            $user = User::find(auth()->user()->id);
            $user->update([
                'room_id' => $request->room_id
            ]);
            $questions = $room->questions()->get();

            return view('student-views.quiz.quiz', compact('questions'));
        }
        else{
            return redirect()->back()->with('message', 'You have entered a wrong PASSCODE');
        }

    }

    public function submitAnswer(Request $request){
        $score = 0;
        $scr = Score::where('user_id', auth()->user()->id)->first();

        if($scr!=null){
            foreach($request->except('_token') as $name => $value){
                if($value == 1){
                    $score++;
                }
            }
            $scr->update([
                'score'=>$score
            ]);
        }
        else{
            Score::create([
                'user_id' => auth()->user()->id,
                'score' => $score,
            ]);
        }
        return view('student-views.student-score.student-score', compact('score'));
    }

    public function studentLeaderboards(){
        $leaders = User::role('student')->with('score')
                    ->orderBy(Score::select('score')->whereColumn('scores.id', 'users.id'), 'desc')->get();
        $rank = 1;
        return view('student-views.student-leaderboards.student-leaderboards', compact('leaders','rank'));
    }

    public function dashboard (){
        return view('student-views.dashboard.dashboard');
    }

}
