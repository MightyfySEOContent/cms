<?php

session_start();

$_SESSION['url'] = $_SERVER['REQUEST_URI'];

require_once __DIR__ . '/config/debug.php';
require_once __DIR__ . '/config/dbconfig.php';
require_once __DIR__ . '/functions/functions.php';
require_once __dir__ . '/functions/content-functions.php';
require_once __dir__ . '/modules/header.php';

if (!isset($_SESSION['id'])) {
    require_once __dir__ .'/modules/login.php';
    // header('location: /admin/modules/login.php');

} else {


createUrl($pdo);
require_once __dir__ .'/modules/content.php';

}


require_once __dir__ .'/modules/footer.php';
