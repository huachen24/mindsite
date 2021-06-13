<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>MindSite Admin</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>

<?php
if (isset($_SESSION["user"])) {
    echo "<h2>Welcome, ".$_SESSION["user"]."!</h2>";?>
    
    <h3>Add a resource below</h3>

<?php
    if (isset($_GET['add'])) {
        if ($_GET['add'] == 'success') {
            echo "<p>Successfully added the resource :)</p>";
        } else {
            echo "<p>Error encountered while adding. Please try again.</p>";
        }
    }
?>

    <form action='add_resource.php' method='POST'>
        <input type='text' name='name' placeholder='Name of resource'><br>
        <input type='text' name='weblink' placeholder='URL'><br>
        <input type='text' name='age' placeholder='Age'><br>
        <input type='text' name='language' placeholder='Language'><br>
        <input type='text' name='organisation' placeholder='Organisation'><br>
        <input type='text' name='specialties' placeholder='Specialties'><br>
        <input type='text' name='modalities' placeholder='Modalities'><br>
        <button type='submit' name='submit'>Add</button>
    </form>

    <form action='logout.inc.php' method='POST'>
        <button type='submit' name='submit'>Logout</button>
    </form>
<?php
} else {
    header("Location: login.php");
}

?>

</body>
</html>