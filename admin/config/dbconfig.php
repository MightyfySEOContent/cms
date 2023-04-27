<?php
$username = 'root';
$password = '';
$dsn = 'mysql:host=localhost;dbname=cms';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
$pdo = new PDO($dsn, $username, $password);

// Abfrage Datenbank für Templates
$pagesSQL = 'SELECT id, title, content, phpfile, url FROM pages';
$userContentSQL = 'SELECT  `id`,  `title`,  `metadesc`,  `metatitle`,  `subtitle`,  `img`, LEFT(`url`, 256),  `phpfile`,  `language`,  `article`,  `page`, LEFT(`content`, 256),  `public`,  `draft`,  `cornerstone`,  `alt` FROM `cms`.`content`';
$userSQL = 'SELECT id, username, password, email, adress, phone, postleitzahl, hausnummer, firmenname FROM user';
$adminNavigation = "SELECT id, title, content, img, url, phpfile FROM pages WHERE url LIKE '/admin/modules/%'";
// Register
$userSearch = $pdo->prepare('SELECT id FROM user WHERE username = ?');
$emailSearch = $pdo->prepare('SELECT id FROM user WHERE email = ?');
// Post und Page Requests
$postResult = $pdo->query($userContentSQL)->fetchAll(PDO::FETCH_ASSOC);
$pagesResult = $pdo->query($pagesSQL)->fetchAll(PDO::FETCH_ASSOC);
$adminNav = $pdo->query($adminNavigation)->fetchAll(PDO::FETCH_ASSOC);
// Bilder
$img = 'SELECT `id`, `name`, `path`, `alt`, `title`, `bilder`, `videos`, `dokument` FROM `cms`.`medien`';
$stmt = $pdo->prepare($img);
$stmt->execute();
$medien = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Dateien hochladen
$stmt = $pdo->prepare('INSERT INTO medien(name, path, alt, title, bilder, videos, dokument) VALUES(?,?,?,?,?,?,?)');




$q = "SELECT `id`, `title`, `content`, `img`, `phpfile`, `url` FROM `cms`.`pages` WHERE  `url`=:url";

$stmt = $pdo->prepare($q);

$stmt->execute([':url' => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)]);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Datenbank für nutzergenerierte Seiten
$userPosts = 'SELECT id, title, metatitle, metadesc, subtitle img, url, phpfile, article, page, content, public, draft, cornerstone, alt FROM `cms`.`content`';
$stmt = $pdo->prepare($userPosts);
$stmt->execute();
$userPostResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
