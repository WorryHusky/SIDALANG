<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;
    use Uuid;

    protected $fillable = ['nm_kota', 'provinsi_id'];

    public function provinsi(){
        return $this->belongsTo(Provinsi::class);
    }
}
