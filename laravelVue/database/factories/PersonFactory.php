<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Person;
use App\Models\Car;

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
        $cars = Car::pluck('id')->toArray();

        return [
            'name' => $this->faker->name(12),
            'lastname' => $this->faker->lastName(12),
            'age' => $this->faker->numberBetween(18, 99),
            'email' => $this->faker->unique()->safeEmail(),
            'dni' => $this->faker->unique()->dni(9),
            'id_car' => $this->faker->unique()->randomElement($cars)
        ];
    }
}
