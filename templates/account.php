<?php
// Check if user is logged in
if (!isset($_SESSION['id'])) {
    header('location: /login/');
}

// Get user data
$stmt = $pdo->prepare('SELECT id, username, email, password FROM user WHERE id=:id');
$stmt->bindParam(':id', $_SESSION['id']);
$stmt->execute();

$userData = $stmt->fetch(PDO::FETCH_ASSOC);
// Update user data
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $stmt = $pdo->prepare('UPDATE user SET username=:username, email=:email WHERE id=:id');
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':id', $_SESSION['id']);
    $stmt->execute();
    $success = 'Deine Daten wurden erfolgreich aktualisiert.';
    // Check if new username is available
    $userSearch = $pdo->prepare('SELECT id FROM user WHERE username = ? AND id != ?');
    $userSearch->execute([$username, $_SESSION['id']]);
    $userExists = $userSearch->fetch(PDO::FETCH_ASSOC);
    if ($userExists) {
        $error = 'Dieser Benutzername ist bereits vergeben.';
    }
}

?>
<h2>Daten</h2>
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
<form action="" method="post">
    <label for="username">Benutzername</label>
    <input type="text" name="username" id="username" value="<?php echo $userData['username'] ?>">
    <label for="email">E-Mail-Adresse</label>
    <input type="email" name="email" id="email" value="<?php echo $userData['email'] ?>">
    <button type="submit" name="submit">Daten aktualisieren</button>
    
</form>

<?php
// Check if user is logged in
if (!isset($_SESSION['id'])) {
    header('location: /login/');
}

// Get user data
$stmt = $pdo->prepare('SELECT id, username, email FROM user WHERE id=:id');
$stmt->bindParam(':id', $_SESSION['id']);
$stmt->execute();

$userData = $stmt->fetch(PDO::FETCH_ASSOC);

// Delete user account
if (isset($_POST['delete'])) {
    $confirm = $_POST['confirm'];
    if ($confirm == 'delete') {
        $stmt = $pdo->prepare('DELETE FROM user WHERE id=:id');
        $stmt->bindParam(':id', $_SESSION['id']);
        $stmt->execute();
        session_destroy();
        header('location: /');
    } else {
        $error = 'Du musst "löschen" in das Feld eingeben, um dein Konto zu löschen.';
    }
}

?>

<h2>Konto löschen</h2>
<p>Möchtest du wirklich dein Konto löschen? Alle deine Daten werden unwiderruflich gelöscht und du hast keinen Zugriff mehr darauf.</p>
<form action="" method="post">
    <label for="confirm">Bitte gib "löschen" ein, um zu bestätigen:</label>
    <input type="text" name="confirm" id="confirm">
    <?php if (isset($error)): ?>
        <p><?php echo $error ?></p>
    <?php endif; ?>
    <button type="submit" name="delete">Konto löschen</button>
</form>

