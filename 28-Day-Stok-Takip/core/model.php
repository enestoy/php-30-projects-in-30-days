<?php
class model
{
    public $db;
    public function __construct()
    {
        $this->db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8",DB_USERNAME,DB_PASSWORD);
    }


}