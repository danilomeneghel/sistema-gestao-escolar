<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;

    protected $fillable = ['tipo', 'periodo'];

    public function nota()
    {
        return $this->hasMany(Nota::class, 'nota_id', 'id');
    }
}
