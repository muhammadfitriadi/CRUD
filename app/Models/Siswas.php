<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswas extends Model
{
    protected $table = "siswas";
    protected $fillable = [
        "nama"
    ];

    public function phone_number()
    {
        return $this->hasMany(PhoneNumber::class);
    }

    public function hobbies()
    {
        return $this->belongsToMany(Hobbies::class, 'hobby_siswa','siswa_id',   'hobby_id'       );
    }

}
