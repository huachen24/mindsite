<?php
    include 'header.php';
    include 'navbar.php';
    include '../dbh.php';
?>

<div class='main'>
<div class='sidebar' style='justify-content:start; margin-top:6em;'>
<h3>Edit Resource</h3>

<?php
if (isset($_POST['success'])) {
    echo "<p>Successfully updated ".
    ($_POST['title'] ? '| title ' : '').
    ($_POST['shortdesc'] ? '| short description ' : '').
    ($_POST['longdesc'] ? '| long description ' : '').
    ($_POST['price'] ? '| price ' : '').
    ($_POST['pricedesc'] ? '| pricedesc ' : '').
    ($_POST['location'] ? '| location ' : '').
    ($_POST['address'] ? '| address ' : '').
    ($_POST['weblink'] ? '| weblink ' : '').
    ($_POST['agelower'] ? '| lower age limit ' : '').
    ($_POST['ageupper'] ? '| upper age limit ' : '').
    ($_POST['type'] ? '| type ' : '').
    ($_POST['specialty'] ? '| specialty ' : '').
    ($_POST['modality'] ? '| modality ' : '').
    ($_POST['image'] ? '| image ' : '').
    "|";
}

?>

<div id='edit'>
<?php
    $sql = "SELECT * FROM resources WHERE `rid` = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        if (isset($_POST['success'])) {
            $rid = $_POST['rid'];
        } else {
            $rid = $_GET['rid'];
        }
        mysqli_stmt_bind_param($stmt, "i", $rid);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<form action='includes/edit.inc.php' method='POST'>
                    <input type='hidden' name='rid' value='".$rid."'>
                    <table>
                    <tr><th></th><th>Current Details</th><th>New Details</th>

                    <tr><th>Title</th>
                    <td>".$row['title']."</td>
                    <td><input type='text' name='title'></td></tr>

                    <tr><th>Short Description</th>
                    <td>".$row['shortdesc']."</td>
                    <td><textarea name='shortdesc' rows='10'></textarea></td></tr>

                    <tr><th>Long Description</th>
                    <td>".$row['longdesc']."</td>
                    <td><textarea name='longdesc' rows='20'></textarea></td></tr>

                    <tr><th>Price</th>
                    <td>".$row['price']."</td>
                    <td>
                        <label class='radio-label'>Free
                            <input type='radio' name='price' value='0'>
                            <span class='radio'></span>
                        </label>
                        <label class='radio-label'>Paid
                            <input type='radio' name='price' value='1'>
                            <span class='radio'></span>
                        </label>
                    </td></tr>

                    <tr><th>Price Description</th>
                    <td>".$row['pricedesc']."</td>
                    <td><input type='text' name='pricedesc'></td></tr>

                    <tr><th>Location</th>
                    <td>".$row['location']."</td>
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
                    <td>".$row['address']."</td>
                    <td><input type='text' name='address'></td></tr>

                    <tr><th>Weblink</th>
                    <td>".$row['weblink']."</td>
                    <td><input type='text' name='weblink'></td></tr>

                    <tr><th>Type (reselect even if no changes)</th>
                    <td>".$row['type']."</td>
                    <td><input type='text' placeholder='Search...' id='typesearch' onkeyup='typeFilter()'>
                    <div id='types' class='drop-content'>";
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
                    echo "</div></td></tr>

                    <tr><th>Specialty (reselect even if no changes)</th>
                    <td>".$row['specialty']."</td>
                    <td><input type='text' placeholder='Search...' id='specialtysearch' onkeyup='specialtyFilter()'>
                    <div id='specialties' class='drop-content'>";
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
                    echo "</div></td></tr>

                    <tr><th>Modality (reselect even if no changes)</th>
                    <td>".$row['modality']."</td>
                    <td><input type='text' placeholder='Search...' id='modalitysearch' onkeyup='modalityFilter()'>
                    <div id='modalities' class='drop-content'>";
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
                    echo "</div></td></tr>

                    <tr><th>Lower Age Limit</th>
                    <td>".$row['agelower']."</td>
                    <td><input type='number' min='1' max='100' name='agelower'></td></tr>

                    <tr><th>Upper Age Limit</th>
                    <td>".$row['ageupper']."</td>
                    <td><input type='number' min='1' max='100' name='ageupper'></td></tr>

                    <tr><th>Image</th><td>";
                    if ($row['image'] == "0") {
                        echo "nil</td>
                        <td><input type='file' id='img' name='img' accept='.png,.jpg,.jpeg,.svg'></td></tr>";
                    } else {
                        echo "<img src='../profiles/".$row['rid'].".".$row['image']."' width='320px'></td>
                        <td><input type='file' id='img' name='img' accept='.png,.jpg,.jpeg,.svg'></td></tr>";
                    }
                    echo "</table>
                    <div class='buttons'>
                    <a href='includes/delete_resource.inc.php?rid=".$row['rid']."'>Delete this resource</a>
                    <button type='submit' name='submit'>Edit</button>
                    </div>
                    </form>";
                }
            } else {
                echo "<h1>".mysqli_error($conn)."</h1";
                // header("Location: edit_resource.php?error=noresult");
                // exit();
            }
        } else {
            echo "<h1>".mysqli_error($conn)."</h1";
            // header("Location: edit_resource.php?error=execute");
            // exit();
        }
    } else {
        echo "<h1>".mysqli_error($conn)."</h1";
        // header("Location: edit_resource.php?error=prepare");
        // exit();
    }

    mysqli_stmt_close($stmt);
?>
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