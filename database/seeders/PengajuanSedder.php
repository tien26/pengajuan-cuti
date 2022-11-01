<?php

namespace Database\Seeders;

use App\Models\PengajuanCuti;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengajuanSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bulan = date('m');
        $tahun = date('y');
        $id =  collect(PengajuanCuti::all())->max();
        if ($id == null) {
            $nomor = sprintf("%05d", 1);
        } else {
            $urutan = (int) substr($id['nomor'], 6, 5);
            $urutan++;
            $nomor = sprintf("%05d", $urutan);
        }
        $gabung = 'PC' . $tahun . $bulan . $nomor;

        PengajuanCuti::create([
            'nomor' => $gabung,
            'keterangan_karyawan' => 'liburan',
            'karyawan_id' => 2,
            'awal' => now(),
            'akhir' => now(),
            'status' => 'pending',
            'jumlah' => 2,
        ]);
    }
}
