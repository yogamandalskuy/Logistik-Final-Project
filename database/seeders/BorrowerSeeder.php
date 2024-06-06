<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'user'=> 'Mahasiswa',
                'name'=> 'Shayne',
                'itemsname'=> 'meja',
                'qty' => 3,
                'startdate' => '2024-05-22',
                'enddate' => '2024-05-23',
                'guarantee'=> 'ktp',
                'status_id' => 'PE'
            ],
            [
                'user'=> 'Staff',
                'name'=> 'Sandy',
                'itemsname'=> 'kursi',
                'qty' => 3,
                'startdate' => '2024-05-24',
                'enddate' => '2024-05-27',
                'guarantee'=> 'ktp',
                'status_id' => 'AP'
            ],
            [
                'user'=> 'Mahasiswa',
                'name'=> 'Shayne',
                'itemsname'=> 'meja',
                'qty' => 3,
                'startdate' => '2024-05-22',
                'enddate' => '2024-05-23',
                'guarantee'=> 'ktp',
                'status_id' => 'PE'
            ],
        ]);
    }
}
