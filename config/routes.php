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
    $routes->connect('/get_basic_info', ['controller' => 'Users', 'action' => 'getInfo']);
    
    $routes->connect('/setting', ['controller' => 'Setting', 'action' => 'index']);
    
    $routes->connect('/shop', ['controller' => 'shop', 'action' => 'index']);
    
    $routes->connect('/equipment', ['controller' => 'Equipment', 'action' => 'index']);
    
    $routes->connect('/polityka-prywatnosci', ['controller' => 'Pages', 'action' => 'privatePolicy']);
    
    $routes->connect('/change_item_place', ['controller' => 'shop', 'action' => 'changePlace']);
    $routes->connect('/purchase_item', ['controller' => 'shop', 'action' => 'purchaseItem']);
    $routes->connect('/sell_item', ['controller' => 'shop', 'action' => 'sellItem']);
    
    $routes->connect('/select_room', ['controller' => 'room', 'action' => 'select']);
    $routes->connect('/game/room_delivery', ['controller' => 'room', 'action' => 'room_delivery']);
    $routes->connect('/room/change_use', ['controller' => 'room', 'action' => 'changeUse']);
    
    $routes->connect('/getuuid', ['controller' => 'robol', 'action' => 'getuuid']);
    $routes->connect('/robol', ['controller' => 'robol', 'action' => 'robol']);
    
    $routes->fallbacks(DashedRoute::class);
});

Plugin::routes();
