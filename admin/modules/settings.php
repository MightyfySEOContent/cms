<?php
// if(!isset($_SESSION['id'])){
//     header('location: login.php');
// }
echo $pagesResult[5]['content'];
 require_once __dir__ .'/../functions/content-functions.php'; require_once __dir__ .'/../config/dbconfig.php'; addPersonalisation($pdo);