<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HobbySiswa extends Model
{
    protected $table = 'hobby_siswa';

    public function siswa()
    {
        return $this->belongsTo(Siswas::class);
    }

    public function hobby()
    {
        return $this->belongsTo(Hobbies::class);
    }
}
