<?php
session_start();

if (isset($_SESSION["user"])) {
    echo "<p>Welcome ".$_SESSION["user"]."</p>";?>
    
    <h3>Add a resource</h3>

<?php
    if (isset($_GET['add'])) {
        if ($_GET['add'] == 'success') {
            echo "<p>Successfully added resource</p>";
        } else {
            echo "<p>Error encountered while adding. Please try again.</p>";
        }
    }
?>

    <form action='includes/add_resource.php' method='POST'>
        <input type='text' name='name' placeholder='Name of resource'><br>
        <input type='text' name='weblink' placeholder='URL'><br>
        <input type='text' name='age' placeholder='Age'><br>
        <input type='text' name='language' placeholder='Language'><br>
        <input type='text' name='organisation' placeholder='Organisation'><br>
        <input type='text' name='specialties' placeholder='Specialties'><br>
        <input type='text' name='modalities' placeholder='Modalities'><br>
        <button type='submit' name='submit'>Add</button>
    </form>

    <form action='includes/logout.inc.php' method='POST'>
        <button type='submit' name='submit'>Logout</button>
    </form>
<?php
} else {
    header("Location: login.php");
}

?>