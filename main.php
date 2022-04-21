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
require "DAO/Person.php";
require "BO/Person.php";
require "DAO/Company.php";

$personDao = new DAO\Person($connection);
$companyDao = new DAO\Company($connection);

if ($command == "person:create") {
    $person = new BO\Person();
    $person->firstName = $argv[2];
    $person->lastName = $argv[3];
    $personDao->create($person);
    require 'views/person_show.php';
} elseif ($command == "person:show") {
    $id = $argv[2];
    var_dump($personDao->find($id));
} elseif ($command == "person:update") {
    $person = new \BO\Person();
    $id = $argv[2];
    $person->firstName = $argv[3];
    $person->lastName = $argv[4];
    $personDao->update($id, $person);
    require 'views/person_show.php';
} elseif ($command == "company:create") {
    $company = new \BO\Company();
    $company->name = $argv[2];
    $companyDao->create($connection, $company);
} else {
    echo "The command '$command' not found.".PHP_EOL;
}
