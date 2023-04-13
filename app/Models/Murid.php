<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    protected $table = 'murid';
    protected $guarded = ['id_murid'];
    protected $primaryKey = 'id_murid';
    use HasFactory;
}
