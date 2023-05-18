<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlokasiMurid extends Model
{
    protected $table = 'alokasi_murid';
    protected $guarded = ['id_alokasi'];
    protected $primaryKey = 'id_alokasi';
    use HasFactory;
}
