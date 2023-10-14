<?php

namespace Database\Factories;

use App\Models\Model;
use App\SmHomePageSetting;
use Illuminate\Database\Eloquent\Factories\Factory;

class SmHomePageSettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SmHomePageSetting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'THE ULTIMATE EDUCATION ERP',
            'long_title' => 'SHAMIIT',
            'short_description' => 'Effortless Administrative Management with EDUSHAMIIT: Streamline all your administrative tasks in one place, saving you valuable time. Invest in your institute to boost productivity for the next generation and benefit society.',
            'link_label' => 'Learn More About Us',
            'link_url' => 'https://edu.shamiit.org/about',
            'image' => 'public/backEnd/img/client/home-banner1.jpg',
        ];
    }
}
