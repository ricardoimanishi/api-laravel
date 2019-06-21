<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\MasterApiController;
use App\Modals\Documento;

class DocumentoApiController extends MasterApiController
{
    protected $model;
    protected $path;
    protected $upload;

    /**
     * Função construct recebe o Modal Cliente e o Request
     */
    public function __construct(Documento $doc, Request $request)
    {
        $this->model = $doc;
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
