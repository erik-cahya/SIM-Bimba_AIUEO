<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $guarded = ['id_user'];
    protected $primaryKey = 'id_user';
    use HasFactory;

    public function murid()
    {
        return $this->hasMany(Murid::class);
    }
}
