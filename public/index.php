<?php
/**
 * Created by PhpStorm.
 * User: ktv911
 * Date: 04.12.19
 * Time: 9:25
 */

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

use Base\Http\Request;
use Base\Http\Application;
use Base\Http\Router\Router;


$routes = [
    '/' => ['controller' => 'App\Controllers\HomeController', 'action' => 'index']
];


try {
    $request = new Request();
    $result = (new Router($request, $routes))->match();
    $response = (new Application($request, $result))->handle();
    $response->emit();
} catch (\Exception $e) {
    echo $e->getMessage();
}