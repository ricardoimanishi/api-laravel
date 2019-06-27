<?php

namespace App\Modals;

use Illuminate\Database\Eloquent\Model;
use App\Modals\Cliente;
use App\Modals\Telefone;

class Telefone extends Model
{
    //Liberar acesso aos campos da tabela
    protected $fillable = [
        'cliente_id',
        'numero'
    ];
    
    //Regras para os campos
    public function rules()
    {
        return [
            'cliente_id' => 'required',
            'numero' => 'required'
        ];
    }

    public function telefone()
    { 
        return $this->hasMany(Telefone::class, 'cliente_id', 'id');
    }

    public function cliente()
    { 
        return $this->belongsto(Cliente::class, 'cliente_id', 'id');
    }
}
