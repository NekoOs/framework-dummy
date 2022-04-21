<?php
require "DAO/Person.php";
require "BO/Person.php";

$connection = require "connection.php";

$personDao = new DAO\Person($connection);

$id = $argv[1];
$person = $personDao->find($id);

require 'views/person_show.php';