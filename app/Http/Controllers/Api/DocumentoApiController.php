<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\MasterApiController;
use App\Modals\Documento;

class DocumentoApiController extends MasterApiController
{
    protected $model;

    /**
     * Função construct recebe o Modal Cliente e o Request
     */
    public function __construct(Documento $doc, Request $request)
    {
        $this->model = $doc;
        $this->request = $request;
    }
}
