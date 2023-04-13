<?php include '../templates/header.php';
require_once '../config/dbconfig.php';


?>

<h1>Neuen Account erstellen</h1>
<form method="post">
    <label for="username">Wähle deinen Benutzernamen</label>
    <input type="text" name="username" id="username" autocomplete="off">
    <label for="password">Passwort wählen</label>
    <input type="password" name="password" id="password" autocomplete="off">
    <label for="email">E-Mailadresse eigeben</label>
    <input type="email" name="email" id="email" autocomplete="off">
    <input type="submit" value="Registrieren">
</form>

<?php require_once '../templates/footer.php'; ?>