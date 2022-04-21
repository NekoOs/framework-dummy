<?php

namespace DAO;

class Company
{
    protected $connection;
    
    function __construct($connection)
    {
        $this->connection = $connection;
    }
    
    function create($company)
    {
        pg_exec($this->connection, "insert into company(name) values ('$company->name')");
    }
}