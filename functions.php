<?php

function create_company($connection, $company_name)
{
    pg_exec($connection, "insert into company(name) values ('$company_name')");
}