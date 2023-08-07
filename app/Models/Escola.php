<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    use HasFactory;

    /**
     * Define os campos que podem ser gravados
     * @var array
     */
    protected $fillable = ['nome','logradouro', 'numero', 'bairro', 'cidade', 'cep', 'estado'];
    

    public function turma()
    {
        return $this->hasMany(Turma::class, 'escola_id', 'id' );
    }
}
