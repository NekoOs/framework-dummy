<?php

/**
 * execute in console "php -S <address>:<port> <path>"
 *
 * @example
 *         php -S localhost:8000 ./
 *         php -S 127.0.0.1:80 /var/www/html
 *         php -S 192.168.60.12:7635 C:\public_html
 *
 * php -S localhost:8025
 */

$connection = require "connection.php";

$people_migration_result = @pg_exec($connection, "create table people(id serial, first_name varchar(50), last_name varchar(50))");
$company_migration_result = @pg_exec($connection, "create table company(id serial, name varchar(50))");

/*
 * localhost:8025/web.php?option=person:create&first_name=First Name&last_name=Last Name
 * $_GET['option'] => "person:create"
 * $_GET['first_name'] => "First Name"
 * $_GET['last_name'] => "Last Name"
 */

/*
 * localhost:8025/web.ph?option=company:create&name=Name
 * $_GET['option'] => "company:create"
 * $_GET['name'] => "Name"
 */

$command = $_GET['option'];

require "functions.php";

if ($command == "person:create") {
    $person_first_name = $_GET['first_name'];
    $person_last_name = $_GET['last_name'];
    create_person($connection, $person_first_name, $person_last_name);
} elseif ($command == "company:create") {
    $company_name = $_GET['name'];
    create_company($connection, $company_name);
} else {
    echo "The command '$command' not found.".PHP_EOL;
}
