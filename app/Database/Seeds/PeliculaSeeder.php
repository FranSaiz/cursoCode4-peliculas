<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\PeliculaModel;


class PeliculaSeeder extends Seeder
{
    public function run()
    {
        //$this->db->table('categorias')->where('id >= ', 1)->delete();
        $peliculaModel = new PeliculaModel();
        $peliculaModel->where('id >= ', 1)->delete();

        for($i=1;$i<=20;$i++) {
            $peliculaModel->insert([
                'titulo' => 'tests Seeder '.$i,
                'descripcion' => 'tests Seeder '.$i
            ]);
        };
    }
}
