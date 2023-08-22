<?php

namespace App\Http\Livewire\ShowProfile;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
use App\Models\Subject;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rules;

class UserProfile extends Component
{
    use WithFileUploads;
    public $gender;
    public $first_name ;
    public $last_name;
    public $age;
    public $email;
    public $user_id;

    protected $rules = [
        'first_name' => 'nullable',
        'last_name' => 'nullable',
        'email' => 'nullable|string|email|max:255|unique:users',
        'age' => 'nullable',
        'gender' => 'nullable',
    ];

    public function editProfile($id)
    {
        
        $profile = User::find($id);

        $this->user_id = $id;
        $this->first_name = $profile->first_name;
        $this->last_name = $profile->last_name;
        $this->email = $profile->email;
        $this->age = $profile->age;
        if($profile->gender == 1){
            $this->gender = '1';
        }
        elseif($profile->gender == 0){
            $this->gender = '0';
        }
      
    }

    public function update()
    {
        $validated = $this->validate([
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'email' => 'nullable|string|email|max:255',
            'age' => 'nullable',
            'gender' => 'nullable',
        ]); 
     
        if($this->user_id) {
            $profile = User::find($this->user_id);
                $profile->update([
                    'first_name' => $validated['first_name'],
                    'last_name' => $validated['last_name'],
                    'email' => $validated['email'],
                    'gender' => $validated['gender'],
                    'age' => $validated['age'],
                ]);
            
                $this->updateMode = true;
                $this->resetInputFields();
                session()->flash('message', 'Successfully Updated!.');
                $this->emit('hideModal', '#updateModal');  
        }
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    private function resetInputFields(){
        $this->first_name = '';
        $this->email = '';
        $this->last_name = '';
        $this->age = '';

    }

    public function render()
    {
        $id = Auth::user()->id;
        $profile = User::findorfail($id);
        $subjects = Subject::where('user_id' , auth()->user()->id)->get();
        return view('livewire.show-profile.user-profile' , compact('profile' , 'subjects'));
    }
}
