<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankSampah extends Model
{
    use HasFactory;
    use Uuid;

    protected $fillable = [
        'nm_banks',
        'detail_lokasi',
        'provinsi_id',
        'kota_id',
        'kecamatan_id',
    ];

    public function provinsi(){
        return $this->belongsTo(Provinsi::class);
    }
    public function kota(){
        return $this->belongsTo(Kota::class);
    }
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }
}
