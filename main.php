<?php

$connection = @pg_connect("host=172.17.0.2 dbname=christian user=postgres password=123456");

$people_migration_result = @pg_exec($connection, "create table people(id serial, first_name varchar(50), last_name varchar(50))");
$company_migration_result = @pg_exec($connection, "create table company(id serial, name varchar(50))");

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

function create_person($connection, $person_first_name, $person_last_name)
{
    pg_exec($connection, "insert into people(first_name, last_name) values ('$person_first_name', '$person_last_name')");
}

function create_company($connection, $company_name)
{
    pg_exec($connection, "insert into company(name) values ('$company_name')");
}

if ($command == "person:create") {
    $person_first_name = $argv[2];
    $person_last_name = $argv[3];
    create_person($connection, $person_first_name, $person_last_name);
} elseif ($command == "company:create") {
    $company_name = $argv[2];
    create_company($connection, $company_name);
} else {
    echo "The command '$command' not found.".PHP_EOL;
}
