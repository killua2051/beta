<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'first_name' => 'admin',
        	'middle_name' => 'admin',
        	'last_name' => 'admin',
        	'email' => 'admin@gmail.com',
        	'password' => Hash::make('password'),
        	'department_id' => '1',
        	'remember_token' => str_random(10) //I removed , to this line of code
        ]);
        User::create([
        	'first_name' => 'author',
            'middle_name' => 'author',
            'last_name' => 'author',
        	'email' => 'author@gmail.com',
        	'password' => Hash::make('password'),
        	'department_id' => '2',
        	'remember_token' => str_random(10) //I removed , to this line of code
        ]);
        User::create([
        	'first_name' => 'quality',
            'middle_name' => 'qa',
            'last_name' => 'assurance',
        	'email' => 'qa@gmail.com',
        	'password' => Hash::make('password'),
        	'department_id' => '3',
        	'remember_token' => str_random(10) //I removed , to this line of code
        ]);
        User::create([
            'first_name' => 'File Holder',
            'middle_name' => 'FH',
            'last_name' => 'Holder',
            'email' => 'fileholder@gmail.com',
            'password' => Hash::make('password'),
            'department_id' => '3',
            'remember_token' => str_random(10) //I removed , to this line of code
        ]);
    }
}
