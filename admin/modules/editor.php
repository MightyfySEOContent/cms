<div class="editor-content">
    <aside>
        <a href="editor.php?page=seite">Seite erstellen</a>
        <a href="editor.php?page=beitrag">Beitrag erstellen</a>
        <?php

        newPage($pdo);

        newArticle($pdo);
        ?>

    </aside>
    <main id="editor-main">
        <h2>
            <?php echo $pagesResult['title']; ?>
        </h2>
        <?php print_r(count($pagesResult)); print_r($pagesResult); ?>
        <p>
            <?php echo $pagesResult['subtitle']; ?>
        </p>
        <hr>
        <h3>So funktioniert's</h3>
        <p>
            Es war noch nie so leicht, eine neue Seite zu erstellen. Beantworten Sie einfach die Fragen im Formular und
            Du
            erhälst nach dem Klick auf Speichern eine fertige Website, die Deinen vorstellungen entspricht.
        </p>
        <p>
            Hierfür habe ich Templates ausgesucht, die frei zur Verfügung stehen. Bitte bedenke, dass der Editor noch in
            der
            Testphase ist und stetig verbessert wird.
        </p>
    </main>
</div>
<?php if ($_GET['page'] == 'seite'): ?>
    <!-- Spinner Start -->
    <?php foreach ($save as $newData) { ?>

    <?php } ?>
    <input type="text" name="metadesc" id="metadesc" placeholder="SEO Beschreibung einfügen">
    <input type="text" name="seoTitle" id="seoTitle" placeholder="SEO Titel einfügen">
<?php endif ?>