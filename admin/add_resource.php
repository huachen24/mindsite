<?php
    include 'header.php';
    include 'navbar.php';
?>
<div class='main'>
<div class='sidebar'>
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
        <div class='field'>
            <label for='name'>Name: </label>
            <input type='text' id='name' name='name' placeholder='Name of resource'>
        </div>
        <div class='field'>
            <label for='weblink'>URL: </label>
            <input type='text' id='weblink' name='weblink' placeholder='URL'>
        </div>
        <div class='field'>
            <label for='age'>Age: </label>
            <input type='text' id='age' name='age' placeholder='Age'>
        </div>
        <div class='field'>
            <label for='language'>Language: </label>
            <input type='text' id='language' name='language' placeholder='Language'>
        </div>
        <div class='field'>
            <label for='organisation'>Org: </label>
            <input type='text' id='organisation' name='organisation' placeholder='Organisation'>
        </div>
        <div class='field'>
            <label for='specialties'>Spec: </label>
            <input type='text' id='specialties' name='specialties' placeholder='Specialties'>
        </div>
        <div class='field'>
            <label for='modalities'>Mod: </label>
            <input type='text' id='modalities' name='modalities' placeholder='Modalities'>
        </div>
        <div class='buttons'>
            <button><a href='index.php'>Back</a></button>
            <button type='submit' name='submit'>Add</button>
        </div>
    </form>

</div>
</div>
</body>
</html>