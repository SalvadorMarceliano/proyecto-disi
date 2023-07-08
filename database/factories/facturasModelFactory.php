<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class facturasModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'razonSocial'=>$this->faker->text,
            'rfc' =>Str::random(13),
            'idventa'=>$this->faker->numberBetween(1,20),
            'iva'=>$this->faker->numberBetween(10,300),
        ];
    }
}
