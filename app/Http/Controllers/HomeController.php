<?php

namespace App\Http\Controllers;

use App\Services\ImagemService;
use App\Services\ImovelService;

class HomeController extends Controller{

    public function index()
    {
        $imovelService = new ImovelService(new ImagemService());
        $imoveis = $imovelService->getList();
        return view('home.index', compact('imoveis'));
    }

    public function viewImovel($id)
    {
        $imovelService = new ImovelService();
        $imovel = $imovelService->get($id);
        return view('home.view', ['imovel' => $imovel]);
    }

}