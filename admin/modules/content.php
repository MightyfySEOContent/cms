<?php if (!empty($postResult)): ?>
    <button id="createPage">Neue Seite</button>
    <div class="publicPages">
        <a href="">Alle (<?php echo count($postResult); ?>)</a>
        <a href="">Veröffentlicht</a>
        <a href="">Entwurf (<?php echo count(array_filter($postResult, function($page) { return $page['draft'] == 1; })); ?>)</a>
        <a href="">Wichtig</a>
    </div>
    <form method="post">
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
                <?php foreach ($postResult as $p): ?>
                    <tr>
                        <td><input type="checkbox" name="pageAction[]" value="<?php echo $p['id']; ?>"></td>
                        
                        <td><a href"<?php echo $p[''];?>"></a><?php echo $p['title']; ?></td>
                        <td><?php echo strlen($p['content']); ?></td>
                        <td><?php echo rand(0,100);?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button type="submit" name="deletePages">Ausgewählte löschen</button>
    </form>
<?php else: ?>
    <p>Keine Seiten gefunden.</p>
<?php endif; ?>

