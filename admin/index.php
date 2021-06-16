<?php
include 'header.php';

if (isset($_SESSION["user"])) {
    echo "<h2>Welcome, ".$_SESSION["user"]."!</h2>";?>
    
    <h3>Select an action</h3>

<?php
    if (isset($_GET['add'])) {
        if ($_GET['add'] == 'success') {
            echo "<p>Successfully added the resource :)</p>";
        } else {
            echo "<p>Error encountered while adding. Please try again.</p>";
        }
    }
?>

<button><a href='add_resource.php'>Add a resource</a></button>
<button><a>Edit/Delete resources</a></button>
<button><a>placeholder</a></button>
<button><a>placeholder</a></button>

<br><button><a href='chg_pwd.php'>Change password</a></button>

    <form action='includes/logout.inc.php' method='POST'>
        <button type='submit' name='submit'>Logout</button>
    </form>
<?php
} else {
    header("Location: login.php");
}

?>

</body>
</html>