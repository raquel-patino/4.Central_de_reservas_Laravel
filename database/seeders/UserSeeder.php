<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user= new User();

        $user->name= 'admin';
        $user->surname= 'admin';
        $user->email= 'admin@gmail.com';
        $user->password= '1234abcd';
        $user->telephone= '662102044';
        $user->username= 'admin';

        $user->save();
    }
}
