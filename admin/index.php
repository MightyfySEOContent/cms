<?php
session_start();

var_dump(scandir('admin'));
$_SESSION['url'] = $_SERVER['REQUEST_URI'];

require_once __DIR__ . '/config/debug.php';
require_once __DIR__ . '/config/dbconfig.php';
require_once __DIR__ . '/functions/functions.php';
require_once __dir__ . '/modules/header.php';

if (!isset($_SESSION['id'])) {
    header('location: /admin/modules/login.php');
}


createUrl($pdo);

require_once('modules/footer.php');
echo 'ende';