<?php

namespace Controllers;

class Company
{
    public function create()
    {
        global $argv;
        $connection = require "connection.php";
        $companyDao = new DAO\Company($connection);
        $company = new \BO\Company();
        $company->name = $argv[2];
        $companyDao->create($connection, $company);
    }
}