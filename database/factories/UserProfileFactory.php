<?php

namespace Database\Factories;

use App\Models\UserProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserProfile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'website' => $this->faker->randomElement(['https://laravel.com', 'https://certification.laravel.com', 'https://styde.net']),
            'job_title' => $this->faker->jobTitle,
        ];
    }
}
