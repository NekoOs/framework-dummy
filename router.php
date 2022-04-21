<?php


use Controllers\Company;
use Controllers\Person;

require "migrations.php";

/*
 * php main.php "person:create" "First Name" "Last Name"
 * $argv[0] => "main.php"
 * $argv[1] => "person:create"
 * $argv[2] => "First Name"
 * $argv[3] => "Last Name"
 */

/*
 * php main.php "company:create" "Name"
 * $argv[0] => "main.php"
 * $argv[1] => "company:create"
 * $argv[2] => "Name"
 */

$command = $argv[1] ?? $_GET['option'];

require "functions.php";
require "Controllers/Company.php";
require "Controllers/Person.php";


if ($command == "person:create") {
    $controller = new Person();
    $controller->store();
} elseif ($command == "person:show") {
    $controller = new Person();
    $controller->show($argv[2] ?? $_GET['id']);
} elseif ($command == "person:update") {
    $controller = new Person();
    $controller->update([
        'id'         => $argv[2] ?? $_GET['id'],
        'firstName' => $argv[3] ?? $_GET['firstName'],
        'lastName'  => $argv[4] ?? $_GET['lastName'],
    ]);
} elseif ($command == "company:create") {
    $controller = new Company();
    $controller->create();
} else {
    echo "The command '$command' not found.".PHP_EOL;
}
