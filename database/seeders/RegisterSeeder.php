<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Register;
use Faker\Factory as Faker;
class RegisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       for($i=0;$i<10;$i++){
           $fake=Faker::create();
           $register = new Register;
           $register->name=$fake->name;
           $register->gender='m';
           $register->email=$fake->email;
           $register->password=$fake->password;
           $register->salary=$fake->randomNumber(4);
           $register->role_id='3';
           $register->save();
       }
        }
    }
    

