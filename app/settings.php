<?php
/**
 * Application settings and configuration
 */

return [
    'database' => [
        'host' => getenv('MYSQL_HOST'),
        'username' => getenv('MYSQL_USERNAME'),
        'password' => getenv('MYSQL_PASSWORD'),
        'dbname' => getenv('MYSQL_DATABASE'),
    ]
];