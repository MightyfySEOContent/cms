<?php
$username = 'root';
$password = '';
$dsn = 'mysql:host=localhost;dbname=cms';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
$pdo = new PDO($dsn, $username, $password);

// Abfrage Datenbank für Templates
$pagesSQL = 'SELECT id, title, content, metatitle, metadesc, subtitle FROM pages';
$postsSQL = 'SELECT id, title, content, metatitle, metadesc FROM posts';
$userSQL = 'SELECT username, password, email FROM user';
// Register
$userSearch = $pdo->prepare('SELECT id FROM user WHERE username = ?');
$emailSearch = $pdo->prepare('SELECT id FROM user WHERE email = ?');
// Post und Page Requests
$postResult = $pdo->query($postsSQL)->fetchAll(PDO::FETCH_ASSOC);
$pagesResult = $pdo->query($pagesSQL)->fetchAll(PDO::FETCH_ASSOC);
// Bilder
$img = 'SELECT id, name, path, alt, title FROM bilder';
