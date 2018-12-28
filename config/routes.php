<?php
use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'home']);
    $routes->connect('/login', ['controller' => 'Pages', 'action' => 'logoutHome']);
    $routes->connect('/home', ['controller' => 'Pages', 'action' => 'loginHome']);
    
    $routes->connect('/fb', ['controller' => 'Users', 'action' => 'fb']);
    $routes->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);
    
    $routes->fallbacks(DashedRoute::class);
});

Plugin::routes();
