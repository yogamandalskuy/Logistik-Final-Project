<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            [
            'Item_ID' => 'KO',
            'Items_Name' => 'Kabel Olor',
            'Amount' => 10,
            ],
            ]);
    }
}
