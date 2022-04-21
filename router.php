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
    $controller->store($_GET);
} elseif ($command == "person:show") {
    $controller = new Person();
    $controller->show($_GET['id']);
} elseif ($command == "person:update") {
    $controller = new Person();
    $controller->update($_GET);
} elseif ($command == "company:create") {
    $controller = new Company();
    $controller->store($_GET);
} else {
    echo "The command '$command' not found.".PHP_EOL;
}
