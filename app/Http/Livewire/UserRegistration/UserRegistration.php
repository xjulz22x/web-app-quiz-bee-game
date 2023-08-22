<?php

namespace App\Http\Livewire\UserRegistration;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserRegistration extends Component
{
    public $first_name, $last_name, $age, $gender, $email, $password;

    protected $rules = [
        'first_name'=>'required',
        'last_name' =>'required',
        'age' =>'required|integer',
        'gender' =>'required',
        'email' =>'required|email|unique:users',
        'password' =>'required|min:6',
    ];

    public function submit(){

        $validated = $this->validate();
        $user = User::create([
            'first_name' =>$validated['first_name'],
            'last_name' => $validated['last_name'],
            'age' => $validated['age'],
            'gender' => $validated['gender'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ])->assignRole('student');

        $this->resetInputFields();
        session()->flash('message', 'Successfully created a Competitor');
    }

    public function edit($id)
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

    public function resetInputFields(){
        $this->first_name = '';
        $this->last_name = '';
        $this->age = '';
        $this->gender = '';
        $this->email = '';
        $this->password = '';
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function destroy($id){
        $user = User::find($id)->delete();
    }
    public function render()
    {
        $users = User::role('student')->get();
        return view('livewire.user-registration.user-registration', compact('users'));
    }
}
