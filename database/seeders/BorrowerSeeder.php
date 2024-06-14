<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BorrowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('borrowers')->insert([
            [
                'user' => 'Mahasiswa',
                'name' => 'Shayne',
                'items_name' => 'meja',
                'quantity' => 3,
                'startdate' => '2024-05-22',
                'enddate' => '2024-05-23',
                'guarantee' => 'ktp',
                'status_id' => 1,
            ],
            [
                'user' => 'Staff',
                'name' => 'Sandy',
                'items_name' => 'kursi',
                'quantity' => 3,
                'startdate' => '2024-05-24',
                'enddate' => '2024-05-27',
                'guarantee' => 'ktp',
                'status_id' => 2,
            ],
            [
                'user' => 'Mahasiswa',
                'name' => 'Shayne',
                'items_name' => 'meja',
                'quantity' => 3,
                'startdate' => '2024-05-22',
                'enddate' => '2024-05-23',
                'guarantee' => 'ktp',
                'status_id' => 3,
            ],
        ]);
    }
}
