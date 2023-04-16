<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perpanjangan extends Model
{
    use HasFactory;
    protected $table = 'tb_perpanjangan';

    public function perizinan()
    {
        return $this->belongsTo(Perizinan::class, 'id_perizinan');
    }

    public function dokumens()
    {
        return $this->hasMany(Dokumen::class, 'id_perpanjangan');
    }
}
