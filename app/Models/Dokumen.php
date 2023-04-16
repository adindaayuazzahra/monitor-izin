<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    
    use HasFactory;
    protected $table = 'tb_dokumen';

    public function perpanjangan()
    {
        return $this->belongsTo(Perpanjangan::class, 'id_perpanjangan');
    }
    
}
