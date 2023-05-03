<?php
require_once __DIR__ . '/../config/dbconfig.php';
require_once __dir__.'/content-functions.php';
function createUrl($pdo)
{
    $q = "SELECT `id`, `title`, `content`, `img`, `phpfile`, `url` FROM `cms`.`pages` WHERE  `url`=:url";
    $stmt = $pdo->prepare($q);
    $stmt->execute([':url' => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $r) {
        require_once __DIR__ . '/../' . $r['phpfile'];
    }
}
function scanDirectory()
{
    $dir = 'modules';
    $files = scandir($dir);
    return $files;

}
function home($pdo)
{

    $q = "SELECT `id`, `title`, `content`, `img` FROM `cms`.`pages` WHERE  url = '" . $_SERVER['REQUEST_URI'] . "'";

    return $pdo->query($q)->fetchAll(PDO::FETCH_ASSOC);
}
// Admin Navigation
function adminNavigationList($adminNav)
{

    $html = '';
    foreach ($adminNav as $nav) {
        if ($nav['url'] != '/signup' && $nav['url'] != '/login') {
            $html .= '<li class="menu-item"><a href="' . $nav['url'] . '" class="menu-link">' . $nav['title'] . '</a></li>';
        }
    }
    return $html;
}

// Navigationsleiste User
function generateNavigationList($postResult)
{
    $html = '';
    foreach ($postResult as $nav) {
        if ($nav['url'] != '/impressum' && $nav['url'] != '/datenschutz') {
            $html .= '<li class="menu-item"><a href="' . $nav['url'] . '" class="menu-link">' . $nav['title'] . '</a></li>';
        }
    }
    return $html;
}

// Prüfen ob der Nutzer existiert
function checkUser($pdo)
{
    global $pagesResult;
    if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $pdo->prepare('SELECT id, username, password FROM `cms`.`user` WHERE username=:username');
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $userExists = $stmt->fetchAll();
        if (empty($userExists)) {
            echo 'Benutzername existiert nicht';
        } else {
            $passwordHashed = $userExists[0]['password'];
            $checkPassword = password_verify($password, $passwordHashed);
            if ($checkPassword == false) {
                echo 'Falsches Passwort eingegeben.';
            } else {
                header('location: ' . $pagesResult[2]['phpfile'] /*/../admin/index.php'*/);
                session_start();
                $_SESSION['id'] = $userExists[0]['id'];
            }

        }

    }

}


// Ist der Nutzer angemeldet?
function userLoggedIn($pdo)
{
    // Check if user is logged in
    if (!isset($_SESSION['id'])) {
        header('location: /login');
    }

}

// Nutzer ausloggen 
function userLogout()
{
    if (isset($_POST['submit'])) {
        session_destroy();
        header('location: /admin/modules/login');
    }
}
// Nutzer anlegen
function registerUser($username, $email, $password, $pdo)
{
    if (isset($_POST['absenden'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $stmt = $pdo->prepare('SELECT username, email, password FROM `cms`.`user` WHERE username=:username OR email=:email');

        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':email', $email);
        $stmt->execute();


    }
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare('INSERT INTO user(username, email, password) VALUES(:username, :email, :password)');
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);
    try {
        $stmt->execute();
        print('Registrierung erfolgreich. Bitte <a href="/login">einloggen</a>');
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            print('Benutzername oder E-Mail-Adresse ist bereits registriert.');
        } else {
            print('Fehler bei der Registrierung.');
        }
    }

}

// Account und Nutzer löschen
function accountDelete($pdo)
{
    if (isset($_POST['delete'])) {
        $username = $_SESSION['username'];
        $stmt = $pdo->prepare('DELETE FROM user WHERE username = :username');
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        session_destroy();
        header('Location: index.php');
        exit();
    }
}
function deleteUser($pdo)
{
    if (isset($_POST['delete'])) {
        $confirm = $_POST['confirm'];
        if ($confirm == 'delete') {
            $stmt = $pdo->prepare('DELETE FROM user WHERE id=:id');
            $stmt->bindParam(':id', $_SESSION['id']);
            $stmt->execute();

            header('location: /');
        } else {
            $error = 'Du musst "löschen" in das Feld eingeben, um dein Konto zu löschen.';
        }
    }

}
// Nutzerdaten ändern
function changeUser($pdo)
{
    // Update user data
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $corp = $_POST['firma'];
        $adresse = $_POST['adress'];
        $hausnummer = $_POST['hausnummer'];
        $postleitzahl = $_POST['postleitzahl'];
        $stmt = $pdo->prepare('UPDATE user SET username=:username, email=:email,firmenname=:firma, adress=:adress, hausnummer=:hausnummer, postleitzahl=:postleitzahl WHERE id=:id');

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':id', $_SESSION['id']);
        $stmt->bindParam(':firma', $corp);
        $stmt->bindParam(':adress', $adresse);
        $stmt->bindParam(':hausnummer', $hausnummer);
        $stmt->bindParam(':postleitzahl', $postleitzahl);
        $stmt->execute();

    }
}
// Neuen Beitrag erstellen
function newArticle($pdo)
{
    if (isset($_POST['create'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $metadesc = $_POST['metadesc'];
        $metatitle = $_POST['metatitle'];
        $subtitle = $_POST['subtitle'];
        $img = $_POST['img'];
        $url = $_POST['url'];
        $phpfile = $_POST['phpfile'];

        $sql = "INSERT IGNORE INTO `cms`.`content` WHERE `type` (`title`, `content`, `metadesc`, `metatitle`, `subtitle`, `img`, `url`, `phpfile`) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $save = $pdo->prepare($sql);
        $save->execute([$title, $content, $metadesc, $metatitle, $subtitle, $img, $url, $phpfile]);
    }

}
// Neue Seite erstellen
function newPage($pdo)
{
    if (isset($_POST['create'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $metadesc = $_POST['metadesc'];
        $metatitle = $_POST['metatitle'];
        $subtitle = $_POST['subtitle'];
        $img = $_POST['img'];
        $url = $_POST['url'];
        $phpfile = $_POST['phpfile'];

        $sql = "INSERT IGNORE INTO `cms`.`content` WHERE `type` (`title`, `content`, `metadesc`, `metatitle`, `subtitle`, `img`, `url`, `phpfile`) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $save = $pdo->prepare($sql);
        $save->execute([$title, $content, $metadesc, $metatitle, $subtitle, $img, $url, $phpfile]);
    }

}
