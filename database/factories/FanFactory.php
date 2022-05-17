<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Fan;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fan>
 */
class FanFactory extends Factory
{


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Fan::class;

    public function definition()
    {
        return [
            'nomi' => $this->faker->name(),
            'syllabus' => $this->faker->companyEmail()
        ];
    }
}
