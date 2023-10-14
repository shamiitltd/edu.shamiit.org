<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sm_events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event_title', 200)->nullable();
            $table->string('for_whom', 200)->nullable()->comment('teacher, student, parents, all');
            $table->string('event_location', 200)->nullable();
            $table->string('event_des', 500)->nullable();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->string('uplad_image_file', 200)->nullable();
            $table->tinyInteger('active_status')->default(1);
            $table->timestamps();



            $table->integer('created_by')->nullable()->default(1)->unsigned();

            $table->integer('updated_by')->nullable()->default(1)->unsigned();

            $table->integer('school_id')->nullable()->default(1)->unsigned();
            $table->foreign('school_id')->references('id')->on('sm_schools')->onDelete('cascade');

            $table->integer('academic_id')->nullable()->default(1)->unsigned();
            $table->foreign('academic_id')->references('id')->on('sm_academic_years')->onDelete('cascade');
        });
        DB::table('sm_events')->insert([
            [
                'event_title' => 'Biggest Robotics Competition in Campus',    //      1
                'event_location' => 'Main Campus',
                'event_des' => 'Get ready for the ultimate clash of machines! Our campus hosts the biggest robotics competition, where students showcase their innovation and engineering prowess in an electrifying showdown of robots. Don\'t miss this thrilling tech spectacle!',
                'from_date' => '2023-06-12',
                'to_date' => '2023-06-21',
                'uplad_image_file' => 'public/uploads/events/event1.jpg',
            ],
            [
                'event_title' => 'Great Science Fair in main campus',    //      1
                'event_location' => 'Main Campus',
                'event_des' => 'The Great Science Fair at the main campus is an exciting and educational event that showcases innovative and cutting-edge scientific projects and experiments created by students and researchers. It offers a platform for sharing and celebrating scientific achievements, sparking curiosity, and fostering a love for science in a fun and interactive environment.',
                'from_date' => '2023-06-12',
                'to_date' => '2023-06-21',
                'uplad_image_file' => 'public/uploads/events/event2.jpg',
            ],
            [
                'event_title' => 'Seminar on Internet of Thing in Campus',    //      1
                'event_location' => 'Main Campus',
                'event_des' => 'A campus seminar exploring the Internet of Things (IoT), delving into its applications, impact, and potential in the modern world. Learn about the interconnected world of smart devices, data, and innovation, all within the educational environment.',
                'from_date' => '2023-06-12',
                'to_date' => '2023-06-21',
                'uplad_image_file' => 'public/uploads/events/event3.jpg',
            ],
            [
                'event_title' => 'Art Competition in Campus',    //      1
                'event_location' => 'Main Campus',
                'event_des' => 'An exciting campus event where students showcase their creative talents and compete in various art forms, including painting, sculpture, and photography. It fosters artistic expression, encourages talent development, and builds a vibrant, artistic community on campus.',
                'from_date' => '2023-06-12',
                'to_date' => '2023-06-21',
                'uplad_image_file' => 'public/uploads/events/event4.jpg',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sm_events');
    }
}
