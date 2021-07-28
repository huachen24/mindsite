<?php
    include '../../dbh.php';
    $result = mysqli_query($conn, "UPDATE resources SET clicks = 0");
    if ($result == FALSE) {
        header("Location: ../track_resources.php?reset=fail");
        exit();
    } else {
        header("Location: ../track_resources.php?reset=success");
        exit();
    }
?>