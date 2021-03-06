<?php

namespace Repositories;

class Person
{
    function show($id)
    {
        require "DAO/Person.php";
        require "BO/Person.php";
    
        $connection = require "connection.php";
    
        $personDao = new \DAO\Person($connection);
    
        $person = $personDao->find($id);
    
        require 'views/person_show.php';
    }
    
    function store($request)
    {
        global $argv;
        
        require "DAO/Person.php";
        require "BO/Person.php";
        
        $connection = require "connection.php";
        
        $personDao = new \DAO\Person($connection);
        
        $id = $argv[1];
        $person = new \BO\Person();
        $person->firstName = $request['firstName'];
        $person->lastName = $request['lastName'];
        $personDao->create($person);
        
        require 'views/person_show.php';
    }
    
    function update($request)
    {
        require "DAO/Person.php";
        require "BO/Person.php";
    
        $connection = require "connection.php";
    
        $personDao = new \DAO\Person($connection);
    
        $person = new \BO\Person();
        $id = $request['id'];
        $person->firstName = $request['firstName'];
        $person->lastName = $request['lastName'];
        $personDao->update($id, $person);
        require 'views/person_show.php';
    }
}