<?php

namespace App\Modals;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //Liberar acesso aos campos da tabela
    protected $fillable = [
        'nome', 'image'
    ];
    
    //Regras para os campos
    public function rules()
    {
        return [
            'nome' => 'required',
            'image' => 'image'
        ];
    }
}
