<?php
    include 'header.php';
    include 'navbar.php';
    include '../dbh.php';
?>

<div class='main'>
<div class='sidebar'>

<?php
    if (isset($_GET['reset'])) {
        if ($_GET['reset'] == "success") {
            echo "<h1>Successfully reset clicks</h1>";
        } else {
            echo "<h1>Failed to reset clicks</h1>";
        }
    }
?>

    <form action='includes/reset.inc.php' method=POST>
        <input type="submit" value="Reset Clicks">
    </form>

</div>
</div>
</body>
</html>