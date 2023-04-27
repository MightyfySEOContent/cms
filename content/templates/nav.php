<nav id="navbar">
    <div class="logo">
        <img src="https://cdn.pixabay.com/photo/2016/08/25/07/30/orange-1618917__340.png" alt="Logo Best CMS"
            title="best CMS Logo" width="80px">
    </div>
    <div class="menu-wrapper">
        <button id="toggle">
            <i class="fas fa-bars"></i>
        </button>
        <div class="menu">
            <ul class="main-menu">
            <?php if(basename($_SERVER['PHP_SELF']) != 'login.php') { ?>
                <?php echo generateNavigationList($postResult); ?>
            </ul>
            <div class="user_actions">
                <button><a href="/signup">Anmelden</a></button>
                <button><a href="/login">Login</a></button>
            </div>
        </div>
    </div>
<?php }?>
</nav>