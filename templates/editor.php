<?php
error_reporting(-1);
ini_set('display_errors', 'on');
?>
<div class="editor-content">
<aside>
    <h3>Welche Art von Website möchtest du erstellen?</h3>
    <a href="editor.php?page=startseite">Startseite</a>
    <a href="editor.php?page=features">Features Page</a>
    <a href="editor.php?page=kontakt">Kontaktseite</a>
</aside>
<main id="editor-main">
    <h2>
        <?php echo $r['title']; ?>
    </h2>
    <p>
        <?php echo $r['subtitle']; ?>
    </p>
    <hr>
    <h3>So funktioniert's</h3>
    <p>
        Es war noch nie so leicht, eine neue Seite zu erstellen. Beantworten Sie einfach die Fragen im Formular und Du
        erhälst nach dem Klick auf Speichern eine fertige Website, die Deinen vorstellungen entspricht.
    </p>
    <p>
        Hierfür habe ich Templates ausgesucht, die frei zur Verfügung stehen. Bitte bedenke, dass der Editor noch in der
        Testphase ist und stetig verbessert wird.
    </p>
    <section id="create">
        <div class="editor">
            <div class="editor-menubar">
                <button class="editor-button" data.attribute="bold">bold</button>
                <button class="editor-button" data.attribute="italic">italic</button>
                <button class="editor-button" data.attribute="underline">underline</button>
                <button class="editor-button" data.attribute="justifyleft">left</button>
                <button class="editor-button" data.attribute="justifyright">right</button>
            </div>
            <div class="editor-canvas" id="canvas" contenteditable="true">

            </div>
        </div>
    </section>
</main>
</div>