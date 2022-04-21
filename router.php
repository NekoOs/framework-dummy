<?php


use Repositories\Company;
use Repositories\Person;

require "migrations.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$command = $_GET['option'];

$array = explode(':', $command);
$controller = $array[0];
$method = $array[1];

$routes = [
    'person' => Repositories\Person::class,
    'company' => Repositories\Company::class,
];

$class = $routes[$controller];


require "functions.php";
require "Repositories/Company.php";
require "Repositories/Person.php";

$controller = new $class;

if (method_exists($controller, $method)) {
    $controller->$method($_GET);
} else {
    echo "The command '$command' not found.".PHP_EOL;
}