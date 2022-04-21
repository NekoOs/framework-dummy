<?php

namespace DAO;

class Person {
    private $connection;
    
    function __construct($connection) {
        $this->connection = $connection;
    }
    
    function create(\BO\Person $person)
    {
        pg_exec($this->connection, "insert into people(first_name, last_name) values ('$person->firstName', '$person->lastName')");
    }
    
    function find($id)
    {
        $resource = pg_exec($this->connection, "select * from people where id = '$id'");
        
        return pg_fetch_row($resource);
    }
    
    function update($id, \BO\Person $person)
    {
        pg_exec($this->connection, "update people set first_name='$person->firstName', last_name='$person->lastName' where id = '$id'");
    }
}