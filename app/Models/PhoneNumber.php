<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    protected $table = 'phone_number';
    protected $fillable = [
        'phone_number',
        'siswa_id',
    ];

    public function siswas(){
        return $this->belongsTo(Siswas::class, "siswa_id");
    }
}
