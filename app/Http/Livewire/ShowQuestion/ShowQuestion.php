<?php

namespace App\Http\Livewire\ShowQuestion;

use App\Models\Answer;
use App\Models\Grade;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Support\Arr;
use Livewire\Component;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;

class ShowQuestion extends Component
{
    public $child_answer = [];
    public $question_title;
    public $subject_id;
    public $answer_name=[];
    public $status;
    public $inputs = [];
    public $i = 1;
    public $filteredSubject;
    public $filterybygrade = null;
    public $answer_id;

    protected $rules  = [
      'question_title' => 'required',
      'subject_id' => 'required',
      'status.*' => 'required',
      'answer_name.*' => 'required'
    ];

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function updatedfilterybygrade($sub_id){
        $this->filteredSubject = Subject::where('grade_id', $sub_id)->get();
    }

    public function remove($i){
        unset($this->inputs[$i]);
    }

    public function submit(){
        $validated = $this->validate();

        $question = Question::create([
            'question_name' => $validated['question_title'],
            'subject_id'=>$validated['subject_id']
        ]);

        foreach ($this->answer_name as $key => $value){
            Answer::create([
                'answer_name' => $this->answer_name[$key],
                'status' => $this->status[$key],
                'question_id' => $question->id,
            ]);
        }
        $this->inputs = [];

        $this->resetInputFields();
        session()->flash('message', 'Question Has Been Created Successfully.');
    }

    public function edit($id)
    {
        $questions = Question::find($id);
        $this->question_id = $id;
        $this->question_name = $questions->question_name;
        $this->grade_name = $questions->subject->grade->grade_name;
        $this->subject_name = $questions->subject->subject_name;

        $this->child_answer = $questions->answers;

    }

    public function update()
    {
        $validated = $this->validate([
            'question_name' => 'nullable',
            'grade_name' => 'nullable',
            'subject_name' => 'nullable',
            'answer_name.*' => 'nullable',
        ]); 
     
        if($this->question_id) {
            $questions = Question::find($this->question_id);
                $questions->update([
                    'question_name' => $validated['question_name'],
                    'grade_name' => $validated['grade_name'],
                    'subject_name' => $validated['subject_name'],
                ]);
                if($this->answer_name){
                    $answers = Answer::find($this->answer_id);
                
                    $answers->update([
                        'answer_name' => $validated['answer_name'],
                        'status' => $validated['status'],
                    ]);
                }
            
                $this->updateMode = true;
                $this->resetInputFields();
                session()->flash('message', 'Successfully Updated Questions!.');
                $this->emit('hideModal', '#updateModal');  
        }
    }

    public function resetInputFields(){
        $this->subject_id = "";
        $this->question_title= "";
        $this->answer_name = "";
        $this->status = "";
    }
    public function destroy($id){
        $question = Question::find($id)->delete();
    }

    public function destroyAnswer($id){
        $answer = Answer::find($id)->delete();
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }
    public function render()
    {
        $questions  = Question::get();
        $subjects = Subject::get();
        $grades = Grade::get();
        return view('livewire.show-question.show-question', compact('subjects', 'questions', 'grades'));
    }
}
