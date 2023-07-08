<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VentaModel>
 */
class VentaModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fecha'      =>$this->faker->dateTimeThisCentury->format('Y-m-d'),
            "cantidad"   =>$this->faker->numberBetween(1,10),
            "total"      =>$this->faker->numberBetween(1,10), 
            'idProducto' =>$this->faker->numberBetween(1,10),
        ];
    }
}
