<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';
    protected $guarded = ['id_paket'];
    protected $primaryKey = 'id_paket';
    use HasFactory;

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }
}
