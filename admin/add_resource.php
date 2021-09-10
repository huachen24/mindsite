<?php
    include 'header.php';
    include 'navbar.php';
    include '../dbh.php';
?>

<div class='main'>
<div class='sidebar' style='justify-content:start; margin-top:6em;'>
<h3>Add a resource below</h3>

<?php
    if (isset($_GET['add'])) {
        if ($_GET['add'] == 'success') {
            echo "<p>Successfully added the resource :)</p>";
        } else {
            echo "<p>Successfully added the resource, but no image was uploaded</p>";
        }
    }

    if (isset($_GET['error'])) {
        if ($_GET['error'] == 'imagetype') {
            echo "<p>Unrecognised image type. Please only use .png, .jpg, .jpeg or .svg</p>";
        } else if ($_GET['error'] == 'image') {
            echo "<p>Uploaded file is not an image. Please try again. </p>";
        } else if ($_GET['error'] == 'imagesize') {
            echo "<p>Image size is too large.</p>";
        } else if ($_GET['error'] == 'execute') {
            echo "<p>An error occured while adding the resource.</p>";
        } else if ($_GET['error'] == 'prepare') {
            echo "<p>An error occured while adding the resource.</p>";
        } else if ($_GET['error'] == 'exists') {
            echo "<p>The image already exists. Please upload a new one using the edit resource function. </p>";
        } else {
            echo "<p>An error occured</p>";
        } 
    }
?>

<div id='add'>
<form action='includes/add_resource.inc.php' method='POST' enctype='multipart/form-data'>
    <table>
    <tr><th>Title</th>
    <td><div class='testing'><input type='text' name='title' required></div></td></tr>

    <tr><th>Short Description</th>
    <td><textarea name='shortdesc' rows='10' required></textarea></td></tr>

    <tr><th>Long Description</th>
    <td><textarea name='longdesc' rows='20' required></textarea></td></tr>

    <tr><th>Price</th>
    <td>
        <label class='radio-label'>Free
            <input type='radio' name='price' value='0' required>
            <span class='radio'></span>
        </label>
        <label class='radio-label'>Paid
            <input type='radio' name='price' value='1' required>
            <span class='radio'></span>
        </label>
    </td></tr>

    <tr><th>Price Description</th>
    <td><input type='text' name='pricedesc' required></td></tr>

    <tr><th>Location</th>
    <td>
        <label class='radio-label'>North
            <input type='checkbox' name='location[]' value='North'>
            <span class='check'></span>
        </label>
        <label class='radio-label'>South
            <input type='checkbox' name='location[]' value='South'>
            <span class='check'></span>
        </label>
        <label class='radio-label'>East
            <input type='checkbox' name='location[]' value='East'>
            <span class='check'></span>
        </label>
        <label class='radio-label'>West
            <input type='checkbox' name='location[]' value='West'>
            <span class='check'></span>
        </label>
        <label class='radio-label'>Central
            <input type='checkbox' name='location[]' value='Central'>
            <span class='check'></span>
        </label>
        <label class='radio-label'>Online
            <input type='checkbox' name='location[]' value='Online'>
            <span class='check'></span>
        </label>
    </td></tr>

    <tr><th>Address</th>
    <td><input type='text' name='address' required></td></tr>

    <tr><th>Weblink</th>
    <td><input type='text' name='weblink' required></td></tr>

    <tr><th>Type</th>
    <td><input type='text' placeholder='Search...' id='typesearch' onkeyup='typeFilter()'>
    <div id='types' class='drop-content'>
        <?php
            $resultfilter = mysqli_query($conn, "SELECT * FROM types");
            if ($resultfilter == FALSE) {
                echo "No type filters";
            } else {
                $queryResult = mysqli_num_rows($resultfilter);
                if ($queryResult > 0) {
                    while ($rowfilter = mysqli_fetch_assoc($resultfilter)) {
                        echo "<label class='radio-label'>".$rowfilter['type']."<input type='checkbox' name='type[]' value='".$rowfilter['type']."'><span class='check'></span></label>";
                    }
                } else {
                    echo "No type filters";
                }
            }
        ?>
    </div></td></tr>

    <tr><th>Specialty</th>
    <td><input type='text' placeholder='Search...' id='specialtysearch' onkeyup='specialtyFilter()'>
    <div id='specialties' class='drop-content'>
        <?php
            $resultfilter = mysqli_query($conn, "SELECT * FROM specialties");
            if ($resultfilter == FALSE) {
                echo "No specialty filters";
            } else {
                $queryResult = mysqli_num_rows($resultfilter);
                if ($queryResult > 0) {
                    while ($rowfilter = mysqli_fetch_assoc($resultfilter)) {
                        echo "<label class='radio-label'>".$rowfilter['specialty']."<input type='checkbox' name='specialty[]' value='".$rowfilter['specialty']."'><span class='check'></span></label>";
                    }
                } else {
                    echo "No specialty filters";
                }
            }
        ?>
    </div></td></tr>

    <tr><th>Modality</th>
    <td><input type='text' placeholder='Search...' id='modalitysearch' onkeyup='modalityFilter()'>
    <div id='modalities' class='drop-content'>
        <?php
            $resultfilter = mysqli_query($conn, "SELECT * FROM modalities");
            if ($resultfilter == FALSE) {
                echo "No modality filters";
            } else {
                $queryResult = mysqli_num_rows($resultfilter);
                if ($queryResult > 0) {
                    while ($rowfilter = mysqli_fetch_assoc($resultfilter)) {
                        echo "<label class='radio-label'>".$rowfilter['modality']."<input type='checkbox' name='modality[]' value='".$rowfilter['modality']."'><span class='check'></span></label>";
                    }
                } else {
                    echo "No modality filters";
                }
            }
        ?>
    </div></td></tr>

    <tr><th>Lower Age Limit</th>
    <td><input type='number' min='1' max='100' name='agelower' value='0'></td></tr>

    <tr><th>Upper Age Limit</th>
    <td><input type='number' min='1' max='100' name='ageupper' value='100'></td></tr>

    <tr><th>Image</th>
    <td><input type='file' id='img' name='img' accept='.png,.jpg,.jpeg,.svg'></td></tr>

    </table>
    <div class='buttons'>
            <a href='index.php'>Back</a>
            <button type='submit' name='submit'>Add</button>
    </div>
</form>
</div>

</div>
</div>
</body>
<script>
    
    function typeFilter() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("typesearch");
        filter = input.value.toUpperCase();
        div = document.getElementById("types");
        a = div.getElementsByTagName("label");
        for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }

    function specialtyFilter() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("specialtysearch");
        filter = input.value.toUpperCase();
        div = document.getElementById("specialties");
        a = div.getElementsByTagName("label");
        for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }

    function modalityFilter() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("modalitysearch");
        filter = input.value.toUpperCase();
        div = document.getElementById("modalities");
        a = div.getElementsByTagName("label");
        for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }
</script>

</html>