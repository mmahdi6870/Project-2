<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->word(),
            'slug' => fake()->slug(),
            'deskripsi' => fake()->sentence(4),
            'user_id' => 1,
            'harga' => random_int(3000, 7000),
            'image' => fake()->imageUrl(640, 480, 'animals', true),
            'category_id' => mt_rand(1, 3),
            'merek_id' => mt_rand(1, 5),
        ];
    }
}
