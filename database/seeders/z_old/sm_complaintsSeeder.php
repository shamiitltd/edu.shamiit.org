<?php

namespace Database\Seeders;

use App\SmComplaint;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class sm_complaintsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // SmComplaint::query()->truncate();
        $faker = Faker\Factory::create('en_US');;
        for ($i = 1; $i <= 3; $i++) {
            $j=11;
            $store = new SmComplaint();
            $store->complaint_by = $faker->name;
            $store->complaint_type = $j++;
            $store->complaint_source = $i;
            $store->phone = $faker->tollFreePhoneNumber;
            $store->date = $faker->dateTime()->format('Y-m-d');
            $store->description = $faker->realText($maxNbChars = 100, $indexSize = 1);
            $store->action_taken = $faker->word;
            $store->assigned = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $store->file = '';
            $store->created_by = 1;
            $store->created_at = date('Y-m-d h:i:s');
            $store->save();
        }
    }
}
