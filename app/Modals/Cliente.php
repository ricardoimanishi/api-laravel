<?php

namespace App\Modals;

use Illuminate\Database\Eloquent\Model;
use App\Modals\Documento;

class Cliente extends Model
{
    //Liberar acesso aos campos da tabela
    protected $fillable = [
        'nome', 
        'image'
    ];

    //Regras para os campos
    public function rules()
    {
        return [
            'nome' => 'required',
            'image' => 'image'
        ];
    }

    public function arquivo($id)
    {
        $data = $this->find($id);
        return $data->image;
    }

    public function documento()
    { 
        return $this->hasOne(Documento::class, 'cliente_id', 'id');
    }
  
}
