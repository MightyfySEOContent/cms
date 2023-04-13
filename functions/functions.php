<?php
require_once __dir__ .'/../config/dbconfig.php';
function home($pdo){
    
    $q = "SELECT `id`, `title`, `content`, `metadesc`, `metatitle`, `subtitle`, `img` FROM `cms`.`pages` WHERE  url = '".$_SERVER['REQUEST_URI']."'";

    return $pdo->query($q)->fetchAll(PDO::FETCH_ASSOC);
}

function registerUser($username, $email, $password, $pdo){
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare('INSERT INTO user(username, email, password) VALUES(:username, :email, :password)');
    $stmt->bindParam(':username', $username); 
    $stmt->bindParam(':email', $email); 
    $stmt->bindParam(':password', $hashed_password); 
    try {
    $stmt->execute();
    print('Registrierung erfolgreich. Bitte <a href="/login/">einloggen</a>');
    } catch(PDOException $e) {
    if ($e->getCode() == 23000) {
    print('Benutzername oder E-Mail-Adresse ist bereits registriert.');
    } else {
    print('Fehler bei der Registrierung.');
    }
    }
    }
    function accountDelete($pdo){
        if(isset($_POST['delete'])) {
            $username = $_SESSION['username'];
            $stmt = $pdo->prepare('DELETE FROM user WHERE username = :username');
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            session_destroy();
            header('Location: index.php');
            exit();
        }
    }
    
    