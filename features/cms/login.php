<?php require_once '../config/dbconfig.php';


?>
<form method="post">
  <ul>
    <li>
      <label for="login">Benutzer</label>
      <input id="login" name="login">
    </li>
    <li>
      <label for="password">Passwort</label>
      <input id="pass" name="password" type="password">
    </li>
    <li>
      <input type="submit" value="Login">
    </li>
    <li>Kein Account? <a href="signup.php">Registrieren</li>
  </ul>
</form