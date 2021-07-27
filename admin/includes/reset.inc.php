<?php
    include '../../dbh.php';
    $result = mysqli_query($conn, "UPDATE resources SET clicks = 0");
    if ($result == FALSE) {
        header("Location: ../reset_clicks.php?reset=fail");
        exit();
    } else {
        header("Location: ../reset_clicks.php?reset=success");
        exit();
    }
?>