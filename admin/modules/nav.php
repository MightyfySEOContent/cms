<nav id="navbar">
    <div class="logo">
        <img src="https://cdn.pixabay.com/photo/2013/07/12/18/16/throwing-star-153172__340.png" alt="Logo Best CMS"
            title="best CMS Logo" width="80px">
    </div>
    <div class="menu-wrapper">
        <div class="menu">
            <ul class="main-menu">
                <li><a href="/admin/">Dashboard</a></li>
                <?php if (isset($_SESSION['id'])): ?>
                    <li><a href="/admin/gallery.php">Medien</a></li>
                <?php endif; ?>
            </ul>
            <div class="user_actions">
                <form action="" method="post">
                <button type="submit" name="submit">Abmelden</button>
                <?php if(isset($_POST['submit'])){
                    session_destroy();
                    header('location: /admin/modules/login');
                } ?>
                </form>
            </div>
        </div>
    </div>

</nav>