<?php

namespace DAO;

class Person {
    private $connection;
    
    function __construct($connection) {
        $this->connection = $connection;
    }
    
    function create($person_first_name, $person_last_name)
    {
        pg_exec($this->connection, "insert into people(first_name, last_name) values ('$person_first_name', '$person_last_name')");
    }
    
    function find($id)
    {
        $resource = pg_exec($this->connection, "select * from people where id = '$id'");
        
        return pg_fetch_row($resource);
    }
    
    function update($id, $fields)
    {
        $first_name = $fields['first_name'];
        $last_name = $fields['last_name'];
        pg_exec($this->connection, "update people set first_name='$first_name', last_name='$last_name' where id = '$id'");
    }
}