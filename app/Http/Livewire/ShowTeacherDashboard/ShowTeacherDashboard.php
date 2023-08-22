<?php

namespace App\Http\Livewire\ShowTeacherDashboard;

use App\Models\Grade;
use App\Models\Question;
use App\Models\Room;
use App\Models\Subject;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Livewire\Component;

class ShowTeacherDashboard extends Component
{
    public $filterByGrade;
    public $filterBySubject;
    public $filteredSubject;
    public $filterByRoom;
    public $filteredLeaders;
    public $filteredRoom;
    public $leaders;


    public function updatedfilterByGrade($grade_id){
        $this->filteredSubject = Subject::where('grade_id', $grade_id)->get();
    }

    public function updatedfilterBySubject($subject_id){
        $this->filteredRoom = Room::where('subject_id', $subject_id)->get();
    }

    public function updatedfilterByRoom($room_id){
        $this->leaders = User::where('room_id', $room_id)->get();
    }

    public function exportPDF(){

        return response()->streamDownload(function () {
            $rank = 1;
            $grade = Grade::find($this->filterByGrade);
            $subject = Subject::find($this->filterBySubject);
            $room = Room::find($this->filterByRoom);
            $students = $this->leaders;
            $pdf = PDF::loadView('pdf-templates.leaderboards-pdf', compact('students', 'rank', 'grade', 'subject', 'room'));
            echo $pdf->stream();
        }, 'leaderboards.pdf');

    }
    public function render()
    {
        $grades = Grade::get();
        $subjects = Subject::get()->count();
        $questions = Question::get()->count();
        $competitors = User::role('student')->get()->count();
        $rooms = Room::get()->count();

        $rank = 1;
        return view('livewire.show-teacher-dashboard.show-teacher-dashboard', compact('grades',
            'subjects', 'questions', 'competitors' , 'rooms', 'rank'));
    }
}
