<?php

namespace App\Modals;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    //Liberar acesso aos campos da tabela
    protected $fillable = [
        'cliente_id', 'cpf_cnpj'
    ];
    
    //Regras para os campos
    public function rules()
    {
        return [
            'cliente_id' => 'required',
            'cpf_cnpj' => 'required|unique:documentos'
        ];
    }
}
