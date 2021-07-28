<?php
include 'header.php';

if (isset($_SESSION["user"])) {
    include 'navbar.php';?>

    <div class='main'>
    <div class='sidebar'>

    <?php echo "<h2>Welcome, ".$_SESSION["user"]."!</h2>";?>
    
    <h3>Select an action</h3>

    <div class='action_list'>
    <a href='add_resource.php'>Add a resource</a>
    <a href='edit_resource.php'>Edit/Delete resources</a>
    <a href='approve_ratings.php'>Approve ratings</a>
    <a href='track_resources.php'>Track resources</a>
    </div>

    <form action='includes/logout.inc.php' method='POST'>
        <button type='submit' name='submit'>Logout</button>
    </form>
<?php
} else {
    header("Location: login.php");
}

?>

</div>
</div>
</body>
</html>