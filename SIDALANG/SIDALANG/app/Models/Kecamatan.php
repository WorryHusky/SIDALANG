<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    use Uuid;

    protected $fillable = ['nm_kecamatan', 'kota_id'];

    public function kota(){
        return $this->belongsTo(Kota::class);
    }
}
