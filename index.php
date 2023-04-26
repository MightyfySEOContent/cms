<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once __dir__ .'/config/dbconfig.php';
require_once __dir__ .'/functions/functions.php';

require_once('config/dbconfig.php');
require_once('templates/header.php');
$q = "SELECT `id`, `title`, `content`, `metadesc`, `metatitle`, `subtitle`, `img`, phpfile FROM `cms`.`pages` WHERE  `url`=:url";
$stmt = $pdo->prepare($q);
$stmt->execute([':url' => $_SERVER['REQUEST_URI']]);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $r) {
    require_once __dir__ . '/templates/' . $r['phpfile'];
}
if(count($result) == 0){
    echo 'Das hat nicht funktioniert. $result ist leer.';
} 

require_once('templates/footer.php');
echo 'ende';