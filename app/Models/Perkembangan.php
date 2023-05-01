<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Perkembangan extends Model
{
    protected $table = 'perkembangan';
    protected $guarded = ['id_perkembangan'];
    protected $primaryKey = 'id_perkembangan';
    use HasFactory;
}
