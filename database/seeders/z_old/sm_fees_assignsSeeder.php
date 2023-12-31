<?php

namespace Database\Seeders;

use App\SmFeesAssign;
use App\SmFeesMaster;
use App\SmStudent;
use Illuminate\Database\Seeder;

class sm_fees_assignsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        SmFeesAssign::query()->truncate();
        $students = SmStudent::where('active_status', 1)->where('class_id', 1)->get();
        foreach ($students as $student) {
            $val = 1 + rand() % 5;
            $fees_masters = SmFeesMaster::where('active_status', 1)->take($val)->get();
            foreach ($fees_masters as $fees_master) {
                $store = new SmFeesAssign();
                $store->student_id = $student->id;
                $store->fees_master_id = $fees_master->id;
                $store->save();
            }
        }
    }
}
