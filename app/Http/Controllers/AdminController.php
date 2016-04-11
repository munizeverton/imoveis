<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImovelRequest;
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

    public function save(ImovelRequest $request)
    {
        $data = $request->all();
        if (isset($data['id'])){
            $this->imovelService->update($data['id'], $data);
            return redirect('/admin');
        }

        $this->imovelService->create($data);
        return redirect('/admin');
    }

    public function delete($id)
    {
        $this->imovelService->delete($id);
        return redirect('/admin');
    }

}