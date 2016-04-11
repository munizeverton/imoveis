<?php

namespace App\Http\Controllers;

use App\Services\ImovelService;

class AdminController extends Controller{

    private $imovelService;

    public function __construct(ImovelService $imovelService)
    {
        $this->imovelService = $imovelService;
    }

    public function index()
    {
        $imoveis = $this->imovelService->getList();
        return view('admin.index', compact('imoveis'));
    }

    public function createForm()
    {
        return view('admin.create-imovel');
    }

    public function updateForm($id)
    {
        $imovel =  $this->imovelService->get($id);
        return view('admin.update-imovel', ['imovel' => $imovel]);
    }

    public function delete($id)
    {
        $this->imovelService->delete($id);
        return \Redirect::to('/admin');
    }

}