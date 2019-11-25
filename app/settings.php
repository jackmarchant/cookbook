<?php
/**
 * Application settings and configuration
 */

if (getenv('CLEARDB_DATABASE_URL')) {
    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $cleardb_server = $cleardb_url["host"];
    $cleardb_username = $cleardb_url["user"];
    $cleardb_password = $cleardb_url["pass"];
    $cleardb_db = substr($cleardb_url["path"],1);

    return [
        'database' => [
            'host' => $cleardb_server,
            'username' => $cleardb_username,
            'password' => $cleardb_password,
            'dbname' => $cleardb_db,
        ]
    ];
}

return [
    'database' => [
        'host' => getenv('MYSQL_HOST'),
        'username' => getenv('MYSQL_USERNAME'),
        'password' => getenv('MYSQL_PASSWORD'),
        'dbname' => getenv('MYSQL_DATABASE'),
    ]
];