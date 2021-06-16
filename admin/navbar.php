<div class="navbar">
    <div class='nav_main'>
    <?php 
        if (str_contains($_SERVER['REQUEST_URI'], 'index.php')) {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="../index.php">MindSite</a>
    </div>
    <?php 
        if (str_contains($_SERVER['REQUEST_URI'], 'add_resource.php')) {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="add_resource.php">Add Resource</a>
    </div>
    <?php 
        if (str_contains($_SERVER['REQUEST_URI'], 'edit_resource.php')) {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="edit_resource.php">Edit Resource</a>
    </div>
    <?php 
        if (str_contains($_SERVER['REQUEST_URI'], 'settings.php')) {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="chg_pwd.php">Settings</a>
    </div>
    </div>
    <div class='logout_btn'>
        <a href='includes/logout.inc.php'>Logout</a>
    </div>
</div>