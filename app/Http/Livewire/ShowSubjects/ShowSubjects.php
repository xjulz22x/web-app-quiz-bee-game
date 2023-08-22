<?php

namespace App\Http\Livewire\ShowSubjects;

use Livewire\Component;
use App\Models\Subject;
use App\Models\Grade;

class ShowSubjects extends Component
{
    public $user_id;
    public $subject_name;
    public $subject_code;
    public $grade_id;

    protected $rules = [
        'subject_name' => 'required',
        'grade_id' => 'required',
    ];

    public function submit(){
        $uuid = uniqid();
        $validated = $this->validate();
        Subject::create([
            'subject_name' => $validated['subject_name'],
            'grade_id' => $validated['grade_id'],
            'subject_code' =>  $uuid,
            'user_id' => auth()->user()->id,
        ]);
        $this->resetInputFields();
        session()->flash('message', 'Subject successfully created.');
    }

    private function resetInputFields(){
        $this->subject_name = '';
        $this->grade_id = '';

    }
    public function destroy($id){
        $subject = Subject::find($id)->delete();
    }


    public function render()
    {
        $subjects = Subject::get();
        $grades = Grade::get();
        return view('livewire.show-subjects.show-subjects' , compact('subjects', 'grades'));
    }



}
