<?php

namespace Repositories;

class Company
{
    public function store($request)
    {
        $connection = require "connection.php";
        $companyDao = new \DAO\Company($connection);
        $company = new \BO\Company();
        $company->name = $request['name'];
        $companyDao->create($company);
    }
}