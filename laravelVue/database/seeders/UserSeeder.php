<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Default admin to test
        User::insert([
            'name' => 'Admin',
            'email' => 'laravelvueadmin@test.com',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
            'password' => bcrypt('test'), 
            'role' => 'admin',
            'language' => 'es',
            'remember_token' => Str::random(10),
        ]);

        //Default reviewer to test
        User::insert([
            'name' => 'Reviewer',
            'email' => 'laravelvuereviewer@test.com',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
            'password' => bcrypt('test'), 
            'role' => 'reviewer',
            'language' => 'en',
            'remember_token' => Str::random(10),
        ]);
    
        User::factory(8)->create();
    }
}
