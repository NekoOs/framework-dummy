<?php

$connection = @pg_connect("host=172.17.0.2 dbname=christian user=postgres password=123456");

$people_migration_result = @pg_exec($connection, "create table people(id serial, first_name varchar(50), last_name varchar(50))");
$company_migration_result = @pg_exec($connection, "create table company(id serial, name varchar(50))");

