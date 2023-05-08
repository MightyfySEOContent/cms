<nav id="navbar">
    <?php

    #print_r($_SERVER);
    ?>
    <div class="menu-wrapper">
        <div class="menu">
            <ul class="main-menu">
                <?php if (isset($_SESSION['id'])): ?>
                    <?php foreach($pagesResult as $row):?>
                    <li><a href="<?php echo $baseurl;?>/admin/index.php?page=<?php echo $row['title'];?>"><?php echo $row['title'];?></a></li>

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