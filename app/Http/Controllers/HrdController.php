<?php

namespace App\Http\Controllers;

use App\Models\MasterCuti;
use App\Models\PengajuanCuti;
use Illuminate\Http\Request;

class HrdController extends Controller
{
    public function index()
    {
        $data = [
            'pengajuan' => PengajuanCuti::with('user')->get()
        ];
        return view('hrd', $data);
    }

    public function detail($id)
    {
        $data = [
            'pengajuan' => PengajuanCuti::findOrFail($id)
        ];
        return view('hrd-detail', $data);
    }

    public function update(Request $request, $id)
    {
        $data = PengajuanCuti::findOrFail($id);
        $find = MasterCuti::where('user_id', $data['karyawan_id'])->get()[0];
        $dataCuti = MasterCuti::findOrFail($find['id']);

        $sisa = $find['sisa_cuti'] - $data['jumlah'];

        $data->update([
            'status' => $request['status'],
            'keterangan_hrd' => $request['keterangan_hrd'],
            'hrd_id' => $request->user()->id,
            'tgl_setuju' => now(),
        ]);

        if ($request->status == 'setuju') {
            $dataCuti->update([
                'sisa_cuti' => $sisa
            ]);
        }

        return redirect('/hrd');
    }
}
