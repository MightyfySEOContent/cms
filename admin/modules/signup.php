<div id="signup">
    <form action="" method="post">
        <input type="text" name="username" id="username" placeholder="Benutzername">
        <input type="email" name="email" id="email" placeholder="E-Mail Adresse">
        <input type="password" name="password" id="password" placeholder="Passwort">
        <button type="submit" name="absenden" value="Absenden">Absenden
        </button>
    </form>
</div>

<!-- <?php
echo $xyr3;
if(isset($_POST['absenden'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    
    $stmt = $pdo->prepare('SELECT username, email, password FROM `cms`.`user` WHERE username=:username OR email=:email');

    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':email', $email);
    $stmt->execute();

    $userAlreadyExists = $stmt->fetchColumn();
    if(!$userAlreadyExists){
        // registrieren
        registerUser($username, $email, $password, $pdo);
        
    }
    else{
        // User existiert bereits
        echo "Fehler bei der Registrierung";
    }
} 
?> -->
