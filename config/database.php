return[
'default' => 'mysql',
'connections' => [
'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', 'db4free.net'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'dndteam10'),
            'username' => env('DB_USERNAME', 'dndteam10'),
            'password' => env('DB_PASSWORD', 'mohammad'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
		]
		]