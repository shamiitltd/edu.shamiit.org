<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\SmStudent;
use App\SmLibraryMember;

class sm_library_membersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en');
      
        $studentList = SmStudent::where('class_id', 1)->get();
        foreach($studentList as $student){
            $s = new SmLibraryMember();
            $s->member_ud_id = $faker->unique()->randomNumber($nbDigits = NULL); 
            $s->member_type = $faker->numberBetween($min = 1, $max = 8);     
            $s->student_staff_id = $student->id;
            $s->active_status = 1;
            $s->school_id = 1;
            $s->created_at = date('Y-m-d h:i:s');
            $s->save();

        }
    }
}
