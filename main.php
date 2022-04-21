<?php

$connection = @pg_connect("host=172.17.0.2 dbname=christian user=postgres password=123456");

$people_migration_result = @pg_exec($connection, "create table people(id serial, first_name varchar(50), last_name varchar(50))");
$company_migration_result = @pg_exec($connection, "create table company(id serial, name varchar(50))");

/*
 * php main.php "Company Name Example" "Neder" "Fandiño"
 * $argv[0] => "main.php"
 * $argv[1] => "Company Name Example"
 * $argv[2] => "Neder"
 * $argv[3] => "Fandiño"
 */

$company_name = $argv[1];
$person_first_name = $argv[2];
$person_last_name = $argv[3];

pg_exec($connection, "insert into company(name) values ('$company_name')");
pg_exec($connection, "insert into people(first_name, last_name) values ('$person_first_name', '$person_last_name')");