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
require "Person.php";

$person = new Person($connection);

if ($command == "person:create") {
    $person_first_name = $argv[2];
    $person_last_name = $argv[3];
    $person->create($person_first_name, $person_last_name);
} elseif ($command == "person:show") {
    $id = $argv[2];
    var_dump($person->find($id));
} elseif ($command == "person:update") {
    $id = $argv[2];
    $person_first_name = $argv[3];
    $person_last_name = $argv[4];
    $person->update($id, ['first_name' => $person_first_name, 'last_name' => $person_last_name]);
} elseif ($command == "company:create") {
    $company_name = $argv[2];
    create_company($connection, $company_name);
} else {
    echo "The command '$command' not found.".PHP_EOL;
}
