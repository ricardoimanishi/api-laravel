<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Modals\Telefone;
use App\Http\Controllers\MasterApiController;

class TelefoneApiController extends MasterApiController
{
    protected $model;
    protected $path;
    protected $upload;

    /**
     * Função construct recebe o Modal Cliente e o Request
     */
    public function __construct(Telefone $telefone, Request $request)
    {
        $this->model = $telefone;
        $this->request = $request;
    }

    public function cliente($id) 
    {
        $data = $this->model->with('cliente')->find($id);

        if (!$data) {
            return response()->json(['error' => 'Nada foi encontrado!'], 404);
        } else {
            return response()->json($data);
        }
    }
}
