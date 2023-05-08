<?php
// if(!isset($_SESSION['id'])){
//     header('location: login.php');
// }

require_once __DIR__ . '/../functions/content-functions.php';
require_once __DIR__ . '/../config/dbconfig.php';
addPersonalisation($pdo);?>
<h2>Einstellungen</h2>
<p>Hier kannst du weitere Einstellungen vornehmen, beispielsweise:</p>
<ul>
    <li>CSS Dateien </li>
    <li>Javascript Dateien </li>
    <li>Fonts (Beispielsweise Google Fonts)</li>
</ul>
<p>Es ist auch möglich, Frameworks, wie Bootstrap, Bulma CSS oder JQuery einzubinden. Einfach den Pfad zur CSS Datei eingeben und
    loslegen. </br>
    Übrigens kannst du zum einbinden auch Content Delivery Networks nutzen und musst die Datei nicht lokal speichern.
</p>
<p>Wähle einfach im Dropdownmenü aus, was du einfügen möchtest.</p>

<form action="" method="post">
    <div class="select">
       <select name="type" id="">
        <option value="css">CSS</option>
        <option value="js">Javascript</option>
        <option value="fonts">Fonts</option>
        <option value="cdn">CDN</option>
       </select>
    </div>
    <input type="text" name="value" placeholder="Pfad zur Datei" required ><br>

    <input type="submit" value="Absenden" name="add_style">
</form>

