<?php

namespace Database\Seeders;

use App\Models\MasterCuti;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MasterCuti::create([
            'user_id' => 2,
            'sisa_cuti' => 10
        ]);
    }
}
