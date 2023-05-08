<?php
// alle Seiten azeigen
showAllPages($pdo);

// Nur cornerstone Seiten anzeigen
showCornerstonePages($pdo);

// Nur veröffentlichte Seiten anzeigen
showPublicPages($pdo);

// Nur Entwürfe anzeigen
showDraftPages($pdo);


if ($postResult[0]['url'] == '/content') ?>
<?php if (!empty($pages)): ?>
    <button id="createPage">Neue Seite</button>
    <div class="publicPages">
        <a href="<?php $current = $_SERVER['PHP_SELF'];
        $url = "https://$_SERVER[HTTP_HOST]$current?page=all";
        echo $url; ?>">Alle (
            <?php echo $count = 0;
            foreach ($pages as $countPage) {
                if ($countPage['page'] == 1 && $countPage['title'] != 'Seiten') {
                    $count++;

                }
            }
            echo $count; ?>)
        </a>
        <a href="<?php $current = $_SERVER['PHP_SELF'];
        $url = "https://$_SERVER[HTTP_HOST]$current?page=public";
        echo $url; ?>">Veröffentlicht(
            <?php $count = 0;
            foreach ($public as $allPublic) {
                if ($allPublic['page'] == 1 && $allPublic['public'] == 1) {
                    $count++;
                }
            }
            echo $count;

            ?>)
        </a>
        <a href="<?php $current = $_SERVER['PHP_SELF'];
        $url = "https://$_SERVER[HTTP_HOST]$current?page=draft";
        echo $url; ?>">Entwurf (
            <?php $count = 0;
            foreach ($pages as $draft) {
                if ($draft['page'] == 1 && $draft['draft'] == 1) {
                    $count++;
                }
            }
            echo $count; ?>)
        </a>

        <a href="<?php $current = $_SERVER['PHP_SELF'];
        $url = "https://$_SERVER[HTTP_HOST]$current?page=cornerstone";
        echo $url; ?>" id="cornerstone-link">Cornerstone(
            <?php
            $count = 0;
            foreach ($cornerstone as $c) {
                if ($c['cornerstone'] == 1) {
                    $count++;
                }
            }
            echo $count;
            ?>)
        </a>



    </div>
    <form method="post">
        <?php if (isset($_GET['page']) && $_GET['page'] == 'all'): ?>

            <table>
                <thead>
                    <tr>
                        <th></th>

                        <th>Seitenname</th>
                        <th>Textlänge</th>
                        <th>SEO Punktzahl</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pages as $p): ?>
                        <?php if ($p['page'] == 1 && $p['title'] !== 'Seiten'): ?>
                            <tr>
                                <td><input type="checkbox" name="pageAction[]" value="<?php echo $p['id']; ?>"></td>

                                <td><a href="<?php echo $p['url']; ?>"></a>
                                    <?php echo $p['title'];
                                    if ($p['draft'] == 1) {
                                        echo '--- Entwurf';
                                    } ?>
                                </td>
                                <td>
                                    <?php echo str_word_count(strip_tags($p['content'])); ?>
                                </td>
                                <td>
                                    <?php echo rand(0, 100); ?>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php if ($p['page'] !== 1 && $p['title'] == 'Seiten') {
                            echo 'Keine Seiten gefunden';
                        } ?>

                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="submit" name="deletePages">Ausgewählte löschen</button>

        <?php elseif (isset($_GET['page']) && $_GET['page'] == 'draft'): ?>
            <table>
                <thead>
                    <tr>
                        <th></th>

                        <th>Seitenname</th>
                        <th>Textlänge</th>
                        <th>SEO Punktzahl</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pages as $p): ?>
                        <?php if ($p['page'] == 1 && $p['title'] !== 'Seiten' && $p['draft'] == 1): ?>
                            <tr>
                                <td><input type="checkbox" name="pageAction[]" value="<?php echo $p['id']; ?>"></td>

                                <td><a href="<?php echo $p['url']; ?>"></a>
                                    <?php echo $p['title'];
                                    if ($p['draft'] == 1) {
                                        echo '--- Entwurf';
                                    } ?>
                                </td>
                                <td>
                                    <?php echo str_word_count(strip_tags($p['content'])); ?>
                                </td>
                                <td>
                                    <?php echo rand(0, 100); ?>
                                </td>
                            </tr>
                        <?php endif ?>
                        <?php if ($p['page'] !== 1 && $p['title'] == 'Seiten' && $p['draft'] == 1) {
                            echo 'Keine Seiten gefunden';
                        } ?>

                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="submit" name="deletePages">Ausgewählte löschen</button>
        <?php elseif (isset($_GET['page']) && $_GET['page'] == 'cornerstone'): ?>

            <table>
                <thead>
                    <tr>
                        <th></th>

                        <th>Seitenname</th>
                        <th>Textlänge</th>
                        <th>SEO Punktzahl</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pages as $p): ?>
                        <?php if ($p['page'] == 1 && $p['title'] !== 'Seiten' && $p['cornerstone'] == 1): ?>
                            <tr>
                                <td><input type="checkbox" name="pageAction[]" value="<?php echo $p['id']; ?>"></td>

                                <td><a href="<?php echo $p['url']; ?>"></a>
                                    <?php echo $p['title'];
                                    if ($p['draft'] == 1) {
                                        echo '--- Entwurf';
                                    } ?>
                                </td>
                                <td>
                                    <?php echo str_word_count(strip_tags($p['content'])); ?>
                                </td>
                                <td>
                                    <?php echo rand(0, 100); ?>
                                </td>
                            </tr>
                        <?php endif ?>
                        <?php if ($p['page'] !== 1 && $p['title'] == 'Seiten') {
                            echo 'Keine Seiten gefunden';
                        } ?>

                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="submit" name="deletePages">Ausgewählte löschen</button>
        <?php elseif (isset($_GET['page']) && $_GET['page'] == 'public'): ?>

            <table>
                <thead>
                    <tr>
                        <th></th>

                        <th>Seitenname</th>
                        <th>Textlänge</th>
                        <th>SEO Punktzahl</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pages as $p): ?>
                        <?php if ($p['page'] == 1 && $p['title'] !== 'Seiten' && $p['public'] == 1): ?>
                            <tr>
                                <td><input type="checkbox" name="pageAction[]" value="<?php echo $p['id']; ?>"></td>

                                <td><a href="<?php echo $p['url']; ?>"></a>
                                    <?php echo $p['title'];
                                    if ($p['draft'] == 1) {
                                        echo '--- Entwurf';
                                    } ?>
                                </td>
                                <td>
                                    <?php echo str_word_count(strip_tags($p['content'])); ?>
                                </td>
                                <td>
                                    <?php echo rand(0, 100); ?>
                                </td>
                            </tr>
                        <?php endif ?>
                        <?php if ($p['page'] !== 1 && $p['title'] == 'Seiten') {
                            echo 'Keine Seiten gefunden';
                        } ?>

                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="submit" name="deletePages">Ausgewählte löschen</button>

        </form>
    <?php endif; ?>
<?php endif; ?>