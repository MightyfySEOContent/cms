<nav id="navbar">
    <div class="menu-wrapper">
        <div class="menu">
            <ul class="main-menu">
                <?php if (isset($_SESSION['id'])): ?>
                    <?php foreach($pagesResult as $row):?>
                    <li><a href="<?php echo $row['url']?>"><?php echo $row['title'];?></a></li>

                <?php endforeach; endif; ?>
            </ul>
            <div class="user_actions">
                <form action="" method="post">
                <button type="submit" name="submit">Abmelden</button> 
                <?php userLogout();?> 
                </form>
            </div>
        </div>
    </div>

</nav>