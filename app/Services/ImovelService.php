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
        return $this->imovel->get()->all();
    }
}