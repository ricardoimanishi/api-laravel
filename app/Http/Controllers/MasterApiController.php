<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class MasterApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

   /**
     * Função para retornar todos os registros da tabela clientes
     */
    public function index()
    {
        $data = $this->model->all();
        return response()->json($data);
    }

    /**
     * Função para inserir um registro na tabela clientes
     */
    public function store(Request $request)
    {
        //valida os campos comforme regras do Modal Cliente
        $validator = $this->validate($request, $this->model->rules());

        //coloca na variavel $dataForm os dados recebidos pela request
        $dataForm = $request->all();

        //verifica se possui uma imagem e se ela é valida
        if ($request->hasFile($this->upload) && $request->file($this->upload)->isValid()) {
            //captura a extensão
            $extension = $request->image->extension();

            //determina o nome do arquivo
            $name = uniqid(date('His'));
            $nameFile = "{$name}.{$extension}";

            //Efetua o upload do arquivo de imagem
            $upload = Image::make($dataForm[$this->upload])->resize(177, 236)->save(storage_path("app/public/{$this->path}/{$nameFile}", 70));

            if (!$upload) {
                return response()->json(['error' => 'Falha ao fazer upload'], 500);
            } else {
                $dataForm[$this->upload] = $nameFile;
            }
        }

        $data = $this->model->create($dataForm);

        return response()->json($data, 201);
    }

    public function show($id)
    {
        $data = $this->model->find($id);

        if (!$data) {
            return response()->json(['error' => 'Nada foi encontrado!'], 404);
        } else {
            return response()->json($data);
        }
    }

    public function update(Request $request, $id)
    {
        $data = $this->model->find($id);
        if (!$data) {
            return response()->json(['error' => 'Nada foi atualizado!'], 404);
        }

         //valida os campos comforme regras do Modal Cliente
         $this->validate($request, $this->model->rules());

         //coloca na variavel $dataForm os dados recebidos pela request
         $dataForm = $request->all();
 
         //verifica se possui uma imagem e se ela é valida
         if ($request->hasFile($this->upload) && $request->file($this->upload)->isValid()) {

            if ($data->image) {
                Storage::disk('public')->delete("/{$this->path}/$data->image");
            }

             //captura a extensão
             $extension = $request->image->extension();
 
             //determina o nome do arquivo
             $name = uniqid(date('His'));
             $nameFile = "{$name}.{$extension}";
 
             //Efetua o upload do arquivo de imagem
             $upload = Image::make($dataForm[$this->upload])->resize(177, 236)->save(storage_path("app/public/{$this->path}/$nameFile", 70));
 
             if (!$upload) {
                 return response()->json(['error' => 'Falha ao fazer upload'], 500);
             } else {
                 $dataForm[$this->upload] = $nameFile;
             }
         }
 
         $data->update($dataForm);
 
         return response()->json($data);
    }

    public function destroy($id)
    {
        $data = $this->model->find($id);

        if (!$data) {
            return response()->json(['error' => 'Nada foi deletado!'], 404);
        } else {
            Storage::disk('public')->delete("/{$this->path}/$data->image");
        }
        $data->delete();

        return response()->json(['sucess' => 'Deletado com sucesso!']);
    }
}
