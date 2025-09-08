<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSampah extends Model
{
    use HasFactory;
    use Uuid;

    protected $fillable = ['jenis_sampah'];

    public function sampah() {
        return $this->hasMany(Sampah::class, 'jenis_id');
        
    }

}
