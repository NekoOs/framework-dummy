<?php

$connection = require "connection.php";

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

$command = $argv[1];

require "functions.php";
require "DAO/Company.php";
require "Controllers/Person.php";

$companyDao = new DAO\Company($connection);

if ($command == "person:create") {
    $controller = new \Controllers\Person();
    $controller->store();
} elseif ($command == "person:show") {
    $controller = new \Controllers\Person();
    $controller->show();
} elseif ($command == "person:update") {
    $controller = new \Controllers\Person();
    $controller->update();
} elseif ($command == "company:create") {
    $company = new \BO\Company();
    $company->name = $argv[2];
    $companyDao->create($connection, $company);
} else {
    echo "The command '$command' not found.".PHP_EOL;
}
