<?php

namespace Database\Seeders;

use App\SmToDo;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class sm_to_dosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_US');
        for ($i = 1; $i <= 5; $i++) {
            $store = new SmToDo();
            $store->todo_title = $faker->realText($maxNbChars = 30, $indexSize = 1);
            $store->date = $faker->dateTime()->format('Y-m-d');
            $store->created_by = 1;
            $store->created_at = date('Y-m-d h:i:s');
            $store->save();
        }
    }
}
