
<aside>
    <ul>
        <li><a href="/pages">Seiten</a></li>
        <li><a href="/posts">Beiträge</a></li>
        <li><a href="/settings">Einstellungen</a></li>
        <li><a href="content.php">content</a></li>
    </ul>
</aside>

<?php
//Get user data

changeUser($pdo);

$success = 'Deine Daten wurden erfolgreich aktualisiert.';
// Check if new username is available
$userSearch = $pdo->prepare('SELECT id FROM user WHERE username = ? AND id != ?');
$userSearch->execute([$username, $_SESSION['id']]);
$userExists = $userSearch->fetch(PDO::FETCH_ASSOC);
if ($userExists) {
    $error = 'Dieser Benutzername ist bereits vergeben.';
}
$stmt = $pdo->prepare('SELECT id, username, email, password, adress, phone, postleitzahl, hausnummer, firmenname  FROM user WHERE id=:id');
$stmt->bindParam(':id', $_SESSION['id']);
$stmt->execute();
$userData = $stmt->fetch(PDO::FETCH_ASSOC);


?>
<main>
    <h2>Persönliche Daten</h2>
    <p>Zum Ändern einfach in das betreffende Feld klicken und Daten ändern.</p>
    <?php if (isset($error)): ?>
        <p>
            <?php echo $error ?>
        </p>
    <?php endif; ?>
    <?php if (isset($success)): ?>
        <p>
            <?php echo $success ?>
        </p>
    <?php endif; ?>
    <form action="" method="post" id="account-form">
        <label for="username">Benutzername</label>
        <input type="text" name="username" id="username" placeholder="<?php echo $userData['username'] ?>">
        <label for="password">Passwort</label>
        <input type="password" name="passwordChange" id="pwch" placeholder="<?php echo $userData['password']; ?>">
        <label for="email">E-Mail-Adresse</label>
        <input type="email" name="email" id="email" placeholder="<?php echo $userData['email'] ?>">
        <label for="firma">Firmenname</label>
        <input type="text" name="firma" id="firma" placeholder="<?php echo $userData['firmenname'] ?>">
        <label for="adress">Adresse</label>
        <input type="text" name="adress" id="adress" placeholder="<?php echo $userData['adress']; ?>">
        <label for="hausnummer">Hausnummer</label>
        <input type="number" name="hausnummer" id="hausnummer" placeholder="<?php echo $userData['hausnummer']; ?>">
        <label for="postleitzahl">Postleitzahl</label>
        <input type="number" name="postleitzahl" id="postleitzahl"
            placeholder="<?php echo $userData['postleitzahl']; ?>">
        <button type="submit" name="submit">Daten aktualisieren</button>
    </form>

    <?php
 
    // Delete user account
    deleteUser($pdo);
    ?>

    <h2>Konto löschen</h2>
    <p>Möchtest du wirklich dein Konto löschen? Alle deine Daten werden unwiderruflich gelöscht und du hast keinen
        Zugriff mehr darauf.</p>
    <form action="" method="post">
        <label for="confirm">Bitte gib "löschen" ein, um zu bestätigen:</label>
        <input type="text" name="confirm" id="confirm">
        <?php if (isset($error)): ?>
            <p>
                <?php echo $error ?>
            </p>
        <?php endif; ?>
        <button type="submit" name="delete">Konto löschen</button>
    </form>
</main>