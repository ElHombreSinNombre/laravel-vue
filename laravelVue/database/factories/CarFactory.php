<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Car;

class CarFactory extends Factory
{

    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $this->faker->addProvider(new \Faker\Provider\Fakecar($this->faker));
        $car = $this->faker->vehicleArray();

        return [
            'model' => $car['model'],
            'brand' => $car['brand'],
            'color' => $this->faker->hexColor(),
            'license' => $this->faker->vehicleRegistration,
            'image' => 'https://source.unsplash.com/random?car='.trim($car['brand']).'&'.trim($car['model']).'/800x600'
        ];
    }
}