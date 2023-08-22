<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects  = ["Grade 1",  "Grade 2", "Grade 3", "Grade 4" , "Grade 5" , "Grade 6"];
        $uniqid = uniqid();
        foreach ($subjects as $subject){
            Grade::create([
                'grade_name' => $subject,
            ]);
        }
    }
}
