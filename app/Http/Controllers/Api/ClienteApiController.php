<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Modals\Cliente;
use App\Http\Controllers\MasterApiController;

class ClienteApiController extends MasterApiController
{
    protected $model;
    protected $path = 'clientes';
    protected $upload = 'image';

    /**
     * Função construct recebe o Modal Cliente e o Request
     */
    public function __construct(Cliente $clientes, Request $request)
    {
        $this->model = $clientes;
        $this->request = $request;
    }

    public function documento($id) 
    {
        $data = $this->model->with('documento')->find($id);

        if (!$data) {
            return response()->json(['error' => 'Nada foi encontrado!'], 404);
        } else {
            return response()->json($data);
        }
    }

    public function telefone($id) 
    {
        $data = $this->model->with('telefone')->find($id);

        if (!$data) {
            return response()->json(['error' => 'Nada foi encontrado!'], 404);
        } else {
            return response()->json($data);
        }
    }

    // /**
    //  * Função para retornar todos os registros da tabela clientes
    //  */
    // public function index()
    // {
    //     $data = $this->cliente->all();
    //     return response()->json($data);
    // }

    // /**
    //  * Função para inserir um registro na tabela clientes
    //  */
    // public function store(Request $request)
    // {
    //     //valida os campos comforme regras do Modal Cliente
    //     $validator = $this->validate($request, $this->cliente->rules());

    //     //coloca na variavel $dataForm os dados recebidos pela request
    //     $dataForm = $request->all();

    //     //verifica se possui uma imagem e se ela é valida
    //     if ($request->hasFile('image') && $request->file('image')->isValid()) {
    //         //captura a extensão
    //         $extension = $request->image->extension();

    //         //determina o nome do arquivo
    //         $name = uniqid(date('His'));
    //         $nameFile = "{$name}.{$extension}";

    //         //Efetua o upload do arquivo de imagem
    //         $upload = Image::make($dataForm['image'])->resize(177, 236)->save(storage_path("app/public/clientes/$nameFile", 70));

    //         if (!$upload) {
    //             return response()->json(['error' => 'Falha ao fazer upload'], 500);
    //         } else {
    //             $dataForm['image'] = $nameFile;
    //         }
    //     }

    //     $data = $this->cliente->create($dataForm);

    //     return response()->json($data, 201);
    // }

    // public function show($id)
    // {
    //     $data = $this->cliente->find($id);

    //     if (!$data) {
    //         return response()->json(['error' => 'Nada foi encontrado!'], 404);
    //     } else {
    //         return response()->json($data);
    //     }
    // }

    // public function update(Request $request, $id)
    // {
    //     $data = $this->cliente->find($id);
    //     if (!$data) {
    //         return response()->json(['error' => 'Nada foi atualizado!'], 404);
    //     }

    //      //valida os campos comforme regras do Modal Cliente
    //      $this->validate($request, $this->cliente->rules());

    //      //coloca na variavel $dataForm os dados recebidos pela request
    //      $dataForm = $request->all();
 
    //      //verifica se possui uma imagem e se ela é valida
    //      if ($request->hasFile('image') && $request->file('image')->isValid()) {

    //         if ($data->image) {
    //             Storage::disk('public')->delete("/clientes/$data->image");
    //         }

    //          //captura a extensão
    //          $extension = $request->image->extension();
 
    //          //determina o nome do arquivo
    //          $name = uniqid(date('His'));
    //          $nameFile = "{$name}.{$extension}";
 
    //          //Efetua o upload do arquivo de imagem
    //          $upload = Image::make($dataForm['image'])->resize(177, 236)->save(storage_path("app/public/clientes/$nameFile", 70));
 
    //          if (!$upload) {
    //              return response()->json(['error' => 'Falha ao fazer upload'], 500);
    //          } else {
    //              $dataForm['image'] = $nameFile;
    //          }
    //      }
 
    //      $data->update($dataForm);
 
    //      return response()->json($data);
    // }

    // public function destroy($id)
    // {
    //     $data = $this->cliente->find($id);

    //     if (!$data) {
    //         return response()->json(['error' => 'Nada foi deletado!'], 404);
    //     } else {
    //         Storage::disk('public')->delete("/clientes/$data->image");
    //     }
    //     $data->delete();

    //     return response()->json(['sucess' => 'Deletado com sucesso!']);
    // }
}
