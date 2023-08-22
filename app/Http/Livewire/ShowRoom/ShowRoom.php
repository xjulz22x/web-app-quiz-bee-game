<?php

namespace App\Http\Livewire\ShowRoom;

use App\Models\Room;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use App\Models\Grade;
use App\Models\Question;
use Livewire\Component;

class ShowRoom extends Component
{
    public $room_name;
    public $room_title;
    public $room_code;
    public $room_id;
    public $grade_name;
    public $subject_name;
    public $question_name = [];
    public $grade_id;
    public $filterbygrade = null;
    public $filterBySubject = null;
    public $checkbox=[];
    public $filteredSubject;
    public $filteredQuestions;

    protected $rules = [
      'room_title'=>'required',
      'filterBySubject' =>'required',
    ];
    public function submit(){
        $validated = $this->validate();
        $uuid = uniqid();

        $room = Room::create([
            'room_name' => $validated['room_title'],
            'subject_id' => $validated['filterBySubject'],
            'room_code' => $uuid
        ]);

        foreach ($this->checkbox as $chex => $value){
            $room->questions()->attach($chex);
        }
        $this->checkbox = [];

        $this->resetInputFields();
        session()->flash('message', 'Room Has Been Created Successfully.');
    }

    public function updatedfilterbygrade($grade_id){
        $this->filteredSubject = Subject::where('grade_id', $grade_id)->get();
    }

    public function updatedfilterBySubject($sub_id){

        $this->filteredQuestions = Question::where('subject_id', $sub_id)->get();
    }
    public function resetInputFields(){
        $this->room_name = "";
        $this->grade_id= "";
    }

    public function edit($id)
    {
        $rooms = Room::find($id);
        $this->room_id = $id;
        $this->room_name = $rooms->room_name;
        $this->room_code = $rooms->room_code;
        $this->grade_name = $rooms->subject->grade->grade_name;
        $this->subject_name = $rooms->subject->subject_name;
        $this->question_name = $rooms->questions;

    }

    public function update()
    {
        $validated = $this->validate([
            'room_name' => 'required',
           
        ]); 
     
        if($this->room_id) {
            $rooms = Room::find($this->room_id);
                $rooms->update([
                    'room_name' => $validated['room_name'],
               
                ]);
                $this->updateMode = true;
               
                session()->flash('message', 'Successfully Updated Room!.');
               
        }
    }

    public function destroyQuestion($id){
        $question = Question::find($id)->delete();
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function destroy($id){
        $room = Room::find($id)->delete();
    }
    public function render()
    {
        $questions = Question::get();
        $grades = Grade::get();
        $rooms = Room::get();
        return view('livewire.show-room.show-room', compact('grades', 'questions', 'rooms'));
    }
}
