<?php
require_once '../vendor/autoload.php';

use Phroute\Phroute\RouteCollector;
use Illuminate\Database\Capsule\Manager as Capsule;

// Punto de entrada a la aplicación
session_start();

$baseDir = str_replace(
    basename($_SERVER['SCRIPT_NAME']),
    '',
    $_SERVER['SCRIPT_NAME']);

$baseUrl = "http://" . $_SERVER['HTTP_HOST'] . $baseDir;
define('BASE_URL', $baseUrl);

if(file_exists(__DIR__.'/../.env')){
    $dotenv = new Dotenv\Dotenv(__DIR__.'/..');
    $dotenv->load();
}


// Instancia de Eloquent
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => getenv('DB_HOST'),
    'database'  => getenv('DB_NAME'),
    'username'  => getenv('DB_USER'),
    'password'  => getenv('DB_PASS'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$route = $_GET['route'] ?? "/";

$router = new RouteCollector();

// Filtro para aplicar a rutas a USUARIOS AUTENTICADOS
// en el sistema
$router->filter('auth', function(){
    if(!isset($_SESSION['userId'])){
        header('Location: '. BASE_URL);
        return false;
    }
});

$router->group(['before' => 'auth'], function ($router){
    $router->get('/decks/new', ['\App\Controllers\DecksController', 'getNew']);
    $router->post('/decks/new', ['\App\Controllers\DecksController', 'postNew']);
    $router->get('/decks/edit/{id}', ['\App\Controllers\DecksController', 'getEdit']);
    $router->put('/decks/edit/{id}', ['\App\Controllers\DecksController', 'putEdit']);
    $router->delete('/decks/', ['\App\Controllers\DecksController', 'deleteIndex']);
    $router->get('/logout', ['\App\Controllers\HomeController', 'getLogout']);
    $router->get('/cards/{id}', ['\App\Controllers\CardsController', 'getIndex']);
    $router->get('/cards', ['\App\Controllers\CardsController', 'getIndex']);
    $router->get('/cards/edit/{id}', ['\App\Controllers\CardsController', 'getEdit']);
    $router->put('/cards/edit/{id}', ['\App\Controllers\CardsController', 'putEdit']);
});

// Filtro para aplicar a rutas a USUARIOS NO AUTENTICADOS
// en el sistema
$router->filter('noAuth', function(){
    if( isset($_SESSION['userId'])){
        header('Location: '. BASE_URL);
        return false;
    }
});

$router->group(['before' => 'noAuth'], function ($router){
    $router->get('/login', ['\App\Controllers\HomeController', 'getLogin']);
    $router->post('/login', ['\App\Controllers\HomeController', 'postLogin']);
    $router->get('/registro', ['\App\Controllers\HomeController', 'getRegistro']);
    $router->post('/registro', ['\App\Controllers\HomeController', 'postRegistro']);
});

// Rutas sin filtros
$router->get('/',['\App\Controllers\HomeController', 'getIndex']);
//$router->post('/distros/{id}', ['\App\Controllers\DistrosController', 'postIndex']);
//$router->controller('api', \App\Controllers\ApiController::class);

//$router->controller('/', App\Controllers\HomeController::class);
//$router->controller('/decks', App\Controllers\DecksController::class);
//$router->controller('/cards', App\Controllers\CardsController::class);

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$method = $_REQUEST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$response = $dispatcher->dispatch($method, $route);

// Print out the value returned from the dispatched function
echo $response;