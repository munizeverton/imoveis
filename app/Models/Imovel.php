<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    protected $table = 'imoveis';

    protected $fillable = [
        'valor_aluguel',
        'endereco',
        'cidade',
        'estado',
        'descricao',
        'url_imagem',
    ];

}
