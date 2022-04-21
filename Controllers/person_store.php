<?php
require "DAO/Person.php";
require "BO/Person.php";

$connection = require "connection.php";

$personDao = new DAO\Person($connection);

$person = new BO\Person();
$person->firstName = $argv[2];
$person->lastName = $argv[3];
$personDao->create($person);
require 'views/person_show.php';