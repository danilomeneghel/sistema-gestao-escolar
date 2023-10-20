<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = ['codigo', 'nome'];

    public function nota()
    {
        return $this->hasMany(Nota::class, 'nota_id', 'id');
    }
}
