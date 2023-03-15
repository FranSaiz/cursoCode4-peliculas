<?php

namespace App\Controllers\Dashboard;
use App\Controllers\BaseController;
use App\Models\PeliculaModel;


class Pelicula extends BaseController{

    public function index() {
        $peliculaModel = new PeliculaModel();

        $db = \Config\Database::connect();
        $builder = $db->table('peliculas');

        //return $builder->limit(10,20)->getCompiledSelect();

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
            'pelicula' => new PeliculaModel()
        ]);
    }
    public function create() {
        
        if($this->validate('peliculas')) {
            $peliculaModel = new PeliculaModel();

            $peliculaModel->insert([
                'titulo' => $this->request->getPost('titulo'),
                'descripcion' => $this->request->getPost('descripcion')
            ]);
            
            return redirect()->to('/dashboard/Pelicula')->with('mensaje', 'Registro creado exitosamente');
        } else {
            session()->setFlashData([
                'validation' => $this->validator
            ]);

            return redirect()->back()->withInput();
        }
    }

    public function edit($id) {
        $peliculaModel = new PeliculaModel();


        echo view('dashboard/pelicula/edit', [
            'pelicula' => $peliculaModel->find($id)
        ]);
    }

    public function update($id) {

        if($this->validate('peliculas')) {
            $peliculaModel = new PeliculaModel();
            $peliculaModel->update($id, [
                'titulo' => $this->request->getPost('titulo'),
                'descripcion' => $this->request->getPost('descripcion')
            ]);        
        } else {
            session()->setFlashData([
                'validation' => $this->validator
            ]);

            return redirect()->back()->withInput();
        }

        return redirect()->to('/dashboard/Pelicula')->with('mensaje', 'Pelicula actualizada');
    }

    public function delete($id) {
        $peliculaModel = new PeliculaModel();
        $peliculaModel->delete($id);

        session()->setFlashData('mensaje', 'Registro eliminado');
        return redirect()->to('/dashboard/Pelicula');
    }
 
}