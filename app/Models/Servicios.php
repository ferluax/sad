<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','nombre','categoria','descripcion','direccion','imagen'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
