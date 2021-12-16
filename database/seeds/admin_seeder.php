<?php

use App\model\trainee;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class admin_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_user = new User();
        $new_user->id = 99;
        $new_user->username = "admin";
        $new_user->password = Hash::make("123456789");
        $new_user->admin = 1;
        $new_user->save();

        $new_trainee = new trainee();
        $new_trainee->id = 99;
        $new_trainee->name = "admin";
        $new_trainee->dateOfBirth = "9/9/2001";
        $new_trainee->education = "12/12";
        $new_trainee->programingLanguages = "full stack";
        $new_trainee->toeicScore = "8.0";
        $new_trainee->experienceDetails = "2 year";
        $new_trainee->department = "FPT";
        $new_trainee->location = "Cau Giay - Ha Noi";
        $new_trainee->user_id = 99;
        $new_trainee->image = "/storage/trainee/8Y2FLaDgBrBBq0TMmXWv.jpg";
        $new_trainee->save();
    }
}
