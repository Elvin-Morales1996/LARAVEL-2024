<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{

   
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //poner los campos que quiero llenar en este caso es del curso
            'nombre' => $this->faker->sentence(),
            'descripcion' =>$this->faker->paragraph(),
            'categoria' => $this->faker->randomElement(['desarrollo web','java'])
        ];
    }
}
