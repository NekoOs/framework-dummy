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

$person = new DAO\Person($connection);

if ($command == "person:create") {
    $new = new BO\Person();
    $new->firstName = $argv[2];
    $new->lastName = $argv[3];
    $person->create($new);
} elseif ($command == "person:show") {
    $id = $argv[2];
    var_dump($person->find($id));
} elseif ($command == "person:update") {
    $update = new \BO\Person();
    $id = $argv[2];
    $update->firstName = $argv[3];
    $update->lastName = $argv[4];
    $person->update($id, $update);
} elseif ($command == "company:create") {
    $company_name = $argv[2];
    create_company($connection, $company_name);
} else {
    echo "The command '$command' not found.".PHP_EOL;
}
