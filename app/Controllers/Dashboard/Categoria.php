<?php

namespace App\Controllers\Dashboard;
use App\Controllers\BaseController;
use App\Models\CategoriaModel;


class Categoria extends BaseController
{
    public function index()
    {
        session()->set('key', 'value');
        $categoriaModel = new CategoriaModel();
        echo view('dashboard/categoria/index', [
            'categorias' => $categoriaModel->findAll()
        ]);
    }
    public function new() {
        //echo session()->get('key');

        echo view('dashboard/categoria/new', [
            'categoria' => [
                'titulo' => ''
            ]
        ]);
    }
    public function create() {
        $categoriaModel = new CategoriaModel();
        
        $categoriaModel->insert([
            'titulo' => $this->request->getPost('titulo')
        ]);
        
        return redirect()->to('/dashboard/Categoria')->with('mensaje', 'Registro creado exitosamente');

    }
    public function show($id) {
        

        $categoriaModel = new CategoriaModel();

        echo view('dashboard/categoria/show', [
            'categoria' => $categoriaModel->find($id)
        ]);
    }
    public function edit($id) {
        $categoriaModel = new CategoriaModel();

        echo view('dashboard/categoria/edit', [
            'categoria' => $categoriaModel->find($id)
        ]);
    }
    public function update($id) {
        $categoriaModel = new CategoriaModel();

        $categoriaModel->update($id, [
            'titulo' => $this->request->getPost('titulo')
        ]);

        return redirect()->back()->with('mensaje', 'Registro editado exitosamente');;
    }
    public function delete($id) {
        $categoriaModel = new CategoriaModel();

        $categoriaModel->delete($id);

        //return redirect()->back()->with('mensaje', 'Registro eliminado exitosamente');;
        session()->setFlashData('mensaje', 'Registro eliminado');
        return redirect()->back();
    }
}
