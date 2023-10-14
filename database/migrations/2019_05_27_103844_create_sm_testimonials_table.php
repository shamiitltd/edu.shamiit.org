<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sm_testimonials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('designation');
            $table->string('institution_name');
            $table->string('image');
            $table->text('description');
            $table->timestamps();

            $table->integer('school_id')->nullable()->default(1)->unsigned();
            $table->foreign('school_id')->references('id')->on('sm_schools')->onDelete('cascade');
        });
        DB::table('sm_testimonials')->insert([
            [
                'name' => 'Mohd Tariq',
                'designation' => 'Chairman',
                'institution_name' => 'MBR',
                'image' => 'public/uploads/testimonial/testimonial_1.jpg',
                'description' => 'EDUSHAMIIT ERP has truly transformed our school\'s operations. Its comprehensive features have made managing everything from student records to administrative tasks a breeze. It\'s an indispensable tool that has simplified our daily routines and enhanced overall efficiency. We\'re incredibly satisfied with the results!',
                'created_at' => date('Y-m-d h:i:s')
            ],
            [
                'name' => 'Sheetal',
                'designation' => 'Principal',
                'institution_name' => 'JKS Public School',
                'image' => 'public/uploads/testimonial/testimonial_2.jpg',
                'description' => 'It\'s truly remarkable! EDUSHAMIIT boasts an array of additional features that exceed what one would typically anticipate in a comprehensive solution.',
                'created_at' => date('Y-m-d h:i:s')
            ],
        ]);
    }
    public function down()
    {
        Schema::dropIfExists('sm_testimonials');
    }
}
