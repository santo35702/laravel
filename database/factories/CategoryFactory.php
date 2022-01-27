<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->words($nb=2,$asText=true);
        $slug = Str::of($name)->slug('-');
        return [
            'name' => $name,
            'slug' => $slug,
            'description' => $this->faker->text(250),
            'user_id' => $this->faker->numberBetween(1,5),
        ];
    }
}
