<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perizinan extends Model
{
    use HasFactory;
    protected $table = 'tb_perizinan';

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function perpanjangans()
    {
        return $this->hasMany(Perpanjangan::class, 'id_perizinan');
    }
    
}
