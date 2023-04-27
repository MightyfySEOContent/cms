
<?php foreach ($postResult as $row): ?>
    <?php if ($row['public'] == 1 && $row['article'] == 1): ?>
        <div class="post-container">
            <div class="post-card">
                <div class="post-card-header">
                    <img src="<?php echo $row['img']; ?>" alt="<?php echo $row['alt']; ?>">
                    <h2>
                        <?php echo $row['title']; ?>
                    </h2>
                </div>
                <div class="post-card-body">
                    <?php echo $row['metadesc']; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>
