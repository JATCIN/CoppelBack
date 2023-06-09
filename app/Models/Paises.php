<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    use HasFactory;

    public function estados()
    {
        return $this->hasMany(Estados::class);
    }
    
    public function denuncias()
    {
        return $this->hasMany(Denuncias::class);
    }
}
