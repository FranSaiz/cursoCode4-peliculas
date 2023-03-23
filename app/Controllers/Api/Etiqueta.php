<?php

namespace App\Controllers\Api;
use CodeIgniter\RESTful\ResourceController;
use App\Models\ImagenModel;
use App\Models\PeliculaImagenModel;

class Etiqueta extends ResourceController{

    protected $modelName = 'App\Models\EtiquetaModel';
    protected $format = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null) {
        return $this->respond($this->model->find($id));
    }
    public function create() {
        
        if($this->validate('etiquetas')) {
            $id = $this->model->insert([
                'titulo' => $this->request->getPost('titulo'),
                'categoria_id' => $this->request->getPost('categoria_id'),
            ]);
        } else {
            return $this->respond($this->validator->getErrors(), 400);
        }
        return $this->respond($id);

    }
    public function update($id = null) {

        if($this->validate('etiquetas')) {
            
            $id = $this->model->update($id, [
                'titulo' => $this->request->getRawInput()['titulo'],
                'categoria_id' => $this->request->getRawInput()['categoria_id'],
            ]);        
        } else {
            
            if($this->validator->getError('titulo')) {
                return $this->respond($this->validator->getErrors('titulo'), 400);
            }
            if($this->validator->getError('descripcion')) {
                return $this->respond($this->validator->getErrors('descripcion'), 400);
            }

            //return $this->respond($this->validator->getErrors(), 400);
        }
        return $this->respond($id);
       
    }
    public function delete($id = null) {

        $this->model->delete($id);
        return $this->respond('ok');

    }
    private function upload($peliculaId) {
        helper('filesystem');

        if($imageFile = $this->request->getFile('imagen')) {
            //upload
            if($imageFile->isValid()) {
                $validated = $this->validate([
                    'uploaded[imagen]', 
                    'mime_in[imagen,image/jpg,image/gif,image/png]',
                    'max_size[imagen, 4096]' 
                ]);
                if($validated) {
                    $imageNombre = $imageFile->getRandomName();
                    $ext = $imageFile->guessExtension();

                    //$imageFile->move(WRITEPATH.'uploads/peliculas', $imageNombre);
                    $imageFile->move('../public/uploads/peliculas', $imageNombre);

                    $imagenModel = new ImagenModel();

                    $imagenId = $imagenModel->insert([
                        'imagen' => $imageNombre,
                        'extension' => $ext,
                        'data' => json_encode(get_file_info('../public/uploads/peliculas/'.$imageNombre))
                    ]);

                    $peliculaImagenModel = new PeliculaImagenModel();

                    $peliculaImagenModel->insert([
                        'imagen_id' => $imagenId,
                        'pelicula_id' => $peliculaId
                    ]);

                    return $this->respond('Imagen cargada');
                } 
            }

            
        }

        return $this->respond('Imagen requerida', 400);
    } 
}

?>