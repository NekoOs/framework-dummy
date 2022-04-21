<?php

function create_person($connection, $person_first_name, $person_last_name)
{
    pg_exec($connection, "insert into people(first_name, last_name) values ('$person_first_name', '$person_last_name')");
}

function create_company($connection, $company_name)
{
    pg_exec($connection, "insert into company(name) values ('$company_name')");
}