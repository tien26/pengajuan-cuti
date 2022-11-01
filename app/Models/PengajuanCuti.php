<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanCuti extends Model
{
    use HasFactory;

    protected $table = "pengajuan_cuti";
    protected $fillable = ['nomor', 'keterangan_karyawan', 'karyawan_id', 'awal', 'akhir', 'status', 'jumlah', 'keterangan_hrd', 'hrd_id', 'tgl_setuju'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'karyawan_id');
    }
}
