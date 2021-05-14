<div class="navbar">
    <?php 
        if ($_SERVER['REQUEST_URI'] == '/SYNC/index.php') {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="index.php">Home</a>
    </div>
    <?php 
        if ($_SERVER['REQUEST_URI'] == '/SYNC/resources.php') {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="resources.php">Resources</a>
    </div>
    <?php 
        if ($_SERVER['REQUEST_URI'] == '/SYNC/about.php') {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="about.php">About</a>
    </div>
    <?php 
        if ($_SERVER['REQUEST_URI'] == '/SYNC/contribute.php') {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="contribute.php">Contribute</a>
    </div>
    <?php 
        if ($_SERVER['REQUEST_URI'] == '/SYNC/feedback.php') {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="feedback.php">Feedback</a>
    </div>
    <?php 
        if ($_SERVER['REQUEST_URI'] == '/SYNC/contact.php') {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="contact.php">Contact Us</a>
    </div>
</div>