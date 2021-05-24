<?php
    include 'dbh.php';
    $rid = $_POST['resource_rid'];
    mysqli_query($conn, "UPDATE resources SET clicks = clicks + 1 WHERE rid = $rid");
?>