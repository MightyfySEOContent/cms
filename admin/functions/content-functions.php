<?php
function showAllPages($pdo)
{
    $showPages = 'SELECT `id`, `title`, `metadesc`, `metatitle`, `subtitle`, `img`, `url`, `phpfile`, `language`, `article`, `page`, `content`, `public`, `draft`, `cornerstone`, `alt` FROM `content` WHERE `page` = 1 AND `title` != "Seiten"';
    $pages = $pdo->query($showPages)->fetchAll(PDO::FETCH_ASSOC);
}
function showCornerstonePages($pdo)
{
    $showCornerstone = 'SELECT `id`, `title`, `metadesc`, `metatitle`, `subtitle`, `img`, `url`, `phpfile`, `language`, `article`, `page`, `content`, `public`, `draft`, `cornerstone`, `alt` FROM `content` WHERE `page` =1 AND `title` != "Seiten" AND `cornerstone` = 1 ';
    $cornerstone = $pdo->query($showCornerstone)->fetchAll(PDO::FETCH_ASSOC);
}
function showPublicPages($pdo)
{
    $showPublic = 'SELECT `id`, `title`, `metadesc`, `metatitle`, `subtitle`, `img`, `url`, `phpfile`, `language`, `article`, `page`, `content`, `public`, `draft`, `cornerstone`, `alt` FROM `content` WHERE `page` = 1 AND `title` != "Seiten" AND `public` = 1';
    $public = $pdo->query($showPublic)->fetchAll(PDO::FETCH_ASSOC);
}
function showDraftPages($pdo)
{
    $showDrafts = 'SELECT `id`, `title`, `metadesc`, `metatitle`, `subtitle`, `img`, `url`, `phpfile`, `language`, `article`, `page`, `content`, `public`, `draft`, `cornerstone`, `alt` FROM `content` WHERE `page` = 1 AND `title` != "Seiten" AND `draft` = 1';
    $drafts = $pdo->query($showDrafts)->fetchAll(PDO::FETCH_ASSOC);
}
function addPersonalisation($pdo)
{
    $insertSQL = 'INSERT INTO `additional`(styles, script, fonts, scriptcdn, stylecdn, fontcdn) VALUES(?,?,?,?,?,?)';
    if (isset($_POST['add_style'])) {
        $werte = [
            $_POST['stylesheet'],
            $_POST['javascript'],
            $_POST['fonts'],
            $_POST['cdn-style'],
            $_POST['cdn-script'],
            $_POST['cdn-font']
        ];
        $execute = $pdo->prepare($insertSQL);
        $execute->execute($werte);
        $stmt = $pdo->prepare('SELECT styles, script, fonts, scriptcdn, stylecdn, fontcdn FROM additional');
        $stmt->execute();


    }
}