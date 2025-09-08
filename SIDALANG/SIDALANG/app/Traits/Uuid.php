<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Uuid
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if ( ! $model->getKey()) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }

    public static function findByUuid($uuid, $rel=[])
    {
        return static::with($rel)->where('uuid', '=', $uuid)->first();
    }
}
