<?php
/**
 * Created by PhpStorm.
 * User: Everton
 * Date: 09/04/2016
 * Time: 23:13
 */

namespace App\Services;

use App\Models\Imovel;
use Aws\S3\S3Client;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use League\Flysystem\Filesystem;

class ImovelService
{
    private $imovel;

    public function __construct(ImagemService $imagemService)
    {
        $this->imovel = new Imovel();
        $this->imagemService = $imagemService;
    }

    public function getList()
    {
        try {
            $imoveis = $this->imovel->get()->all();
        } catch (\Exception $e){
            throw new \Exception('Occoreu um erro ao listar os imoveis');
        }

        return $imoveis;
    }

    public function get($id)
    {
        try {
            return $this->imovel->find($id);
        } catch (\Exception $e){
            throw new \Exception('Occoreu um erro ao buscar o imovel');
        }

    }

    public function create(array $data)
    {
        try {
            $data = $this->filter($data);
            return $this->imovel->create($data);
        } catch (\Exception $e) {
            throw new \Exception('Occoreu um erro ao salvar o imovel' . $e->getMessage());
        }
    }

    public function update($id, array $data)
    {
        try {
            $data = $this->filter($data);
            return $this->imovel->find($id)->update($data);
        } catch (\Exception $e) {
            throw new \Exception('Occoreu um erro ao atualizar o imovel');
        }
    }

    public function delete($id)
    {
        try {
            return $this->imovel->find($id)->delete();
        } catch (\Exception $e) {
            throw new \Exception('Occoreu um erro ao excluir o imovel');
        }
    }

    private function filter(array $data)
    {
        if (isset($data['valor_aluguel'])){
            $data['valor_aluguel'] = str_replace('.', '', $data['valor_aluguel']);
            $data['valor_aluguel'] = str_replace(',', '.', $data['valor_aluguel']);
        }

        if (isset($data['imagem'])){
            $this->imagemService->uploadImage($data['imagem']);
        }

        return $data;
    }
}