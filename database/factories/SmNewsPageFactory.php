<?php

namespace Database\Factories;

use App\Models\Model;
use App\SmNewsPage;
use Illuminate\Database\Eloquent\Factories\Factory;

class SmNewsPageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SmNewsPage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'News SHAMIIT',
            'description' => 'Discover exciting updates, latest events, and valuable resources. Stay connected and stay informed as we continue our journey of education and excellence.',
            'image' => 'public/uploads/about_page/about.jpg',
            'button_text' => 'Learn More News ',
            'button_url' => 'news-page',
            'main_title'=>'Under Graduate Education',
            'main_description'=>'SHAMIIT has all in one place. You’ll find everything what you are looking into education management system software. We care! User will never bothered in our real eye catchy user friendly UI & UX  Interface design. You know! Smart Idea always comes to well planners. And Our SHAMIIT is Smart for its Well Documentation. Explore in new support world! It’s now faster & quicker. You’ll find us on Support Ticket, Email, Skype, WhatsApp.',
            'main_image'=>'public/uploads/about_page/about-img.jpg',
        ];
    }
}
