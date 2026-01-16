<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hobbies extends Model
{
    protected $table = 'hobbies';

    protected $fillable = [
        'hobby'
    ];

    public function siswas()
    {
        return $this->belongsToMany(Siswas::class, 'hobby_siswa','hobby_id','siswa_id');
    }

}
