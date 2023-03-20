<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

$routes->group('api', ['namespace' => 'App\Controllers\Api'], function($routes) {
    $routes->resource('pelicula');
    $routes->resource('categoria');
});


$routes->group('dashboard', function($routes) {
    $routes->get('Pelicula/etiqueta/(:num)', 'Dashboard\Pelicula::etiquetas/$1', ['as' => 'pelicula.etiquetas']);
    $routes->post('Pelicula/etiqueta/(:num)', 'Dashboard\Pelicula::etiquetas_post/$1', ['as' => 'pelicula.etiquetas']);
    $routes->post('pelicula/(:num)/etiqueta/(:num)/delete', 'Dashboard\Pelicula::etiqueta_delete/$1/$2)', ['as' => 'pelicula.etiqueta_delete']);

    $routes->post('pelicula/imagen_delete/(:num)', 'Dashboard\Pelicula::borrar_imagen/$1)', ['as' => 'pelicula.borrar_imagen']);
    $routes->get('pelicula/imagen_descargar/(:num)', 'Dashboard\Pelicula::descargar_imagen/$1)', ['as' => 'pelicula.descargar_imagen']);

    $routes->presenter('Etiqueta', ['controller' => 'Dashboard\Etiqueta']);
    $routes->presenter('Pelicula', ['controller' => 'Dashboard\Pelicula']);
    $routes->presenter('Categoria', ['controller' => 'Dashboard\Categoria']/*, ['except' => ['index']]*/);
    /* $routes->get('Usuario/crear', '\App\Controllers\Web\Usuario::crearUsuario');
    $routes->get('Usuario/probar', '\App\Controllers\Web\Usuario::probarClave'); */
    //$routes->resource('Categoria', ['websafe' => 1]);
});

$routes->get('login', '\App\Controllers\Web\Usuario::login', ['as' => 'usuario.login']);
$routes->post('loginPost', '\App\Controllers\Web\Usuario::loginPost', ['as' => 'usuario.loginPost']);
$routes->get('register', '\App\Controllers\Web\Usuario::register', ['as' => 'usuario.register']);
$routes->post('registerPost', '\App\Controllers\Web\Usuario::registerPost', ['as' => 'usuario.registerPost']);
$routes->get('logout', '\App\Controllers\Web\Usuario::logout', ['as' => 'usuario.logout']);




// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true

$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
