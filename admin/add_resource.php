<?php
    include 'header.php';
?>

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

    <form action='includes/add_resource.inc.php' method='POST'>
        <input type='text' name='name' placeholder='Name of resource'><br>
        <input type='text' name='weblink' placeholder='URL'><br>
        <input type='text' name='age' placeholder='Age'><br>
        <input type='text' name='language' placeholder='Language'><br>
        <input type='text' name='organisation' placeholder='Organisation'><br>
        <input type='text' name='specialties' placeholder='Specialties'><br>
        <input type='text' name='modalities' placeholder='Modalities'><br>
        <button type='submit' name='submit'>Add</button>
    </form>

<button><a href='index.php'>Back</a></button>

    <form action='includes/logout.inc.php' method='POST'>
        <button type='submit' name='submit'>Logout</button>
    </form>

    </body>
</html>