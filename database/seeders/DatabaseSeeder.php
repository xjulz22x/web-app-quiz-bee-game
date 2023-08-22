<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Contracts\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            RoleSeeder::class,
            GradeSeeder::class,
            SubjectSeeder::class,

        ]);

        $user = \App\Models\User::create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'age' => 1,
            'gender' => 1,
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $user2 = \App\Models\User::create([
            'first_name' => 'test',
            'last_name' => 'test',
            'age' => 12,
            'gender' => 1,
            'email' => 'test@example.com',
            'password' => Hash::make('test'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $adminRole = \Spatie\Permission\Models\Role::findByName('student')->users()->attach($user2);

        $adminRole = \Spatie\Permission\Models\Role::findByName('teacher')->users()->attach($user);
    }
}
