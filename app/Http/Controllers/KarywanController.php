<?php

namespace App\Http\Controllers;

use App\Models\MasterCuti;
use App\Models\PengajuanCuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isEmpty;

class KarywanController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'pengajuan' => PengajuanCuti::where('karyawan_id', $request->user()->id)->get()
        ];

        return view('karyawan-detail', $data);
    }

    public function create(Request $request)
    {
        $data = [
            'cuti' => MasterCuti::where('user_id', $request->user()->id)->get(),
            'cek' => PengajuanCuti::all()->where('karyawan_id', $request->user()->id)->whereIn('status', ['pending', 'tolak'])
        ];

        return view('karyawan', $data);
    }

    public function store(Request $request)
    {
        $awal = strtotime($request->awal);
        $akhir = strtotime($request->akhir);
        $hitung = $akhir - $awal;

        $hari = $hitung / 60 / 60 / 24 + 1;

        $cuti = MasterCuti::where('user_id', $request->user()->id)->get();

        if ($request->akhir < $request->awal || $cuti[0]->sisa_cuti < $hari) {
            return redirect('/karyawan');
        }

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
            'keterangan_karyawan' => $request->keterangan_karyawan,
            'karyawan_id' => $request->user()->id,
            'awal' => $request->awal,
            'akhir' => $request->akhir,
            'status' => 'pending',
            'jumlah' => $hari,
        ]);

        return redirect('/karyawan-detail');
    }

    public function edit(Request $request, $id)
    {
        $data = [
            'pengajuan' => PengajuanCuti::findOrFail($id),
            'cuti' => MasterCuti::where('user_id', $request->user()->id)->get(),
        ];
        return view('karyawan-edit', $data);
    }

    public function update(Request $request, $id)
    {
        $data = PengajuanCuti::findOrFail($id);

        $awal = strtotime($request->awal);
        $akhir = strtotime($request->akhir);

        $hitung = $akhir - $awal;

        $hari = $hitung / 60 / 60 / 24 + 1;

        $data->update([
            'keterangan_karyawan' => $request->keterangan_karyawan,
            'awal' => $request->awal,
            'akhir' => $request->akhir,
            'status' => 'pending',
            'jumlah' => $hari,
        ]);

        return redirect('/karyawan-detail');
    }
}
