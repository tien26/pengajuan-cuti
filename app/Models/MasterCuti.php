<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterCuti extends Model
{
    use HasFactory;

    protected $table = 'master_cuti';

    protected $fillable = ['user_id', 'sisa_cuti'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
