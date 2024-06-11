<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Daftar nama barang acak
        $itemNames = ['Aula', 'Kabel Olor', 'TV', 'Router', 'Printer', 'Remote AC', 'Remote TV'];

        // Ambil nama barang acak
        $itemName = $this->faker->randomElement($itemNames);

        // Buat item_id berdasarkan dua huruf awal dari item_name
        $itemId = strtoupper(substr($itemName, 0, 2)).$this->faker->unique()->numberBetween(1, 500);

        return [
            'item_id' => $itemId,
            'item_name' => $itemName,
            'amount' => $this->faker->randomNumber(2),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
