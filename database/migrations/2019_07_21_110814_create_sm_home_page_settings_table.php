<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\SmHomePageSetting;
class CreateSmHomePageSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sm_home_page_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',255)->nullable();
            $table->string('long_title',255)->nullable();
            $table->text('short_description')->nullable();
            $table->string('link_label',255)->nullable();
            $table->string('link_url',255)->nullable();
            $table->string('image',255)->nullable();
            $table->integer('school_id')->nullable()->default(1)->unsigned();
            $table->foreign('school_id')->references('id')->on('sm_schools')->onDelete('cascade');
            $table->timestamps();
        });

        $s = new SmHomePageSetting();
        $s->title = 'THE ULTIMATE EDUCATION ERP';
        $s->long_title = 'SHAMIIT';
        $s->short_description = 'Effortless Administrative Management with EDUSHAMIIT: Streamline all your administrative tasks in one place, saving you valuable time. Invest in your institute to boost productivity for the next generation and benefit society.';
        $s->link_label = 'Learn More About Us';
        $s->link_url = 'https://edu.shamiit.org/about';
        $s->image = 'public/backEnd/img/client/home-banner1.jpg';
        $s->save();
    } 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sm_home_page_settings');
    }
}
