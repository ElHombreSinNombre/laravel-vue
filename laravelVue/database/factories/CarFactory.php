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
        return [
            'model' => $this->faker->name(12),
            'brand' => $this->faker->lastName(12),
            'color' => $this->faker->hexColor(),
            'license' => $this->faker->unique()->bothify('#######'),
            'image' => 'https://source.unsplash.com/random?car/800x600'
            //'image' => 'https://source.unsplash.com/random?car='+ trim($v['brand'])+'&'+trim($v['model'])+'/800x600'
        ];
    }
}
