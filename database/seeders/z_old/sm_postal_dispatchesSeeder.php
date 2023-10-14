<?php

namespace Database\Seeders;

use App\SmPostalDispatch;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class sm_postal_dispatchesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('en_US');;
        for ($i = 1; $i <= 5; $i++) {
            $store = new SmPostalDispatch();

            $store->to_title = $faker->name;
            $store->from_title = $faker->name;
            $store->reference_no = $faker->ean8;
            $store->address = $faker->address;
            $store->date = $faker->dateTime()->format('Y-m-d');
            $store->note = $faker->realText($maxNbChars = 100, $indexSize = 1);
            $store->file = '';
            $store->created_by=1;
            $store->created_at = date('Y-m-d h:i:s');
            $store->save();
        }
    }
}
