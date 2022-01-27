<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->words($nb=4,$asText=true);
        $slug = Str::of($title)->slug('-');
        return [
            'title' => $title,
            'slug' => $slug,
            'short_description' => $this->faker->text(250),
            'description' => $this->faker->text(700),
            'regular_price' => $this->faker->numberBetween(100,500),
            'sku' => $this->faker->unique()->numberBetween(10001,11111) . '-' . Str::random(4),
            'stock_status' => 'instock',
            'quantity' => $this->faker->numberBetween(100,200),
            'image' => Str::slug('product image') . $this->faker->unique()->numberBetween(1,50) . '.jpg',
            'category_id' => $this->faker->numberBetween(1,9),
            'user_id' => $this->faker->numberBetween(1,5),
        ];
    }
}
