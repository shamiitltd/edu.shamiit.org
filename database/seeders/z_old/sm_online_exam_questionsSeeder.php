<?php

namespace Database\Seeders;

use App\SmOnlineExamQuestion;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class sm_online_exam_questionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Factory::create('en_US');
        // for($i=1; $i<=5; $i++){
        //     $store= new SmOnlineExamQuestion();
        //     $store->online_exam_id=$i;
        //     $store->type=1;
        //     $store->mark=20+$i;
        //     $store->title=$faker->realText($maxNbChars = 30, $indexSize = 1);
        //     $store->trueFalse='T';
        //     $store->suitable_words=$faker->realText($maxNbChars = 100, $indexSize = 1);
        //     $store->created_by=1;
        //     $store->created_at = date('Y-m-d h:i:s');
        //     $store->save();
        // }
    }
}
