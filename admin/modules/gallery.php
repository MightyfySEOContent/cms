<?php print_r($_GET); ?>
<div class="gallery">
    <div class="gallery-menues">
        <div class="list">
            <i class="fa-solid fa-list"></i>
        </div>
        <div class="grid">
            <i class="fa-solid fa-grid"></i>
        </div>
        <div class="select-menues">
            <select name="Medien" id="media" aria-placeholder="Medien">
                <option selected="selected" value="allMedia">Alle Medien</option>
                <option value="bilder">Bilder</option>
                <option value="videos">Videos</option>
                <option value="Dokumente">Dokumente</option>
                <option value="standalone">Nicht angehängt</option>
            </select>
        </div>
        <div class="medien-container">
            <?php foreach ($medien as $row) {

                if ($row['bilder'] == 1) {

                    echo "<div class='container'>
               <div class='img'>
                   <img src='{$row['path']}' alt='{$row['alt']}' title='{$row['title']}'>
               </div>
           </div>";

                } elseif ($row['videos'] == 1) {
                    echo "<div class='container'>
               <div class='video'>
                   <video src='{$row['path']}' controls></video>
               </div>
           </div>";
                } elseif ($row['dokument'] == 1) {
                    echo "<div class='container'>
               <div class='dokument'>
                   <a href='{$row['path']}' target='_blank'>{$row['name']}</a>
               </div>
           </div>";
                }
            }
            ?>
        </div>
    </div>
</div>