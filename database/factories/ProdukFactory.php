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
            'name' => fake()->name(),
            'stok' => fake()->randomNumber(),
            'jenis' => fake()->randomElement(['makanan', 'minuman']),
            'deskripsi' => fake()->text(),
            'harga' => fake()->randomFloat(2, 0, 999999),
            'gambar' => fake()->imageUrl(),
            'discount' => fake()->randomFloat(2, 0, 99),
        ];
    }
}
