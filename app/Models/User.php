<?php

namespace App\Models;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Uuid;

class User extends Model
{
    use SoftDeletes, Uuid;

    protected $fillable = [
        'uuid',
        'name',
        'email',
        'nik'
    ];

    protected $dates = ['deleted_at'];

    // public function setNikAttribute($value)
    // {
    //     $this->attributes['nik'] = Crypt::encryptString($value);
    // }

    // public function getNikAttribute($value)
    // {
    //     try {
    //         return Crypt::decryptString($value);
    //     } catch (\Exception $e) {
    //         return $value;
    //     }
    // }
}
