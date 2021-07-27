<div class="navbar">
    <div class='nav_main'>
    <?php 
        echo "<div class='link'>";
    ?>
        <a href="../index.php">MindSite</a>
    </div>
    <?php 
        if (strpos($_SERVER['REQUEST_URI'], 'index.php') !== false) {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="index.php">Admin</a>
    </div>
    <?php 
        if (strpos($_SERVER['REQUEST_URI'], 'add_resource.php') !== false) {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="add_resource.php">Add Resource</a>
    </div>
    <?php 
        if (strpos($_SERVER['REQUEST_URI'], 'edit_resource.php') !== false) {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="edit_resource.php">Edit Resource</a>
    </div>
    <?php 
        if (strpos($_SERVER['REQUEST_URI'], 'approve_ratings.php') !== false) {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="approve_ratings.php">Approve Ratings</a>
    </div>
    <?php 
        if (strpos($_SERVER['REQUEST_URI'], 'reset_clicks.php') !== false) {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="reset_clicks.php">Reset Clicks</a>
    </div>
    <?php 
        if (strpos($_SERVER['REQUEST_URI'], 'settings.php') !== false) {
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