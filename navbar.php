<div class="navbar">
    <?php 
        if (str_contains($_SERVER['REQUEST_URI'], 'index.php')) {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="index.php">Home</a>
    </div>
    <?php 
        if (str_contains($_SERVER['REQUEST_URI'], 'resources.php') || str_contains($_SERVER['REQUEST_URI'], 'search.php')) {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="resources.php">Resources</a>
    </div>
    <?php 
        if (str_contains($_SERVER['REQUEST_URI'], 'about.php')) {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="about.php">About</a>
    </div>
    <?php 
        if (str_contains($_SERVER['REQUEST_URI'], 'contribute.php')) {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="contribute.php">Contribute</a>
    </div>
    <?php 
        if (str_contains($_SERVER['REQUEST_URI'], 'feedback.php')) {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="feedback.php">Feedback</a>
    </div>
    <?php 
        if (str_contains($_SERVER['REQUEST_URI'], 'contact.php')) {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="contact.php">Contact Us</a>
    </div>
</div>