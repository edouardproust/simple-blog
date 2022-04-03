<?php

require_once dirname(__DIR__,2) . '/includes/init.php';

class BlogPDO extends PDO
{

    public function __construct()
    {
        $db_port = !empty(DB_PORT) ? ';port=' . DB_PORT : '';
        $db_dns = DB_TYPE . ':host=' . DB_HOST . $db_port . ';dbname=' . DB_NAME;
        parent::__construct($db_dns, DB_USERNAME, DB_PASSWORD, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);
    }
    public function pluralize(string $word)
    {
        switch ($word) {
            case 'post':
                return 'posts';
                break;
            case 'category':
                return 'categories';
                break;
            case 'author':
                return 'authors';
                break;
            default:
                return '';
        }
    }
}
