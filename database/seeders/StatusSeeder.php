<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            [
                'kodestatus' => '1',
                'namastatus' => 'Pending',
            ],
            [
                'kodestatus' => '2',
                'namastatus' => 'Approve',
            ],
            [
                'kodestatus' => '3',
                'namastatus' => 'Reject',
            ],
        ]);
    }
}
