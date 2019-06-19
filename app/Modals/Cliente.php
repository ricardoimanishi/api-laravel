<?php

namespace App\Modals;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //Liberar acesso aos campos da tabela
    protected $fillable = [
        'nome', 'image', 'cpf_cnpj',
    ];
    
    //Regras para os campos
    public function rules()
    {
        return [
            'nome' => 'required',
            'image' => 'image',
            'cpf_cnpj' => 'required|unique:clientes'
        ];
    }
}
