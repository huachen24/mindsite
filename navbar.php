<div class="navbar">
    <?php 
        if (strpos($_SERVER['REQUEST_URI'], 'index.php') !== false || $_SERVER['REQUEST_URI']=="/sync/") {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="index.php">Home</a>
    </div>
    <?php 
        if (strpos($_SERVER['REQUEST_URI'], 'resources.php') !== false || strpos($_SERVER['REQUEST_URI'], 'search.php') !== false ) {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="resources.php">Resources</a>
    </div>
    <?php 
        if (strpos($_SERVER['REQUEST_URI'], 'about.php') !== false) {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="about.php">About</a>
    </div>
    <?php 
        if (strpos($_SERVER['REQUEST_URI'], 'contribute.php') !== false) {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="contribute.php">Contribute</a>
    </div>
    <?php 
        if (strpos($_SERVER['REQUEST_URI'], 'feedback.php') !== false) {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="feedback.php">Feedback</a>
    </div>
    <?php 
        if (strpos($_SERVER['REQUEST_URI'], 'contact.php') !== false) {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="contact.php">Contact Us</a>
    </div>
</div>