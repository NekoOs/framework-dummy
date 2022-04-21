<?php

$connection = @pg_connect("host=172.17.0.2 dbname=christian user=postgres password=123456");

file_put_contents('database_log', "new connection create...");

return $connection;