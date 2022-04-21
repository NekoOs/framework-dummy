<?php


use Repositories\Company;
use Repositories\Person;

require "migrations.php";

$command = $_GET['option'];

require "functions.php";
require "Repositories/Company.php";
require "Repositories/Person.php";

if ($command == "person:create") {
    $controller = new Person();
    $controller->store([
        'firstName' => $_GET['firstName'],
        'lastName'  => $_GET['lastName'],
    ]);
} elseif ($command == "person:show") {
    $controller = new Person();
    $controller->show($_GET['id']);
} elseif ($command == "person:update") {
    $controller = new Person();
    $controller->update([
        'id'         => $_GET['id'],
        'firstName' => $_GET['firstName'],
        'lastName'  => $_GET['lastName'],
    ]);
} elseif ($command == "company:create") {
    $controller = new Company();
    $controller->store([
        'name' => $_GET['name']
    ]);
} else {
    echo "The command '$command' not found.".PHP_EOL;
}
