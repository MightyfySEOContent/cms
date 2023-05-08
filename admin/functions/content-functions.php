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
    if (isset($_POST['add_style']) && !empty($_POST['value'])) {
        
        var_dump($_POST['value']);
        $insertSQL = 'INSERT INTO `additional`(type, value) VALUES(?,?)';
        $execute = $pdo->prepare($insertSQL);
        $execute->execute([$_POST['type'], $_POST['value']]);
        print_r($_POST);
        
        $stmt = $pdo->prepare('SELECT type, value FROM additional');
        $stmt->execute();
        echo 'Das hat funktioniert';
        
    } else{
        echo 'Das hat nicht geklappt';
    }

}