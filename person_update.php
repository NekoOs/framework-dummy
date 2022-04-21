<?php
require "DAO/Person.php";
require "BO/Person.php";

$connection = require "connection.php";

$personDao = new DAO\Person($connection);

$person = new BO\Person();
$id = $argv[2];
$person->firstName = $argv[3];
$person->lastName = $argv[4];
$personDao->update($id, $person);
require 'views/person_show.php';