<form action="" method="post">
    <label for="username">Benutzername eingeben</label>
    <input type="text" name="username" id="username">
    <label for="password">Passwort eingeben</label>
    <input type="password" name="password" id="password">
    <button type="submit" name="submit">Login</button>
</form> 

<?php


// if (function_exists('checkUser()')) {
//     // die Funktion existiert, führe sie aus
//     checkUser($pdo);
//     echo $_SESSION['id'];}
// //   } else {
// //     // die Funktion existiert nicht, handle den Fehler
// //     echo 'Fehler: Funktion nicht verfügbar.';
   
// //   }
print_r(checkUser($pdo));
checkUser($pdo);


?>
