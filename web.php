<?php

/**
 * execute in console "php -S <address>:<port> <path>"
 *
 * @example
 *         php -S localhost:8000 ./
 *         php -S 127.0.0.1:80 /var/www/html
 *         php -S 192.168.60.12:7635 C:\public_html
 *
 * php -S localhost:8025
 */


/*
 * localhost:8025/web.php?option=person:create&first_name=First Name&last_name=Last Name
 * $_GET['option'] => "person:create"
 * $_GET['first_name'] => "First Name"
 * $_GET['last_name'] => "Last Name"
 */

/*
 * localhost:8025/web.ph?option=company:create&name=Name
 * $_GET['option'] => "company:create"
 * $_GET['name'] => "Name"
 */

$command = $_GET['option'];
