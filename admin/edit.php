<?php
    include 'header.php';
    include 'navbar.php';
    include '../dbh.php';
?>

<div class='main'>
<div class='sidebar' style='justify-content:start; margin-top:6em;'>
<h3>Edit Resource</h3>

<div id='edit'>
<?php
    $sql = "SELECT * FROM resources WHERE `rid` = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $_GET['rid']);

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<form action='includes/edit.inc.php' method='POST'>
                    <input type='hidden' name='rid' value='".$_GET['rid']."'>
                    <table>
                    <tr><th></th><th>Current Details</th><th>New Details</th>

                    <tr><th>Title</th>
                    <td>".$row['title']."</td>
                    <td><input type='text' name='title' size='48'></td></tr>

                    <tr><th>Short Description</th>
                    <td>".$row['shortdesc']."</td>
                    <td><textarea name='shortdesc' rows='10' cols='50'></textarea></td></tr>

                    <tr><th>Long Description</th>
                    <td>".$row['longdesc']."</td>
                    <td><textarea name='longdesc' rows='20' cols='50'></textarea></td></tr>

                    <tr><th>Price</th>
                    <td>".$row['price']."</td>
                    <td><input type='text' name='price' size='48'></td></tr>

                    <tr><th>Address</th>
                    <td>".$row['address']."</td>
                    <td><input type='text' name='address' size='48'></td></tr>

                    <tr><th>Weblink</th>
                    <td>".$row['weblink']."</td>
                    <td><input type='text' name='weblink' size='48'></td></tr>

                    <tr><th>Type</th>
                    <td>".$row['type']."</td>
                    <td><input type='text' placeholder='Search...' id='typesearch' onkeyup='typeFilter()' size='48'>
                    <div id='types' class='drop-content'>";
                            $resultfilter = mysqli_query($conn, "SELECT * FROM types");
                            if ($resultfilter == FALSE) {
                                echo "No type filters";
                            } else {
                                $queryResult = mysqli_num_rows($resultfilter);
                                if ($queryResult > 0) {
                                    while ($rowfilter = mysqli_fetch_assoc($resultfilter)) {
                                        echo "<label><input type='checkbox' name='type[]' value='".$rowfilter['type']."'>".$rowfilter['type']."</label>";
                                    }
                                } else {
                                    echo "No type filters";
                                }
                            }
                    echo "</div></td></tr>

                    <tr><th>Specialty</th>
                    <td>".$row['specialty']."</td>
                    <td><input type='text' placeholder='Search...' id='specialtysearch' onkeyup='specialtyFilter()' size='48'>
                    <div id='specialties' class='drop-content'>";
                            $resultfilter = mysqli_query($conn, "SELECT * FROM specialties");
                            if ($resultfilter == FALSE) {
                                echo "No specialty filters";
                            } else {
                                $queryResult = mysqli_num_rows($resultfilter);
                                if ($queryResult > 0) {
                                    while ($rowfilter = mysqli_fetch_assoc($resultfilter)) {
                                        echo "<label><input type='checkbox' name='specialty[]' value='".$rowfilter['specialty']."'>".$rowfilter['specialty']."</label>";
                                    }
                                } else {
                                    echo "No specialty filters";
                                }
                            }
                    echo "</div></td></tr>

                    <tr><th>Modality</th>
                    <td>".$row['modality']."</td>
                    <td><input type='text' placeholder='Search...' id='modalitysearch' onkeyup='modalityFilter()' size='48'>
                    <div id='modalities' class='drop-content'>";
                            $resultfilter = mysqli_query($conn, "SELECT * FROM modalities");
                            if ($resultfilter == FALSE) {
                                echo "No modality filters";
                            } else {
                                $queryResult = mysqli_num_rows($resultfilter);
                                if ($queryResult > 0) {
                                    while ($rowfilter = mysqli_fetch_assoc($resultfilter)) {
                                        echo "<label><input type='checkbox' name='modality[]' value='".$rowfilter['modality']."'>".$rowfilter['modality']."</label>";
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
                        echo "<img src='../profiles/".$row['rid'].".".$row['image']."'></td>
                        <td><input type='file' id='img' name='img' accept='.png,.jpg,.jpeg,.svg'></td></tr>";
                    }
                    echo "</table>
                    <input type=submit value=submit>
                    </form>";
                }
            } else {
                header("Location: ../add_resource.php?error=noresult");
                exit();
            }
        } else {
            header("Location: ../add_resource.php?error=execute");
            exit();
        }
    } else {
        header("Location: ../add_resource.php?error=prepare");
        exit();
    }

    mysqli_stmt_close($stmt);
?>
</div>

</div>
</div>
</body>
</html>