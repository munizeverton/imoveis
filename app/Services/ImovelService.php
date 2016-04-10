<?php
/**
 * Created by PhpStorm.
 * User: Everton
 * Date: 09/04/2016
 * Time: 23:13
 */

namespace App\Services;


use App\Models\Imovel;

class ImovelService
{
    private $imovel;

    public function __construct()
    {
        $this->imovel = new Imovel();
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
}