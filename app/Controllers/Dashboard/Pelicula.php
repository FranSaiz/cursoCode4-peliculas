<?php

namespace App\Controllers\Dashboard;
use App\Controllers\BaseController;
use App\Models\PeliculaModel;


class Pelicula extends BaseController{

    public function index() {
        
        
        $peliculaModel = new PeliculaModel();
        //echo $peliculaModel->findAll()[0]['titulo'];

        echo view('dashboard/pelicula/index', [
            'peliculas' => $peliculaModel->findAll()
        ]); 
        
    }
    public function show($id) {
        $peliculaModel = new PeliculaModel();

        echo view('dashboard/pelicula/show', [
            'pelicula' => $peliculaModel->find($id)
        ]);
    }
    public function new() {
        echo view('dashboard/pelicula/new', [
            'pelicula' => [
                'titulo' => '',
                'descripcion' => ''
            ]
        ]);
    }
    public function create() {
        $peliculaModel = new PeliculaModel();

        $peliculaModel->insert([
            'titulo' => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion')
        ]);
        
        return redirect()->to('/dashboard/Categoria')->with('mensaje', 'Registro creado exitosamente');
    }

    public function edit($id) {
        $peliculaModel = new PeliculaModel();


        echo view('dashboard/pelicula/edit', [
            'pelicula' => $peliculaModel->find($id)
        ]);
    }

    public function update($id) {
        $peliculaModel = new PeliculaModel();
        $peliculaModel->update($id, [
            'titulo' => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion')
        ]);

        //return redirect()->back();
        return redirect()->to('/dashboard/Pelicula');
    }

    public function delete($id) {
        $peliculaModel = new PeliculaModel();
        $peliculaModel->delete($id);

        session()->setFlashData('mensaje', 'Registro eliminado');
        return redirect()->to('/dashboard/Pelicula');
    }
 
}