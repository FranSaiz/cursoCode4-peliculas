<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\CategoriaModel;


class CategoriaSeeder extends Seeder
{
    public function run()
    {
        //$this->db->table('categorias')->where('id >= ', 1)->delete();
        $categoriaModel = new CategoriaModel();
        $categoriaModel->where('id >= ', 1)->delete();

        for($i=1;$i<=20;$i++) {
            $categoriaModel->insert([
                'titulo' => 'Categoría seed '.$i
            ]);
        };

    }
}
