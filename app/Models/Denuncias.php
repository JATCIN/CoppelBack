<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denuncias extends Model
{
    use HasFactory;

    public function empresa()
    {
        return $this->belongsTo(Empresas::class);
    }
    
    public function pais()
    {
        return $this->belongsTo(Paises::class);
    }
    public function usuarios()
    {
        return $this->belongsTo(Usuarios::class);
    }
}
