<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str; //Necesario

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //DEBEMOS ESPECIFICAR EL TIPO DE DATO Y CON QUE 
        //TIPO DE INFORMACION SE LLENE

        //Hola-mundo como estas
        //hola-mundo-como-estas

        $name = $this->faker->unique()->word(20); //Genera un nuevo nombre

        return [
                'name' => $name,
                'slug' => Str::slug($name) //Este es el slug
        ];
    }
}
