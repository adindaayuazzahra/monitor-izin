<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akta extends Model
{
    use HasFactory;
    protected $table = 'tb_akta';

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
