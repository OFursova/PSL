<?php

namespace Database\Factories;

use App\Models\LegalCase;
use Illuminate\Database\Eloquent\Factories\Factory;

class LegalCaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LegalCase::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name .' against '. $this->faker->name .' on '. $this->faker->sentence(5),
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->text(150),
            'start' => now(),
            'end' => null,
            'result' => null,
        ];
    }
}
