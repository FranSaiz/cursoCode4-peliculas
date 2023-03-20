<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\PeliculaModel;
use App\Models\CategoriaModel;


class PeliculaSeeder extends Seeder
{
    public function run()
    {
        //$this->db->table('categorias')->where('id >= ', 1)->delete();
        $peliculaModel = new PeliculaModel();
        $categoriaModel = new CategoriaModel();

        $categorias = $categoriaModel->limit(7)->findAll();

        $peliculaModel->where('id >= ', 1)->delete();

        foreach ($categorias as $c) {
            for($i=1;$i<=5;$i++) {
                $peliculaModel->insert([
                    'titulo' => 'tests Seeder '.$i,
                    'categoria_id' => $c->id, 
                    'descripcion' => 'tests Seeder '.$i
                ]);
            };
        }
    }
}
