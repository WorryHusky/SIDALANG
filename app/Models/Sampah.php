<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sampah extends Model
{
    use HasFactory;
    use Uuid;

    protected $fillable = [
        'nm_sampah',
        'kategori',
        'deskripsi',
        'point',
        'photo',
        'jenis_id',
    ];

    public function jenis(){
        return $this->belongsTo(JenisSampah::class);
    }

}
