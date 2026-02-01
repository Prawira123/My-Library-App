<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence(),
            'penulis' => $this->faker->name(),
            'penerbit' => $this->faker->company(),
            'tahun_terbit' => $this->faker->date(),
            'rating' => $this->faker->randomFloat(2, 1, 5),
            'deskripsi' => $this->faker->paragraph(),
            'kategori_id' => $this->faker->numberBetween(1, 10),
            'cover' => $this->faker->randomElement([
            'https://cdn.gramedia.com/uploads/items/filosofi_teras_hc.png',
            'https://penerbitbaca.com/wp-content/uploads/2023/10/The-Psychology-of-Money.jpg',
            'https://static.wixstatic.com/media/6a664b_354fe05f1d964cb2bf7929b917d3fbe4~mv2.jpg/v1/fill/w_1000,h_750,al_c,q_85,usm_0.66_1.00_0.01/6a664b_354fe05f1d964cb2bf7929b917d3fbe4~mv2.jpg']),
            'status' => $this->faker->randomElement(['aktif', 'tidak aktif']),
            'stok' => $this->faker->numberBetween(1, 20),
        ];
    }
}
