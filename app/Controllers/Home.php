<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo "Hola";
        return view('welcome_message');
    }
} 
