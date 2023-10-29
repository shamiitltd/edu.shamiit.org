<?php

namespace Database\Factories;

use App\Models\Model;
use App\SmStudent;
use Illuminate\Database\Eloquent\Factories\Factory;

class SmStudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SmStudent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public $i=1;
    public function definition()
    {
        $i=$this->i++;
        return [   
                'admission_no'            => $this->faker->numberBetween($min = 10000, $max = 90000),
                'roll_no'                 => $this->faker->numberBetween($min = 10000, $max = 90000),          
                'student_category_id'     => 1,  
                'session_id'              => 1,
                'caste'                   => 'Asian',
                'bloodgroup_id'           => 3,
                //transport section
                'religion_id'             => rand(1,2),
                'height'                  => 56,
                'weight'                  => 45,

                'first_name'              => $this->faker->firstNameMale,
                'last_name'               => $this->faker->lastName,
                'full_name'               => $this->faker->userName,

                'date_of_birth'           => $this->faker->date($format = 'Y-m-d', $max = 'now'),
                'admission_date'          => $this->faker->date($format = 'Y-m-d', $max = 'now'),

                'gender_id'               =>1,
                'role_id'                 =>2,
                'email'                   =>  'student_'. uniqid() .'@edu.shamiit.org',
                'mobile'                  => '+919548450539' . $i,
                'bank_account_no'         => '+919548450539' . $i,

                'bank_name'               => 'DBBL',               
                'current_address'         => 'Bharat',
                'previous_school_details' => 'Bharat',
                'aditional_notes'         => 'Bharat',

                'permanent_address'       => 'Bharat',
                'created_at' => date('Y-m-d h:i:s')
        ];
    }
}
