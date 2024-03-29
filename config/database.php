<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'mongodb'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

        'dbmedan' => [
            'driver' => 'mongodb',
            'host' => env('MONGO_MDN_DB_HOST'),
            'port'     => env('MONGO_MDN_DB_PORT'),
            'database' => env('MONGO_MDN_DB_DATABASE'),
            'username' => env('MONGO_MDN_DB_USERNAME'),
            'password' => env('MONGO_MDN_DB_PASSWORD'),
        ],
        'dbbatam' => [
            'driver' => 'mongodb',
            'host' => env('MONGO_BTM_DB_HOST'),
            'port'     => env('MONGO_BTM_DB_PORT'),
            'database' => env('MONGO_BTM_DB_DATABASE'),
            'username' => env('MONGO_BTM_DB_USERNAME'),
            'password' => env('MONGO_BTM_DB_PASSWORD'),
        ],
        'dbbengkulu' => [
            'driver' => 'mongodb',
            'host' => env('MONGO_BGL_DB_HOST'),
            'port'     => env('MONGO_BGL_DB_PORT'),
            'database' => env('MONGO_BGL_DB_DATABASE'),
            'username' => env('MONGO_BGL_DB_USERNAME'),
            'password' => env('MONGO_BGL_DB_PASSWORD'),
        ],
        'dbbinjai' => [
            'driver' => 'mongodb',
            'host' => env('MONGO_BJI_DB_HOST'),
            'port'     => env('MONGO_BJI_DB_PORT'),
            'database' => env('MONGO_BJI_DB_DATABASE'),
            'username' => env('MONGO_BJI_DB_USERNAME'),
            'password' => env('MONGO_BJI_DB_PASSWORD'),
        ],
        'dbdeliserdang' => [
            'driver' => 'mongodb',
            'host' => env('MONGO_DLS_DB_HOST'),
            'port'     => env('MONGO_DLS_DB_PORT'),
            'database' => env('MONGO_DLS_DB_DATABASE'),
            'username' => env('MONGO_DLS_DB_USERNAME'),
            'password' => env('MONGO_DLS_DB_PASSWORD'),
        ],
        'dbkaro' => [
            'driver' => 'mongodb',
            'host' => env('MONGO_KRO_DB_HOST'),
            'port'     => env('MONGO_KRO_DB_PORT'),
            'database' => env('MONGO_KRO_DB_DATABASE'),
            'username' => env('MONGO_KRO_DB_USERNAME'),
            'password' => env('MONGO_KRO_DB_PASSWORD'),
        ],
        'dbpekanbaru' => [
            'driver' => 'mongodb',
            'host' => env('MONGO_PKB_DB_HOST'),
            'port'     => env('MONGO_PKB_DB_PORT'),
            'database' => env('MONGO_PKB_DB_DATABASE'),
            'username' => env('MONGO_PKB_DB_USERNAME'),
            'password' => env('MONGO_PKB_DB_PASSWORD'),
        ],
        'dbpematangsiantar' => [
            'driver' => 'mongodb',
            'host' => env('MONGO_PMT_DB_HOST'),
            'port'     => env('MONGO_PMT_DB_PORT'),
            'database' => env('MONGO_PMT_DB_DATABASE'),
            'username' => env('MONGO_PMT_DB_USERNAME'),
            'password' => env('MONGO_PMT_DB_PASSWORD'),
        ],
        'dbsamosir' => [
            'driver' => 'mongodb',
            'host' => env('MONGO_SMS_DB_HOST'),
            'port'     => env('MONGO_SMS_DB_PORT'),
            'database' => env('MONGO_SMS_DB_DATABASE'),
            'username' => env('MONGO_SMS_DB_USERNAME'),
            'password' => env('MONGO_SMS_DB_PASSWORD'),
        ],
        'dbsimalungun' => [
            'driver' => 'mongodb',
            'host' => env('MONGO_SML_DB_HOST'),
            'port'     => env('MONGO_SML_DB_PORT'),
            'database' => env('MONGO_SML_DB_DATABASE'),
            'username' => env('MONGO_SML_DB_USERNAME'),
            'password' => env('MONGO_SML_DB_PASSWORD'),
        ],
        'dbtanjungpinang' => [
            'driver' => 'mongodb',
            'host' => env('MONGO_TJP_DB_HOST'),
            'port'     => env('MONGO_TJP_DB_PORT'),
            'database' => env('MONGO_TJP_DB_DATABASE'),
            'username' => env('MONGO_TJP_DB_USERNAME'),
            'password' => env('MONGO_TJP_DB_PASSWORD'),
        ],
        'dblangkat' => [
            'driver' => 'mongodb',
            'host' => env('MONGO_LGT_DB_HOST'),
            'port'     => env('MONGO_LGT_DB_PORT'),
            'database' => env('MONGO_LGT_DB_DATABASE'),
            'username' => env('MONGO_LGT_DB_USERNAME'),
            'password' => env('MONGO_LGT_DB_PASSWORD'),
        ],
        'dblabuanbatu' => [
            'driver' => 'mongodb',
            'host' => env('MONGO_LBB_DB_HOST'),
            'port'     => env('MONGO_LBB_DB_PORT'),
            'database' => env('MONGO_LBB_DB_DATABASE'),
            'username' => env('MONGO_LBB_DB_USERNAME'),
            'password' => env('MONGO_LBB_DB_PASSWORD'),
        ],
        'dbasahan' => [
            'driver' => 'mongodb',
            'host' => env('MONGO_ASA_DB_HOST'),
            'port'     => env('MONGO_ASA_DB_PORT'),
            'database' => env('MONGO_ASA_DB_DATABASE'),
            'username' => env('MONGO_ASA_DB_USERNAME'),
            'password' => env('MONGO_ASA_DB_PASSWORD'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];
