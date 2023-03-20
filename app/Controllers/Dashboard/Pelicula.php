<?php

namespace App\Controllers\Dashboard;
use App\Controllers\BaseController;
use App\Models\PeliculaModel;
use App\Models\CategoriaModel;
use App\Models\ImagenModel;
use App\Models\PeliculaImagenModel;
use App\Models\EtiquetaModel;
use App\Models\PeliculaEtiquetaModel;


class Pelicula extends BaseController{

    public function index() {
        $peliculaModel = new PeliculaModel();

        /* $db = \Config\Database::connect();
        $builder = $db->table('peliculas'); */

        //return $builder->limit(10,20)->getCompiledSelect();


        $data = [
            'peliculas' => $peliculaModel->select('peliculas.*, categorias.titulo as categoria')->join('categorias', 'categorias.id = peliculas.categoria_id')->find()
        ];

        echo view('dashboard/pelicula/index', $data);
        
    }
    
    public function show($id) {
        $peliculaModel = new PeliculaModel();
        $imagenModel = new ImagenModel();

        //var_dump($peliculaModel->getImagesById($id));
        //var_dump($imagenModel->getPeliculasById(2));

        echo view('dashboard/pelicula/show', [
            'pelicula' => $peliculaModel->find($id),
            'imagenes' => $peliculaModel->getImagesById($id),
            'etiquetas' => $peliculaModel->getEtiquetasById($id)
        ]);

        
    }

    public function new() {

        $categoriaModel = new CategoriaModel();


        echo view('dashboard/pelicula/new', [
            'pelicula' => new PeliculaModel(),
            'categorias' => $categoriaModel->find()
        ]);
    }

    public function create() {
        
        if($this->validate('peliculas')) {
            $peliculaModel = new PeliculaModel();

            $peliculaModel->insert([
                'titulo' => $this->request->getPost('titulo'),
                'descripcion' => $this->request->getPost('descripcion'),
                'categoria_id' => $this->request->getPost('categoria_id'),
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
        $categoriaModel = new CategoriaModel();


        echo view('dashboard/pelicula/edit', [
            'pelicula' => $peliculaModel->find($id),
            'categorias' => $categoriaModel->find()
        ]);
    }

    public function update($id) {

        if($this->validate('peliculas')) {
            $peliculaModel = new PeliculaModel();
            $peliculaModel->update($id, [
                'titulo' => $this->request->getPost('titulo'),
                'descripcion' => $this->request->getPost('descripcion'),
                'categoria_id' => $this->request->getPost('categoria_id')
            ]);  
            
            $this->asignar_imagen($id);
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
    public function descargar_imagen($imagenId){
        $imagenModel = new ImagenModel();

        $imagen = $imagenModel->find($imagenId);

        if($imagen == null) {
            return 'No existe la imágen';
        }

        $imageRuta = 'uploads/peliculas/' . $imagen->imagen;
        return $this->response->download($imageRuta, null)->setFileName('imagen.png');
    }
    public function borrar_imagen($imagenId) {
        $imagenModel = new ImagenModel();
        $peliculaImagenModel = new PeliculaImagenModel();

        

        $imagen = $imagenModel->find($imagenId);

        // borrar archivo
        if($imagen == null) {
            return 'No existe la imágen';
        } 

        $imageRuta = 'uploads/peliculas/' . $imagen->imagen;

        unlink($imageRuta);

        // borrar archivo
        $peliculaImagenModel->where('imagen_id', $imagenId)->delete();
        $imagenModel->delete($imagenId);


        return redirect()->back()->with('mensaje', 'Imagen eliminada'); 
    }
    private function asignar_imagen($peliculaId) {
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
                        'data' => 'Pendiente'
                    ]);

                    $peliculaImagenModel = new PeliculaImagenModel();

                    $peliculaImagenModel->insert([
                        'imagen_id' => $imagenId,
                        'pelicula_id' => $peliculaId
                    ]);
                } 
            }

            return $this->validator->listErrors();
        }
    } 
    
    public function etiquetas($id) {
        $categoriaModel = new CategoriaModel();
        $etiquetaModel = new EtiquetaModel();
        $peliculaModel = new PeliculaModel();

        $etiquetas = [];

        if($this->request->getGet('categoria_id')) {
            $etiquetas = $etiquetaModel
            ->where('categoria_id', $this->request->getGet('categoria_id'))
            ->findAll();
        }

        echo view('dashboard/pelicula/etiquetas', [
            'pelicula' => $peliculaModel->find($id),
            'categorias' => $categoriaModel->findAll(),
            'categoria_id' => $this->request->getGet('categoria_id'),
            'etiquetas' => $etiquetas,
        ]);

    }
    public function etiquetas_post($id) {
        $peliculaEtiquetaModel = new PeliculaEtiquetaModel();
     
        $etiquetaId = $this->request->getPost('etiqueta_id');
        $peliculaId = $id;

        $peliculaEtiqueta = $peliculaEtiquetaModel->where('etiqueta_id', $etiquetaId)->where('pelicula_id', $peliculaId)->first();

        if(!$peliculaEtiqueta) {
            $peliculaEtiquetaModel->insert([
                'pelicula_id' => $peliculaId,
                'etiqueta_id' => $etiquetaId
            ]);
        }

        return redirect()->back();
    }
    public function etiqueta_delete($id, $etiquetaId) {
        $peliculaEtiquetaModel = new PeliculaEtiquetaModel();

        $peliculaEtiquetaModel
        ->where('etiqueta_id', $etiquetaId)
        ->where('pelicula_id', $id)
        ->delete();

        echo '{"mensaje":"Eliminado"}';
        //return redirect()->back()->with('mensaje', 'Etiqueta eliminada');
    }
}