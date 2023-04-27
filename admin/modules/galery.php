<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $allowed_types = array('image/jpeg', 'image/png', 'image/webp', 'video/mp4', 'application/pdf');
    $file_type = $_FILES['file']['type'];
    $upload_dir = 'uploads/';

    // Überprüfen, ob der Dateityp erlaubt ist
    if (!in_array($file_type, $allowed_types)) {
        echo 'Ungültiger Dateityp.';
        exit;
    }

    // Datei in das Upload-Verzeichnis verschieben
    $file_name = $_FILES['file']['name'];
    $file_path = $upload_dir . $file_name;
    if (!move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
        echo 'Fehler beim Hochladen der Datei.';
        exit;
    }

    // Informationen in die Datenbank einfügen
    $name = $_POST['name'];
    $alt = $_POST['alt'];
    $title = $_POST['title'];
    $bild = 0;
    $videos = 0;
    $dokumente = 0;

    switch ($file_type) {
        case 'image/jpeg':
        case 'image/png':
            $bild = 1;
            break;
        case 'video/mp4':
            $videos = 1;
            break;
        case 'application/pdf':
            $dokumente = 1;
            break;
    }

    if ($stmt->execute([$name, $file_path, $alt, $title, $bild, $videos, $dokumente])) {
        // Ergebnisse aus der Datenbankabfrage abrufen
        $medien = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
        
}
// Medien ausgeben

 