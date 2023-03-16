<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class Usuario extends BaseController
{
    public function crearUsuario() {
        $usuarioModel = new UsuarioModel();

        $usuarioModel->insert([
            'usuario' => 'admin1',
            'email' => 'admin1@gmail.com',
            'clave' => $usuarioModel->claveHash('12345')
        ]);
    }

    public function probarClave() {
        $usuarioModel = new UsuarioModel();
        
        if($usuarioModel->claveVerificar('12345', '$2y$10$q5qvheeRGdXt7EF29kbHF.8FfhfUuqtV/.juuTo/gk5Axut9XBFf6')) {
            echo "Usuario verificado";
        } else {
            echo "Error";
        }
    }
    public function login() {
        echo view('web/usuario/login');
    }
    public function loginPost() {
        $usuarioModel = new UsuarioModel();

        $email = $this->request->getPost('email'); //email o usuario
        $clave = $this->request->getPost('clave'); //contraseña

        $usuario = $usuarioModel->select('id,usuario,email,clave,tipo')
        ->orWhere('email', $email)
        ->orWhere('email', $email)
        ->first();

        if(!$usuario) {
            return redirect()->back()->with('mensaje', 'Usuario o contraseña inválidos');
        }

        if($usuarioModel->claveVerificar($clave, $usuario->clave)) {
            unset($usuario->clave);
            session()->set('usuario', $usuario);

            return redirect()->to('dashboard/Categoria')->with('mensaje', "Bienvenido $usuario->usuario");
        }
        return redirect()->back()->with('mensaje', 'Usuario o contraseña inválidos');
    }


    public function register() {
        echo view('web/usuario/register');
    }
    public function registerPost() {
        $usuarioModel = new UsuarioModel();

        if($this->validate('usuarios')) {
            $usuarioModel->insert([
                'usuario' => $this->request->getPost('usuario'),
                'email' => $this->request->getPost('email'),
                'clave' => $usuarioModel->claveHash($this->request->getPost('clave'))
            ]);

            return redirect()->to(route_to('usuario.login'))->with('mensaje', "Registro exitoso");
        } 
        
        session()->setFlashData([
            'validation' => $this->validator
        ]);

        return redirect()->back()->withInput();
    }
    public function logout() {
        session()->destroy();

        return redirect()->to(route_to('usuario.login'));
    }

}
