<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\CategoriaModel;
use App\Models\EtiquetaModel;

class EtiquetaSeeder extends Seeder
{
    public function run()
    {
        //$this->db->table('categorias')->where('id >= ', 1)->delete();
        $etiquetaModel = new EtiquetaModel();
        $categoriaModel = new CategoriaModel();

        $categorias = $categoriaModel->limit(7)->findAll();

        $etiquetaModel->where('id >= ', 1)->delete();

        foreach ($categorias as $c) {
            for($i=1;$i<=5;$i++) {
                $etiquetaModel->insert([
                    'titulo' => 'Tag '.$i.$c->titulo,
                    'categoria_id' => $c->id,                     
                ]);
            };
        }
    }
}
