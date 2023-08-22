<?php

namespace App\Http\Livewire\ShowDashboard;

use App\Models\Grade;
use App\Models\Question;
use App\Models\Room;
use App\Models\Subject;
use App\Models\User;
use Livewire\Component;

class ShowDashboard extends Component
{
    public function render()
    {
        $grades = Grade::get()->count();
        $subjects = Subject::get()->count();
        $questions = Question::get()->count();
        $competitors = User::role('student')->get()->count();
        $rooms = Room::get()->count();
        return view('livewire.show-dashboard.show-dashboard' , compact('grades', 'subjects', 'questions', 'competitors' , 'rooms'));
    }
}
