<form action="" method="post">
    <label for="username">Benutzername eingeben</label>
    <input type="text" name="username" id="username">
    <label for="password">Passwort eingeben</label>
    <input type="password" name="password" id="password">
    <button type="submit" name="submit">Login</button>
</form> 

<?php
checkUser($pdo);
?>
