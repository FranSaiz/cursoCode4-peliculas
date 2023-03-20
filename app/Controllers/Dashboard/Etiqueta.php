<?php

namespace App\Controllers\Dashboard;
use App\Controllers\BaseController;
use App\Models\EtiquetaModel;
use App\Models\CategoriaModel;


class Etiqueta extends BaseController{

    public function index() {
        $etiquetaModel = new EtiquetaModel();

        $data = [
            'etiquetas' => $etiquetaModel->select('etiquetas.*, categorias.titulo as categoria')->join('categorias', 'categorias.id = etiquetas.categoria_id')->find()
        ];

        echo view('dashboard/etiqueta/index', $data);
        
    }
    
    public function show($id) {
        $etiquetaModel = new EtiquetaModel();

        echo view('dashboard/etiqueta/show', [
            'etiqueta' => $etiquetaModel->find($id),
        ]);

        
    }

    public function new() {

        $categoriaModel = new CategoriaModel();


        echo view('dashboard/etiqueta/new', [
            'etiqueta' => new EtiquetaModel(),
            'categorias' => $categoriaModel->find()
        ]);
    }

    public function create() {
        
        if($this->validate('etiquetas')) {
            $etiquetaModel = new EtiquetaModel();

            $etiquetaModel->insert([
                'titulo' => $this->request->getPost('titulo'),
                'categoria_id' => $this->request->getPost('categoria_id'),
            ]);
            
            return redirect()->to('/dashboard/Etiqueta')->with('mensaje', 'Registro creado exitosamente');
        } else {
            session()->setFlashData([
                'validation' => $this->validator
            ]);

            return redirect()->back()->withInput();
        }
    }

    public function edit($id) {
        $etiquetaModel = new EtiquetaModel();
        $categoriaModel = new CategoriaModel();


        echo view('dashboard/etiqueta/edit', [
            'etiqueta' => $etiquetaModel->find($id),
            'categorias' => $categoriaModel->find()
        ]);
    }

    public function update($id) {

        if($this->validate('etiquetas')) {
            $etiquetaModel = new EtiquetaModel();
            $etiquetaModel->update($id, [
                'titulo' => $this->request->getPost('titulo'),
                'categoria_id' => $this->request->getPost('categoria_id')
            ]);        
        } else {
            session()->setFlashData([
                'validation' => $this->validator
            ]);

            return redirect()->back()->withInput();
        }

        return redirect()->to('/dashboard/Etiqueta')->with('mensaje', 'Etiqueta actualizada');
    }

    public function delete($id) {
        $etiquetaModel = new EtiquetaModel();
        $etiquetaModel->delete($id);

        session()->setFlashData('mensaje', 'Registro eliminado');
        return redirect()->to('/dashboard/Etiqueta');
    }
       
    
}