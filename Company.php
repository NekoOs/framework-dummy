<?php

class Company
{
    protected $connection;
    
    function __construct($connection)
    {
        $this->connection = $connection;
    }
    
    function create($company_name)
    {
        pg_exec($this->connection, "insert into company(name) values ('$company_name')");
    }
}