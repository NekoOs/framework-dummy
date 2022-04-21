<?php

$connection = @pg_connect("host=172.17.0.2 dbname=christian user=postgres password=123456");

$result = @pg_exec($connection, "create table people(id serial, first_name varchar(50), last_name varchar(50))");

