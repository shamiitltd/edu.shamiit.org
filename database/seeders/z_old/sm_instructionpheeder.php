<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\SmInstruction;

class sm_instructionpheeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_US');
        for($i=1; $i<=5; $i++){
            $store= new SmInstruction();
            $store->title=$faker->word;
            $store->description=$faker->realText($maxNbChars = 200, $indexSize = 1);
            $store->school_id=1;
            $store->active_status=1;
            $store->created_by=1;
            $store->created_at = date('Y-m-d h:i:s');
            $store->save();
        }
    }
}
