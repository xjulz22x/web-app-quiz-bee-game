<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grades = [1, 2, 3, 4, 5, 6];
        $subjects  = ["Math",  "Science", "Filipino", "English"];
        foreach ($grades as $grade){
            $rand = $grade;
            $uniqid = uniqid();
            foreach ($subjects as $subject){
                Subject::create([
                    'subject_name' => $subject,
                    'subject_code' => $uniqid,
                    'grade_id' => $rand
                ]);
            }
        }




    }
}
