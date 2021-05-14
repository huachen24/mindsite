<div class="navbar">
    <?php 
        if ($_SERVER['REQUEST_URI'] == '/sync/index.php') {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="index.php">Home</a>
    </div>
    <?php 
        if ($_SERVER['REQUEST_URI'] == '/sync/resources.php') {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="resources.php">Resources</a>
    </div>
    <?php 
        if ($_SERVER['REQUEST_URI'] == '/sync/about.php') {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="about.php">About</a>
    </div>
    <?php 
        if ($_SERVER['REQUEST_URI'] == '/sync/contribute.php') {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="contribute.php">Contribute</a>
    </div>
    <?php 
        if ($_SERVER['REQUEST_URI'] == '/sync/feedback.php') {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="feedback.php">Feedback</a>
    </div>
    <?php 
        if ($_SERVER['REQUEST_URI'] == '/sync/contact.php') {
            echo "<div class='link active'>";
        } else {
            echo "<div class='link'>";
        }
    ?>
        <a href="contact.php">Contact Us</a>
    </div>
</div>