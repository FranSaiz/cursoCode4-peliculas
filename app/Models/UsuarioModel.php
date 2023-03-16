<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{

    protected $table            = 'usuarios';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['usuario', 'email', 'clave'];

    public function claveHash($claveHash) {

        return password_hash($claveHash, PASSWORD_DEFAULT);

    }

    public function claveVerificar($claveHash, $clavePlana) {
        
        return password_verify($claveHash, $clavePlana);

    }
}
