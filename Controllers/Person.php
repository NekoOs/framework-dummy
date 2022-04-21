<?php

namespace Controllers;

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
    
    function store()
    {
        global $argv;
        
        require "DAO/Person.php";
        require "BO/Person.php";
        
        $connection = require "connection.php";
        
        $personDao = new \DAO\Person($connection);
        
        $id = $argv[1];
        $person = $personDao->find($id);
        
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
        $person->firstName = $request['first_name'];
        $person->lastName = $request['last_name'];
        $personDao->update($id, $person);
        require 'views/person_show.php';
    }
}