<?php
declare(strict_types=1);

use App\Core\DB;
use App\Core\Request;
use App\Core\Router;
use App\Utils\DependencyInjector;

require __DIR__ . '/config/bootstrap.php';

$di = new DependencyInjector();

$db = new DB();
$di->set('PDO', $db->getConnection());

$request = new Request();

$route = new Router($di);
echo $route->route($request);