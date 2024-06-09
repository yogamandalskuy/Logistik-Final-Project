<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('items')->insert([
        //     [
        //     'item_id' => 'KO',
        //     'item_name' => 'Kabel Olor',
        //     'amount' => 10,
        //     ],
        //     ]);
        item::factory()->count(10)->create();
    }
}
