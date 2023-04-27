<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perkembangan extends Model
{
    protected $table = 'perkembangan';
    protected $guarded = ['id_perkembangan'];
    protected $primaryKey = 'id_perkembangan';
    use HasFactory;
}
