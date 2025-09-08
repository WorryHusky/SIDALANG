<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use Uuid;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'email',
        'password',
        'photo',
        'api_token',
        'role',
        'point',
        'bank_id',
        'provinsi_id',
        'kota_id',
        'kecamatan_id',
    ];

    protected $appends = ['photo_url'];

    public function getPhotoUrlAttribute()
    {
        if(!$this->photo || !is_file(public_path('images/avatar/'.$this->photo))) {
            return asset('images/avatar/default.png');
        }
        return asset('images/avatar/'.$this->photo);
    }

    public function bank_sampah(){
        return $this->belongsTo(BankSampah::class);
    }
    public function provinsi(){
        return $this->belongsTo(Provinsi::class);
    }
    public function kota(){
        return $this->belongsTo(Kota::class);
    }
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
