<form action="" method="post">
    <label for="username">Benutzername eingeben</label>
    <input type="text" name="username" id="username">
    <label for="password">Passwort eingeben</label>
    <input type="password" name="password" id="password">
    <button type="submit" name="submit">Login</button>
</form> 

<?php

if(isset($_POST['submit'])){
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare('SELECT id, username, password FROM `cms`.`user` WHERE username=:username');
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $userExists = $stmt->fetchAll();
    if(empty($userExists)){
        echo 'Benutzername existiert nicht';
    } else {
        $passwordHashed = $userExists[0]['password'];
        $checkPassword = password_verify($password, $passwordHashed);
        if ($checkPassword == false) {
            echo 'Falsches Passwort eingegeben.';
        }
        if ($checkPassword == true) {
            header('Location: /account/');
            $_SESSION['id'] = $userExists[0]['id'];
        }
    }
}
?>
