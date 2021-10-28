<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Person;

class PersonFactory extends Factory
{

    protected $model = Person::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(12),
            'lastname' => $this->faker->lastName(12),
            'age' => $this->faker->numerify('##'),
            'dni' => $this->faker->bothify('#######'),
        ];
    }
}
