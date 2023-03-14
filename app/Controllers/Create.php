<?php

namespace App\Controllers;

use App\Models\PeliculaModel;

class Create extends BaseController
{
    public function index()
    {
        $peliculaModel = new PeliculaModel();

        //echo $peliculaModel->findAll()[0]['titulo'];

        echo view('index', [
            'nombreVariableVista' => 'Contenido',
            'nombreVariableVista2' => 'Contenido 2',
            'miArray' => [1,2,3,4],

            'peliculas' => $peliculaModel->findAll()
        ]);
    }
}
