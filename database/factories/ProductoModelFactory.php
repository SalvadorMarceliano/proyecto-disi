<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductoModel>
 */
class ProductoModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    //FACTORY DE PRODUCTO
    public function definition()
    {
        return [
            'nombre'        =>$this->faker->name,
            'descripcion'   =>$this->faker->text,
            'precio'        =>$this->faker->randomDigit(2,2),
            'expiracion'    =>$this->faker->dateTimeThisCentury->format('Y-m-d'),
            'stock'         =>$this->faker->numberBetween(1,10),
        ];
    }
}
