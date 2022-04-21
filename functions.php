<?php

function create_person($connection, $person_first_name, $person_last_name)
{
    pg_exec($connection, "insert into people(first_name, last_name) values ('$person_first_name', '$person_last_name')");
}

function find_person($connection, $id)
{
    $resource = pg_exec($connection, "select * from people where id = '$id'");
    
    return pg_fetch_row($resource);
}

function update_person($connection, $id, $fields)
{
    $first_name = $fields['first_name'];
    $last_name = $fields['last_name'];
    pg_exec($connection, "update people set first_name='$first_name', last_name='$last_name' where id = '$id'");
}

function create_company($connection, $company_name)
{
    pg_exec($connection, "insert into company(name) values ('$company_name')");
}