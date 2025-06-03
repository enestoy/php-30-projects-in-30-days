<?php 
const BASEDIR = 'D:/xampp/htdocs/education/php-30day-30project/13-Day-To-Do-List';
const URL = 'https://localhost/education/php-30day-30project/13-Day-To-Do-List/';

const DEV_MODE = true;

try {
    $db = new PDO('mysql:host=localhost;dbname=php_todolist;', 'root', '');
} catch (PDOException $e) {
    die("Veritabanı bağlantı hatası: " . $e->getMessage());
}
?>

